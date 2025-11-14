<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
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
        
        $beritaData = [
            [
                'judul' => 'Pembangunan Jembatan Penghubung Antar Desa',
                'slug' => 'pembangunan-jembatan-penghubung-antar-desa',
                'isi' => '<p>Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten telah memulai pembangunan jembatan penghubung antar desa yang akan memudahkan akses transportasi masyarakat. Proyek ini diharapkan selesai dalam waktu 6 bulan ke depan.</p><p>Jembatan dengan panjang 50 meter ini akan menghubungkan Desa Sukamaju dengan Desa Sukamakmur, yang selama ini hanya bisa diakses melalui jalan memutar sejauh 15 km.</p>',
                'gambar' => 'img/berita/jembatan.jpg',
                'kategori' => 'Infrastruktur',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(2),
            ],
            [
                'judul' => 'Perbaikan Jalan Raya Utama Kabupaten',
                'slug' => 'perbaikan-jalan-raya-utama-kabupaten',
                'isi' => '<p>Pemerintah Kabupaten melalui Dinas PUPR telah mengalokasikan dana sebesar Rp 2 miliar untuk perbaikan jalan raya utama yang menghubungkan pusat kota dengan kecamatan-kecamatan di sekitarnya.</p><p>Perbaikan meliputi pengerasan jalan, penambahan drainase, dan pemasangan rambu-rambu lalu lintas untuk meningkatkan keselamatan pengguna jalan.</p>',
                'gambar' => 'img/berita/jalan-raya.jpg',
                'kategori' => 'Infrastruktur',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(5),
            ],
            [
                'judul' => 'Program Sanitasi Lingkungan untuk Masyarakat',
                'slug' => 'program-sanitasi-lingkungan-untuk-masyarakat',
                'isi' => '<p>Dinas PUPR meluncurkan program sanitasi lingkungan yang bertujuan untuk meningkatkan kualitas hidup masyarakat melalui pembangunan MCK umum dan sistem pengelolaan sampah yang terintegrasi.</p><p>Program ini akan dilaksanakan di 10 desa prioritas dengan target selesai pada akhir tahun ini.</p>',
                'gambar' => 'img/berita/sanitasi.jpg',
                'kategori' => 'Program',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(7),
            ],
            [
                'judul' => 'Pembangunan Gedung Serbaguna Kecamatan',
                'slug' => 'pembangunan-gedung-serbaguna-kecamatan',
                'isi' => '<p>Pembangunan gedung serbaguna di Kecamatan Sukajaya telah dimulai dengan anggaran sebesar Rp 1,5 miliar. Gedung ini akan digunakan untuk berbagai kegiatan masyarakat seperti rapat, acara budaya, dan kegiatan sosial.</p><p>Gedung dengan kapasitas 200 orang ini dilengkapi dengan fasilitas modern dan aksesibilitas untuk penyandang disabilitas.</p>',
                'gambar' => 'img/berita/gedung-serbaguna.jpg',
                'kategori' => 'Pembangunan',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(10),
            ],
            [
                'judul' => 'Penanaman Pohon di Sepanjang Jalan Protokol',
                'slug' => 'penanaman-pohon-di-sepanjang-jalan-protokol',
                'isi' => '<p>Dalam rangka Hari Lingkungan Hidup Sedunia, Dinas PUPR mengadakan kegiatan penanaman 1000 pohon di sepanjang jalan protokol kota. Kegiatan ini melibatkan berbagai elemen masyarakat termasuk pelajar, mahasiswa, dan organisasi lingkungan.</p><p>Jenis pohon yang ditanam meliputi pohon peneduh seperti trembesi, mahoni, dan angsana yang cocok untuk iklim tropis.</p>',
                'gambar' => 'img/berita/penanaman-pohon.jpg',
                'kategori' => 'Lingkungan',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(12),
            ],
            [
                'judul' => 'Pembangunan Drainase Perkotaan',
                'slug' => 'pembangunan-drainase-perkotaan',
                'isi' => '<p>Untuk mengatasi masalah banjir di kawasan perkotaan, Dinas PUPR membangun sistem drainase yang terintegrasi dengan panjang total 5 km. Proyek ini menggunakan teknologi modern dengan sistem pompa otomatis.</p><p>Pembangunan drainase ini diharapkan dapat mengurangi genangan air saat musim hujan dan meningkatkan kenyamanan masyarakat.</p>',
                'gambar' => 'img/berita/drainase.jpg',
                'kategori' => 'Infrastruktur',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(15),
            ],
            [
                'judul' => 'Pelatihan Teknis untuk Kontraktor Lokal',
                'slug' => 'pelatihan-teknis-untuk-kontraktor-lokal',
                'isi' => '<p>Dinas PUPR menyelenggarakan pelatihan teknis untuk 50 kontraktor lokal dalam rangka meningkatkan kapasitas dan kualitas pekerjaan konstruksi di daerah. Pelatihan meliputi teknik konstruksi modern, manajemen proyek, dan keselamatan kerja.</p><p>Kegiatan ini merupakan bagian dari program pemberdayaan ekonomi lokal dan peningkatan standar konstruksi di kabupaten.</p>',
                'gambar' => 'img/berita/pelatihan-kontraktor.jpg',
                'kategori' => 'Program',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(18),
            ],
            [
                'judul' => 'Pembangunan Taman Kota Modern',
                'slug' => 'pembangunan-taman-kota-modern',
                'isi' => '<p>Pembangunan taman kota modern seluas 2 hektar telah dimulai di pusat kota. Taman ini akan dilengkapi dengan fasilitas olahraga, area bermain anak, jogging track, dan ruang terbuka hijau yang asri.</p><p>Taman ini diharapkan menjadi ruang publik yang nyaman untuk aktivitas masyarakat dan meningkatkan kualitas hidup perkotaan.</p>',
                'gambar' => 'img/berita/taman-kota.jpg',
                'kategori' => 'Pembangunan',
                'penulis' => 'Administrator Dinas PUPR',
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($beritaData as $berita) {
            $berita['user_id'] = $adminUser->id;
            Berita::create($berita);
        }
    }
}
