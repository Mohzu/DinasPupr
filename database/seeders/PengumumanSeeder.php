<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user admin untuk dijadikan penulis
        $adminUser = User::where('email', 'admin@dinaspupr.com')->first();
        
        if (!$adminUser) {
            $this->command->warn('Admin user tidak ditemukan. Pastikan UserSeeder sudah dijalankan terlebih dahulu.');
            return;
        }
        
        $pengumumanData = [
            [
                'judul' => 'Pengumuman Lelang Proyek Pembangunan Jalan',
                'isi' => '<p>Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten mengumumkan akan diadakannya lelang untuk proyek pembangunan jalan sepanjang 10 km. Lelang akan dilaksanakan pada tanggal 15 Januari 2024 pukul 09.00 WIB di Aula Dinas PUPR.</p><p>Persyaratan dan dokumen lelang dapat diunduh di website resmi dinas atau diambil langsung di sekretariat dinas.</p>',
                'lampiran' => 'dokumen/lelang-jalan.pdf',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(1),
            ],
            [
                'judul' => 'Jadwal Libur Nasional dan Cuti Bersama',
                'isi' => '<p>Berdasarkan Surat Keputusan Kepala Dinas PUPR, berikut adalah jadwal libur nasional dan cuti bersama untuk tahun 2024:</p><ul><li>1 Januari 2024 - Tahun Baru</li><li>8 Maret 2024 - Isra Miraj</li><li>29 Maret 2024 - Jumat Agung</li><li>10-11 April 2024 - Idul Fitri</li><li>1 Mei 2024 - Hari Buruh</li><li>9 Mei 2024 - Kenaikan Isa Almasih</li><li>16 Mei 2024 - Hari Raya Waisak</li><li>17 Juni 2024 - Idul Adha</li><li>17 Agustus 2024 - Hari Kemerdekaan RI</li><li>16 September 2024 - Maulid Nabi</li><li>25 Desember 2024 - Hari Natal</li></ul>',
                'lampiran' => 'dokumen/jadwal-libur.pdf',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(3),
            ],
            [
                'judul' => 'Penerimaan CPNS Dinas PUPR Tahun 2024',
                'isi' => '<p>Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten membuka kesempatan bagi putra-putri terbaik untuk mengabdi sebagai Calon Pegawai Negeri Sipil (CPNS) dengan formasi sebagai berikut:</p><ul><li>Teknik Sipil - 3 orang</li><li>Arsitektur - 2 orang</li><li>Administrasi - 2 orang</li><li>Keuangan - 1 orang</li></ul><p>Pendaftaran dibuka mulai tanggal 1 Februari 2024 dan ditutup pada tanggal 28 Februari 2024. Informasi lengkap dapat dilihat di website resmi BKN.</p>',
                'lampiran' => 'dokumen/penerimaan-cpns.pdf',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(5),
            ],
            [
                'judul' => 'Perubahan Jam Kerja Selama Bulan Ramadhan',
                'isi' => '<p>Dalam rangka menyambut bulan suci Ramadhan 1445 H, Dinas PUPR mengumumkan perubahan jam kerja sebagai berikut:</p><p><strong>Jam Kerja:</strong><br>Senin - Kamis: 07.00 - 14.00 WIB<br>Jumat: 07.00 - 11.00 WIB</p><p>Perubahan jam kerja ini berlaku mulai tanggal 10 Maret 2024 hingga tanggal 8 April 2024. Setelah tanggal tersebut, jam kerja kembali normal.</p>',
                'lampiran' => null,
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(7),
            ],
            [
                'judul' => 'Pengumuman Hasil Seleksi Administrasi Lelang',
                'isi' => '<p>Dinas PUPR mengumumkan hasil seleksi administrasi untuk paket lelang "Pembangunan Gedung Kantor Kecamatan Sukajaya" dengan rincian sebagai berikut:</p><p><strong>Perusahaan yang Lulus:</strong><br>1. PT. Konstruksi Maju Jaya<br>2. CV. Bangun Bersama<br>3. PT. Mandiri Konstruksi</p><p><strong>Perusahaan yang Tidak Lulus:</strong><br>1. PT. Abadi Jaya (Dokumen tidak lengkap)<br>2. CV. Sukses Mandiri (Tidak memenuhi kualifikasi)</p><p>Pembukaan penawaran akan dilaksanakan pada tanggal 20 Januari 2024 pukul 10.00 WIB.</p>',
                'lampiran' => 'dokumen/hasil-seleksi.pdf',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(10),
            ],
            [
                'judul' => 'Sosialisasi Program Peningkatan Infrastruktur Desa',
                'isi' => '<p>Dinas PUPR akan menyelenggarakan sosialisasi program peningkatan infrastruktur desa untuk seluruh kepala desa dan perangkat desa di kabupaten. Kegiatan akan dilaksanakan pada:</p><p><strong>Hari/Tanggal:</strong> Sabtu, 25 Januari 2024<br><strong>Waktu:</strong> 08.00 - 16.00 WIB<br><strong>Tempat:</strong> Aula Dinas PUPR<br><strong>Peserta:</strong> Kepala Desa, Sekretaris Desa, dan Ketua BPD</p><p>Kegiatan ini bertujuan untuk memberikan pemahaman tentang mekanisme pengajuan proposal infrastruktur desa dan tata cara pelaksanaannya.</p>',
                'lampiran' => 'dokumen/sosialisasi-infrastruktur.pdf',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(12),
            ],
        ];

        foreach ($pengumumanData as $pengumuman) {
            $pengumuman['user_id'] = $adminUser->id;
            Pengumuman::create($pengumuman);
        }
    }
}
