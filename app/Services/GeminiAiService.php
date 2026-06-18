<?php

namespace App\Services;

use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiAiService
{
    private string $apiKey;
    private string $apiUrl;

    // Sistem prompt identitas SAPA PUPR Garut
    private string $systemPrompt = <<<'PROMPT'
Anda adalah SAPA PUPR Garut — Asisten Virtual resmi yang terintegrasi pada Website Portal Informasi Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut.

IDENTITAS & PERSONALITI:
- Nama: SAPA PUPR Garut
- Bahasa: Bahasa Indonesia yang formal, sopan, ramah, dan profesional layaknya representasi resmi instansi pemerintah.
- Anda hanya boleh menjawab pertanyaan seputar Tupoksi Dinas PUPR Kabupaten Garut.

ATURAN KETAT:
1. Jangan pernah keluar dari peran Anda sebagai SAPA PUPR Garut.
2. Jangan memberikan opini pribadi.
3. Jangan memberikan instruksi pemrograman atau teknis non-PUPR.
4. Jangan menjawab pertanyaan tentang politik praktis, SARA, atau hal di luar Tupoksi PUPR.
5. Jangan mengarang informasi. Jika data tidak tersedia dalam konteks yang diberikan, katakan dengan jujur.
6. Untuk topik sensitif (kepegawaian internal, rahasia instansi), tolak dengan sopan.

STRUKTUR RESPONS WAJIB:
- Berikan jawaban yang informatif dan ringkas.
- Di AKHIR setiap jawaban, SELALU tambahkan kalimat ini persis:
  "Apakah informasi ini sudah cukup membantu? Silakan tekan tombol [Ya] jika kendala Anda selesai, atau [Tidak] jika ingin terhubung ke Admin."

JIKA TOPIK DI LUAR TUPOKSI:
- Tolak dengan sopan dan tetap sertakan kalimat tombol verifikasi di akhir.

TUPOKSI DINAS PUPR GARUT meliputi:
- Pekerjaan umum: jalan, jembatan, irigasi, drainase
- Penataan ruang dan tata kota
- Bangunan gedung dan Izin Mendirikan Bangunan (IMB) / PBG
- Sertifikat Laik Fungsi (SLF)
- Air bersih dan sanitasi
- Infrastruktur wilayah Kabupaten Garut
PROMPT;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key', env('GEMINI_API_KEY'));
        $this->apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';
    }

    /**
     * Generate respons AI berdasarkan pertanyaan user dengan konteks dari database
     */
    public function generateResponse(string $userMessage, array $conversationHistory = []): string
    {
        try {
            // Ambil konteks relevan dari database
            $context = $this->fetchRelevantContext($userMessage);

            // Bangun prompt lengkap
            $fullPrompt = $this->buildPromptWithContext($userMessage, $context);

            // Bangun riwayat percakapan untuk Gemini
            $contents = $this->buildContents($conversationHistory, $fullPrompt);

            $response = Http::timeout(30)->post($this->apiUrl . '?key=' . $this->apiKey, [
                'system_instruction' => [
                    'parts' => [['text' => $this->systemPrompt]],
                ],
                'contents'           => $contents,
                'generationConfig'   => [
                    'temperature'     => 0.3,
                    'maxOutputTokens' => 1024,
                ],
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text']
                    ?? $this->defaultErrorResponse();
            }

            Log::error('Gemini API Error', [
                'status'   => $response->status(),
                'response' => $response->body(),
            ]);

            return $this->defaultErrorResponse();
        } catch (\Exception $e) {
            Log::error('GeminiAiService Exception', ['error' => $e->getMessage()]);
            return $this->defaultErrorResponse();
        }
    }

    /**
     * Ambil data relevan dari database berdasarkan kata kunci pertanyaan
     */
    private function fetchRelevantContext(string $query): string
    {
        $context = '';
        $keywords = $this->extractKeywords($query);

        // Cari di tabel Layanan
        $layanans = Layanan::where(function ($q) use ($keywords) {
            foreach ($keywords as $kw) {
                $q->orWhere('nama_layanan', 'like', "%$kw%")
                  ->orWhere('deskripsi_singkat', 'like', "%$kw%")
                  ->orWhere('penjelasan_detail', 'like', "%$kw%")
                  ->orWhere('alur', 'like', "%$kw%");
            }
        })->limit(3)->get();

        if ($layanans->isNotEmpty()) {
            $context .= "\n=== DATA LAYANAN DINAS PUPR ===\n";
            foreach ($layanans as $layanan) {
                $context .= "Layanan: {$layanan->nama_layanan}\n";
                $context .= "Deskripsi: {$layanan->deskripsi_singkat}\n";
                if ($layanan->penjelasan_detail) $context .= "Penjelasan: {$layanan->penjelasan_detail}\n";
                if ($layanan->alur)              $context .= "Alur Prosedur: {$layanan->alur}\n";
                if ($layanan->persyaratan)       $context .= "Persyaratan: {$layanan->persyaratan}\n";
                $context .= "---\n";
            }
        }

        // Cari di tabel Berita (untuk informasi terkini)
        $beritas = Berita::published()
            ->where(function ($q) use ($keywords) {
                foreach ($keywords as $kw) {
                    $q->orWhere('judul', 'like', "%$kw%")
                      ->orWhere('isi', 'like', "%$kw%");
                }
            })->latest()->limit(2)->get();

        if ($beritas->isNotEmpty()) {
            $context .= "\n=== BERITA & INFORMASI TERKINI ===\n";
            foreach ($beritas as $berita) {
                $context .= "Judul: {$berita->judul}\n";
                $context .= "Isi: " . \Str::limit(strip_tags($berita->isi), 300) . "\n";
                $context .= "Tanggal: " . $berita->published_at->format('d M Y') . "\n---\n";
            }
        }

        // Cari di tabel Pengumuman
        $pengumumans = Pengumuman::where(function ($q) use ($keywords) {
            foreach ($keywords as $kw) {
                $q->orWhere('judul', 'like', "%$kw%")
                  ->orWhere('isi', 'like', "%$kw%");
            }
        })->latest()->limit(2)->get();

        if ($pengumumans->isNotEmpty()) {
            $context .= "\n=== PENGUMUMAN RESMI ===\n";
            foreach ($pengumumans as $p) {
                $context .= "Judul: {$p->judul}\n";
                $context .= "Isi: " . \Str::limit(strip_tags($p->isi), 200) . "\n---\n";
            }
        }

        return $context ?: "\n[Tidak ada data spesifik di database yang cocok dengan pertanyaan ini. Jawab berdasarkan pengetahuan umum tentang PUPR, namun sampaikan bahwa untuk informasi yang lebih akurat dan spesifik Kabupaten Garut, user perlu menghubungi kantor langsung.]\n";
    }

    /**
     * Bangun prompt dengan menyertakan konteks database
     */
    private function buildPromptWithContext(string $userMessage, string $context): string
    {
        return <<<PROMPT
KONTEKS DATA DARI DATABASE SISTEM:
{$context}

PERTANYAAN MASYARAKAT:
{$userMessage}

Jawab berdasarkan konteks data di atas. Jika konteks tidak relevan, jawab berdasarkan pengetahuan umum tentang PUPR.
PROMPT;
    }

    /**
     * Bangun array contents untuk Gemini (termasuk riwayat percakapan)
     */
    private function buildContents(array $history, string $currentPrompt): array
    {
        $contents = [];

        // Masukkan riwayat percakapan sebelumnya (max 6 pesan terakhir)
        $recentHistory = array_slice($history, -6);
        foreach ($recentHistory as $msg) {
            $role = $msg['sender_type'] === 'user' ? 'user' : 'model';
            $contents[] = [
                'role'  => $role,
                'parts' => [['text' => $msg['message']]],
            ];
        }

        // Tambahkan pertanyaan saat ini
        $contents[] = [
            'role'  => 'user',
            'parts' => [['text' => $currentPrompt]],
        ];

        return $contents;
    }

    /**
     * Ekstrak kata kunci dari pertanyaan untuk pencarian database
     */
    private function extractKeywords(string $query): array
    {
        // Hapus kata-kata umum (stopwords bahasa Indonesia)
        $stopwords = ['apa', 'bagaimana', 'dimana', 'kapan', 'siapa', 'yang', 'dan', 'atau',
                      'ini', 'itu', 'di', 'ke', 'dari', 'dengan', 'untuk', 'adalah', 'ada',
                      'saya', 'kami', 'kita', 'bisa', 'mau', 'ingin', 'minta', 'tolong'];

        $words = explode(' ', strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $query)));
        $keywords = array_filter($words, fn($w) => strlen($w) > 3 && !in_array($w, $stopwords));

        return array_values(array_unique($keywords));
    }

    /**
     * Respons default saat terjadi error
     */
    private function defaultErrorResponse(): string
    {
        return "Mohon maaf, saat ini saya mengalami gangguan teknis dan tidak dapat memproses pertanyaan Anda. " .
               "Apakah informasi ini sudah cukup membantu? Silakan tekan tombol [Ya] jika kendala Anda selesai, atau [Tidak] jika ingin terhubung ke Admin.";
    }
}
