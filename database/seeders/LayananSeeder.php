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
                'urutan' => 1,
            ],
            [
                'nama_layanan' => 'PKKPR',
                'slug' => 'pkkpr',
                'deskripsi_singkat' => 'Persetujuan Kesesuaian Kegiatan Pemanfaasan Ruang untuk Kegiatan usaha',
                'penjelasan_detail' => 'Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR) adalah persetujuan yang diberikan oleh pemerintah daerah kepada pelaku usaha atau masyarakat yang akan melakukan kegiatan pemanfaatan ruang. PKKPR memastikan bahwa kegiatan yang akan dilakukan sesuai dengan rencana tata ruang yang berlaku.',
                'alur' => "1. Pemohon mengajukan permohonan PKKPR\n2. Verifikasi berkas dan dokumen\n3. Koordinasi dengan instansi terkait\n4. Rapat tim teknis\n5. Penerbitan PKKPR",
                'persyaratan' => "- Fotokopi KTP pemohon\n- Fotokopi NPWP\n- Surat permohonan\n- Proposal rencana kegiatan\n- Peta lokasi",
                'urutan' => 2,
            ],
            [
                'nama_layanan' => 'Peil Banjir',
                'slug' => 'peil-banjir',
                'deskripsi_singkat' => 'Rekomendasi Evaluasi Bangunan untuk mengurangi resiko banjir',
                'penjelasan_detail' => 'Peil Banjir adalah rekomendasi ketinggian elevasi bangunan yang diterbitkan untuk memastikan bangunan yang akan dibangun berada pada ketinggian yang aman dari risiko banjir. Layanan ini penting untuk perencanaan pembangunan di daerah rawan banjir.',
                'alur' => "1. Pengajuan permohonan peil banjir\n2. Verifikasi kelengkapan berkas\n3. Survey lapangan dan pengukuran elevasi\n4. Analisis data hidrologi\n5. Penerbitan rekomendasi peil banjir",
                'persyaratan' => "- Fotokopi KTP pemohon\n- Surat permohonan\n- Fotokopi sertifikat tanah\n- Gambar denah lokasi\n- Foto lokasi terkini",
                'urutan' => 3,
            ],
            [
                'nama_layanan' => 'Irigasi Teknis',
                'slug' => 'irigasi-teknis',
                'deskripsi_singkat' => 'Perizinan pemanfaatan jaringan irigasi teknis',
                'penjelasan_detail' => 'Layanan Irigasi Teknis menyediakan perizinan untuk pemanfaatan jaringan irigasi teknis. Layanan ini mencakup pengelolaan dan pemeliharaan sistem irigasi untuk mendukung kegiatan pertanian dan kebutuhan air lainnya di Kabupaten Garut.',
                'alur' => "1. Pengajuan permohonan perizinan irigasi\n2. Verifikasi berkas persyaratan\n3. Survey dan peninjauan jaringan irigasi\n4. Evaluasi teknis\n5. Penerbitan izin pemanfaatan",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP\n- Peta lokasi jaringan irigasi\n- Rencana pemanfaatan air\n- Rekomendasi dari kelompok tani (jika ada)",
                'urutan' => 4,
            ],
            [
                'nama_layanan' => 'RUMIJA',
                'slug' => 'rumija',
                'deskripsi_singkat' => 'Ijin Pemanfaatan Ruang Milik Jalan',
                'penjelasan_detail' => 'RUMIJA (Ruang Milik Jalan) adalah izin pemanfaatan ruang milik jalan yang diberikan oleh Dinas PUPR. Izin ini diperlukan untuk kegiatan yang memanfaatkan ruang di sepanjang jalan, seperti pemasangan utilitas, pembangunan akses jalan masuk, atau kegiatan lainnya.',
                'alur' => "1. Pengajuan permohonan izin RUMIJA\n2. Verifikasi dokumen persyaratan\n3. Peninjauan lokasi oleh tim teknis\n4. Evaluasi dan pertimbangan teknis\n5. Penerbitan izin RUMIJA",
                'persyaratan' => "- Surat permohonan bermaterai\n- Fotokopi KTP\n- Gambar rencana pemanfaatan\n- Peta lokasi\n- Surat pernyataan",
                'urutan' => 5,
            ],
            [
                'nama_layanan' => 'SITEPLAN',
                'slug' => 'siteplan',
                'deskripsi_singkat' => 'Pengesahan Tata Letak dan Perencanaan Lahan',
                'penjelasan_detail' => 'SITEPLAN adalah layanan pengesahan tata letak dan perencanaan lahan. Layanan ini mencakup proses evaluasi dan pengesahan rencana tapak (site plan) untuk pembangunan perumahan, kawasan komersial, dan fasilitas umum lainnya.',
                'alur' => "1. Penyusunan dan pengajuan gambar site plan\n2. Verifikasi kelengkapan administrasi\n3. Evaluasi teknis oleh tim\n4. Revisi (jika diperlukan)\n5. Pengesahan site plan",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP dan NPWP\n- Fotokopi sertifikat tanah\n- Gambar site plan\n- KRK yang masih berlaku\n- Analisis dampak lingkungan",
                'urutan' => 6,
            ],
            [
                'nama_layanan' => 'PBG',
                'slug' => 'pbg',
                'deskripsi_singkat' => 'Persetujuan Bangunan Gedung',
                'penjelasan_detail' => 'Persetujuan Bangunan Gedung (PBG) adalah perizinan yang diberikan kepada pemilik bangunan gedung untuk membangun baru, mengubah, memperluas, mengurangi, dan/atau merawat bangunan gedung sesuai dengan standar teknis bangunan gedung.',
                'alur' => "1. Pengajuan permohonan PBG\n2. Pemeriksaan kelengkapan persyaratan\n3. Konsultasi perencanaan teknis\n4. Pemeriksaan desain teknis\n5. Penerbitan PBG",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP\n- Bukti kepemilikan tanah\n- KRK\n- Gambar rencana teknis arsitektur\n- Gambar rencana struktur\n- Gambar rencana utilitas",
                'urutan' => 7,
            ],
            [
                'nama_layanan' => 'SLF',
                'slug' => 'slf',
                'deskripsi_singkat' => 'Penerbitan Sertifikat Laik Fungsi bangunan gedung',
                'penjelasan_detail' => 'Sertifikat Laik Fungsi (SLF) adalah sertifikat yang diterbitkan oleh pemerintah daerah untuk menyatakan kelaikan fungsi suatu bangunan gedung baik secara administratif maupun teknis, sebelum pemanfaatan bangunan gedung.',
                'alur' => "1. Pengajuan permohonan SLF\n2. Pemeriksaan kelengkapan administrasi\n3. Pemeriksaan kelaikan fungsi bangunan\n4. Pengujian teknis (jika diperlukan)\n5. Penerbitan SLF",
                'persyaratan' => "- Surat permohonan\n- Fotokopi KTP\n- PBG / IMB yang berlaku\n- As-built drawing\n- Surat pernyataan pemeliharaan\n- Dokumentasi bangunan",
                'urutan' => 8,
            ],
        ];

        $adminId = \App\Models\User::whereIn('role', ['admin', 'kepala_dinas'])->first()?->id;

        foreach ($layanans as $layanan) {
            if ($adminId) {
                $layanan['user_id'] = $adminId;
            }
            Layanan::create($layanan);
        }
    }
}
