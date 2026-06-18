<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'nama_layanan' => 'KRK',
                'slug' => 'krk',
                'deskripsi_singkat' => 'Keterangan Rencana Kabupaten/Kota untuk rencana pemanfaatan ruang',
                'penjelasan_detail' => 'Keterangan Rencana Kabupaten/Kota (KRK) adalah dokumen yang diterbitkan oleh pemerintah daerah yang berisi informasi tentang rencana tata ruang untuk suatu lokasi tertentu. Dokumen ini mencakup peruntukan lahan, intensitas pemanfaatan ruang (KDB, KLB, KDH), serta ketentuan teknis lainnya yang berlaku di lokasi tersebut.',
                'alur' => "1. Pemohon mengajukan permohonan KRK ke Dinas PUPR\n2. Verifikasi kelengkapan berkas oleh petugas\n3. Peninjauan lokasi (jika diperlukan)\n4. Analisis kesesuaian dengan RTRW\n5. Penerbitan dokumen KRK",
                'persyaratan' => "- Fotokopi KTP pemohon\n- Fotokopi sertifikat tanah / bukti kepemilikan\n- Surat permohonan bermaterai\n- Gambar lokasi / peta situasi\n- Pas foto 3x4 (2 lembar)",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>',
                'warna' => '#3b82f6',
                'urutan' => 1,
            ],
            [
                'nama_layanan' => 'PKKPR',
                'slug' => 'pkkpr',
                'deskripsi_singkat' => 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang untuk Kegiatan usaha',
                'penjelasan_detail' => 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) adalah persetujuan yang diberikan oleh pemerintah daerah kepada pelaku usaha atau masyarakat yang akan melakukan kegiatan pemanfaatan ruang. PKKPR memastikan bahwa kegiatan yang akan dilakukan sesuai dengan rencana tata ruang yang berlaku.',
                'alur' => "1. Pemohon mengajukan permohonan PKKPR\n2. Verifikasi berkas dan dokumen\n3. Koordinasi dengan instansi terkait\n4. Rapat tim teknis\n5. Penerbitan PKKPR",
                'persyaratan' => "- Fotokopi KTP pemohon\n- Fotokopi NPWP\n- Surat permohonan\n- Proposal rencana kegiatan\n- Peta lokasi",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                'warna' => '#10b981',
                'urutan' => 2,
            ],
            [
                'nama_layanan' => 'Peil Banjir',
                'slug' => 'peil-banjir',
                'deskripsi_singkat' => 'Rekomendasi Evaluasi Bangunan untuk mengurangi resiko banjir',
                'penjelasan_detail' => 'Peil Banjir adalah rekomendasi ketinggian elevasi bangunan yang diterbitkan untuk memastikan bangunan yang akan dibangun berada pada ketinggian yang aman dari risiko banjir. Layanan ini penting untuk perencanaan pembangunan di daerah rawan banjir.',
                'alur' => "1. Pengajuan permohonan peil banjir\n2. Verifikasi kelengkapan berkas\n3. Survey lapangan dan pengukuran elevasi\n4. Analisis data hidrologi\n5. Penerbitan rekomendasi peil banjir",
                'persyaratan' => "- Fotokopi KTP pemohon\n- Surat permohonan\n- Fotokopi sertifikat tanah\n- Gambar denah lokasi\n- Foto lokasi terkini",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>',
                'warna' => '#06b6d4',
                'urutan' => 3,
            ],
            [
                'nama_layanan' => 'Irigasi Teknis',
                'slug' => 'irigasi-teknis',
                'deskripsi_singkat' => 'Perizinan pemanfaatan jaringan irigasi teknis',
                'penjelasan_detail' => 'Layanan Irigasi Teknis menyediakan perizinan untuk pemanfaatan jaringan irigasi teknis. Layanan ini mencakup pengelolaan dan pemeliharaan sistem irigasi untuk mendukung kegiatan pertanian dan kebutuhan air lainnya di Kabupaten Garut.',
                'alur' => "1. Pengajuan permohonan perizinan irigasi\n2. Verifikasi berkas persyaratan\n3. Survey dan peninjauan jaringan irigasi\n4. Evaluasi teknis\n5. Penerbitan izin pemanfaatan",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP\n- Peta lokasi jaringan irigasi\n- Rencana pemanfaatan air\n- Rekomendasi dari kelompok tani (jika ada)",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20a8 8 0 0 0 8-8 8 8 0 0 0-8-8 8 8 0 0 0-8 8 8 8 0 0 0 8 8z"/><path d="M12 14a2 2 0 0 0 2-2 2 2 0 0 0-2-2 2 2 0 0 0-2 2 2 2 0 0 0 2 2z"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/></svg>',
                'warna' => '#84cc16',
                'urutan' => 4,
            ],
            [
                'nama_layanan' => 'RUMIJA',
                'slug' => 'rumija',
                'deskripsi_singkat' => 'Ijin Pemanfaatan Ruang Milik Jalan',
                'penjelasan_detail' => 'RUMIJA (Ruang Milik Jalan) adalah izin pemanfaatan ruang milik jalan yang diberikan oleh Dinas PUPR. Izin ini diperlukan untuk kegiatan yang memanfaatkan ruang di sepanjang jalan, seperti pemasangan utilitas, pembangunan akses jalan masuk, atau kegiatan lainnya.',
                'alur' => "1. Pengajuan permohonan izin RUMIJA\n2. Verifikasi dokumen persyaratan\n3. Peninjauan lokasi oleh tim teknis\n4. Evaluasi dan pertimbangan teknis\n5. Penerbitan izin RUMIJA",
                'persyaratan' => "- Surat permohonan bermaterai\n- Fotokopi KTP\n- Gambar rencana pemanfaatan\n- Peta lokasi\n- Surat pernyataan",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
                'warna' => '#f59e0b',
                'urutan' => 5,
            ],
            [
                'nama_layanan' => 'SITEPLAN',
                'slug' => 'siteplan',
                'deskripsi_singkat' => 'Pengesahan Tata Letak dan Perencanaan Lahan',
                'penjelasan_detail' => 'SITEPLAN adalah layanan pengesahan tata letak dan perencanaan lahan. Layanan ini mencakup proses evaluasi dan pengesahan rencana tapak (site plan) untuk pembangunan perumahan, kawasan komersial, dan fasilitas umum lainnya.',
                'alur' => "1. Penyusunan dan pengajuan gambar site plan\n2. Verifikasi kelengkapan administrasi\n3. Evaluasi teknis oleh tim\n4. Revisi (jika diperlukan)\n5. Pengesahan site plan",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP dan NPWP\n- Fotokopi sertifikat tanah\n- Gambar site plan\n- KRK yang masih berlaku\n- Analisis dampak lingkungan",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>',
                'warna' => '#a855f7',
                'urutan' => 6,
            ],
            [
                'nama_layanan' => 'PBG',
                'slug' => 'pbg',
                'deskripsi_singkat' => 'Persetujuan Bangunan Gedung',
                'penjelasan_detail' => 'Persetujuan Bangunan Gedung (PBG) adalah perizinan yang diberikan kepada pemilik bangunan gedung untuk membangun baru, mengubah, memperluas, mengurangi, dan/atau merawat bangunan gedung sesuai dengan standar teknis bangunan gedung.',
                'alur' => "1. Pengajuan permohonan PBG\n2. Pemeriksaan kelengkapan persyaratan\n3. Konsultasi perencanaan teknis\n4. Pemeriksaan desain teknis\n5. Penerbitan PBG",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP\n- Bukti kepemilikan tanah\n- KRK\n- Gambar rencana teknis arsitektur\n- Gambar rencana struktur\n- Gambar rencana utilitas",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
                'warna' => '#6366f1',
                'urutan' => 7,
            ],
            [
                'nama_layanan' => 'SLF',
                'slug' => 'slf',
                'deskripsi_singkat' => 'Penerbitan Sertifikat Laik Fungsi bangunan gedung',
                'penjelasan_detail' => 'Sertifikat Laik Fungsi (SLF) adalah sertifikat yang diterbitkan oleh pemerintah daerah untuk menyatakan kelaikan fungsi suatu bangunan gedung baik secara administratif maupun teknis, sebelum pemanfaatan bangunan gedung.',
                'alur' => "1. Pengajuan permohonan SLF\n2. Pemeriksaan kelengkapan administrasi\n3. Pemeriksaan kelaikan fungsi bangunan\n4. Pengujian teknis (jika diperlukan)\n5. Penerbitan SLF",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP\n- PBG / IMB yang berlaku\n- As-built drawing\n- Surat pernyataan pemeliharaan\n- Dokumentasi bangunan",
                'ikon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                'warna' => '#0ea5e9',
                'urutan' => 8,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
