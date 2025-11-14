<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Seeder;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokumenData = [
            [
                'title' => 'Rencana Strategis Dinas PUPR 2024-2029',
                'description' => 'Dokumen perencanaan strategis Dinas Pekerjaan Umum dan Penataan Ruang untuk periode 2024-2029 yang mencakup visi, misi, tujuan, dan program kerja dinas.',
                'file_path' => 'dokumen/renstra-2024-2029.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Laporan Kinerja Dinas PUPR Tahun 2023',
                'description' => 'Laporan kinerja tahunan Dinas PUPR yang berisi capaian program, realisasi anggaran, dan evaluasi kinerja selama tahun 2023.',
                'file_path' => 'dokumen/laporan-kinerja-2023.pdf',
                'year' => 2023,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Peraturan Bupati tentang Penataan Ruang',
                'description' => 'Peraturan Bupati Nomor 12 Tahun 2024 tentang Penataan Ruang Wilayah Kabupaten yang mengatur zonasi dan pemanfaatan ruang.',
                'file_path' => 'dokumen/perbup-penataan-ruang.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Standar Operasional Prosedur (SOP) Layanan',
                'description' => 'Dokumen SOP untuk berbagai layanan Dinas PUPR termasuk perizinan, konsultasi teknis, dan pelayanan publik lainnya.',
                'file_path' => 'dokumen/sop-layanan.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Panduan Teknis Konstruksi Jalan',
                'description' => 'Panduan teknis untuk konstruksi jalan yang mencakup spesifikasi teknis, metode pelaksanaan, dan standar kualitas.',
                'file_path' => 'dokumen/panduan-konstruksi-jalan.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => 'Laporan Audit Internal Tahun 2023',
                'description' => 'Hasil audit internal yang dilakukan untuk mengevaluasi efektivitas sistem pengendalian internal dan kepatuhan terhadap peraturan.',
                'file_path' => 'dokumen/audit-internal-2023.pdf',
                'year' => 2023,
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Master Plan Infrastruktur Kabupaten',
                'description' => 'Dokumen master plan infrastruktur yang berisi rencana pengembangan infrastruktur jangka panjang di wilayah kabupaten.',
                'file_path' => 'dokumen/master-plan-infrastruktur.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(35),
            ],
            [
                'title' => 'Pedoman Pengelolaan Aset Dinas',
                'description' => 'Pedoman pengelolaan aset milik Dinas PUPR yang mencakup inventarisasi, pemeliharaan, dan pengawasan aset.',
                'file_path' => 'dokumen/pedoman-pengelolaan-aset.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'Laporan Evaluasi Program Tahun 2023',
                'description' => 'Laporan evaluasi program kerja Dinas PUPR tahun 2023 yang berisi analisis capaian, kendala, dan rekomendasi perbaikan.',
                'file_path' => 'dokumen/evaluasi-program-2023.pdf',
                'year' => 2023,
                'published_at' => now()->subDays(45),
            ],
            [
                'title' => 'Buku Panduan Pelayanan Publik',
                'description' => 'Buku panduan untuk masyarakat dalam mengakses berbagai layanan yang disediakan oleh Dinas PUPR.',
                'file_path' => 'dokumen/panduan-pelayanan-publik.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(50),
            ],
            [
                'title' => 'Kontrak Kerja Sama dengan Kontraktor',
                'description' => 'Template kontrak kerja sama dengan kontraktor untuk berbagai proyek infrastruktur yang dikelola Dinas PUPR.',
                'file_path' => 'dokumen/template-kontrak-kontraktor.pdf',
                'year' => 2024,
                'published_at' => now()->subDays(55),
            ],
            [
                'title' => 'Laporan Keuangan Bulanan Desember 2023',
                'description' => 'Laporan keuangan bulanan Dinas PUPR untuk bulan Desember 2023 yang berisi realisasi anggaran dan posisi keuangan.',
                'file_path' => 'dokumen/laporan-keuangan-des-2023.pdf',
                'year' => 2023,
                'published_at' => now()->subDays(60),
            ],
        ];

        foreach ($dokumenData as $dokumen) {
            Dokumen::create($dokumen);
        }
    }
}

