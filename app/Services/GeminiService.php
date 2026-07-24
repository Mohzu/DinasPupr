<?php

namespace App\Services;

use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Layanan;
use App\Models\PejabatStruktural;
use App\Models\Pengumuman;
use App\Models\Sejarah;
use App\Models\StrukturOrganisasi;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    private ?string $apiKey;
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
7. Jangan pernah menyertakan kalimat sambutan atau ucapan selamat datang seperti "Selamat datang di layanan SAPA PUPR Garut" atau variasi serupa dalam jawaban Anda, karena pesan sambutan awal sudah ditampilkan oleh sistem.

INFORMASI DOKUMEN:
- Jika masyarakat menanyakan dokumen terbaru atau daftar dokumen, sebutkan nama-nama dokumen yang tersedia di database sistem.
- Jangan pernah menyertakan link download langsung atau alamat file (seperti /storage/...) kepada pengguna.
- Berikan arahan yang ramah manusia untuk mengakses halaman dokumen (misalnya: "Silakan akses Halaman Dokumen di menu website kami" atau "Anda bisa mengunduhnya secara mandiri melalui menu Dokumen di website Dinas PUPR"). Jangan pernah menggunakan path teknis seperti "/pages/dokumen".

STRUKTUR RESPONS WAJIB:
- Berikan jawaban yang informatif dan ringkas.

JIKA TOPIK DI LUAR TUPOKSI:
- Tolak dengan sopan.

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
        $this->apiKey = config('services.gemini.api_key') ?: null;
        $this->apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';
    }

    /**
     * Generate respons AI — metode utama yang dipanggil oleh ChatController
     */
    public function generateReply(string $userMessage, array $conversationHistory = []): string
    {
        if (empty($this->apiKey)) {
            Log::warning('Chatbot dipanggil tapi GEMINI_API_KEY belum diset.');
            return "Mohon maaf, layanan chat otomatis sedang belum aktif. "
                . "Silakan hubungi Dinas PUPR Kabupaten Garut melalui halaman Kontak untuk bantuan. 🙏";
        }

        try {
            // Ambil konteks relevan dari database
            $context = $this->fetchRelevantContext($userMessage);

            // Bangun prompt lengkap dengan konteks
            $fullPrompt = $this->buildPromptWithContext($userMessage, $context);

            // Bangun array contents untuk Gemini (termasuk riwayat percakapan)
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
            Log::error('GeminiService Exception', ['error' => $e->getMessage()]);
            return $this->defaultErrorResponse();
        }
    }

    /**
     * Ambil data lengkap dari database untuk dijadikan konteks AI (RAG offline/seluruh database)
     */
    private function fetchRelevantContext(string $query): string
    {
        $context = '';

        // 1. Profil & Informasi Umum Dinas PUPR
        $sejarah = Sejarah::published()->first();
        if ($sejarah) {
            $context .= "\n=== SEJARAH DINAS PUPR GARUT ===\n";
            $context .= "{$sejarah->content}\n";
        }

        $visiMisi = VisiMisi::published()->first();
        if ($visiMisi) {
            $context .= "\n=== VISI & MISI DINAS PUPR GARUT ===\n";
            if ($visiMisi->visi)    $context .= "Visi: {$visiMisi->visi}\n";
            if ($visiMisi->misi)    $context .= "Misi:\n{$visiMisi->misi}\n";
            if ($visiMisi->content) $context .= "Keterangan tambahan: {$visiMisi->content}\n";
        }

        $struktur = StrukturOrganisasi::published()->first();
        if ($struktur) {
            $context .= "\n=== STRUKTUR ORGANISASI ===\n";
            $context .= "Judul: {$struktur->title}\n";
            if ($struktur->content) $context .= "Deskripsi: {$struktur->content}\n";
        }

        $pejabat = PejabatStruktural::where('aktif', true)->orderBy('urutan')->get();
        if ($pejabat->isNotEmpty()) {
            $context .= "\n=== DAFTAR PEJABAT STRUKTURAL ===\n";
            foreach ($pejabat as $p) {
                $context .= "- Nama: {$p->nama} | Jabatan: {$p->jabatan}\n";
            }
        }

        // 2. Daftar Layanan Dinas PUPR
        $layanans = Layanan::all();
        if ($layanans->isNotEmpty()) {
            $context .= "\n=== DAFTAR LAYANAN DINAS PUPR ===\n";
            foreach ($layanans as $layanan) {
                $context .= "Layanan: {$layanan->nama_layanan}\n";
                $context .= "Deskripsi: {$layanan->deskripsi_singkat}\n";
                if ($layanan->penjelasan_detail) $context .= "Penjelasan: {$layanan->penjelasan_detail}\n";
                if ($layanan->alur)              $context .= "Alur Prosedur: {$layanan->alur}\n";
                if ($layanan->persyaratan)       $context .= "Persyaratan: {$layanan->persyaratan}\n";
                $context .= "---\n";
            }
        }

        // 3. Berita & Pengumuman Terbaru
        $beritas = Berita::published()->latest()->limit(5)->get();
        if ($beritas->isNotEmpty()) {
            $context .= "\n=== BERITA & INFORMASI TERKINI ===\n";
            foreach ($beritas as $berita) {
                $context .= "Judul: {$berita->judul}\n";
                $context .= "Isi: " . \Str::limit(strip_tags($berita->isi), 250) . "\n";
                $context .= "Tanggal: " . $berita->published_at->format('d M Y') . "\n---\n";
            }
        }

        $pengumumans = Pengumuman::latest()->limit(5)->get();
        if ($pengumumans->isNotEmpty()) {
            $context .= "\n=== PENGUMUMAN RESMI ===\n";
            foreach ($pengumumans as $p) {
                $context .= "Judul: {$p->judul}\n";
                $context .= "Isi: " . \Str::limit(strip_tags($p->isi), 200) . "\n---\n";
            }
        }

        // 4. Dokumen Resmi / Publik Terbaru
        $dokumens = Dokumen::orderByDesc('published_at')->orderByDesc('created_at')->limit(10)->get();
        if ($dokumens->isNotEmpty()) {
            $context .= "\n=== DAFTAR DOKUMEN RESMI / PUBLIK ===\n";
            foreach ($dokumens as $dokumen) {
                $context .= "Judul Dokumen: {$dokumen->title}\n";
                if ($dokumen->description) $context .= "Deskripsi: {$dokumen->description}\n";
                $context .= "Tahun: {$dokumen->year}\n";
                $context .= "---\n";
            }
        }

        return $context ?: "\n[Tidak ada data di database. Jawab berdasarkan pengetahuan umum tentang Dinas PUPR Kabupaten Garut.]\n";
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
            $role       = $msg['sender_type'] === 'user' ? 'user' : 'model';
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
     * Respons default saat terjadi error teknis
     */
    private function defaultErrorResponse(): string
    {
        return "Mohon maaf, saat ini saya mengalami gangguan teknis dan tidak dapat memproses pertanyaan Anda.";
    }
}
