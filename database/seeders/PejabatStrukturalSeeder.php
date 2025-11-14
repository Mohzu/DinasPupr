<?php

namespace Database\Seeders;

use App\Models\PejabatStruktural;
use Illuminate\Database\Seeder;

class PejabatStrukturalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pejabatData = [
            [
                'nama' => 'Dr. Ir. H. Ahmad Wijaya, M.T.',
                'jabatan' => 'Kepala Dinas Pekerjaan Umum dan Penataan Ruang',
                'foto' => 'img/pejabat/kepala-dinas.jpg',
                'urutan' => 1,
                'aktif' => true,
            ],
            [
                'nama' => 'Ir. Siti Nurhaliza, M.Si.',
                'jabatan' => 'Sekretaris Dinas',
                'foto' => 'img/pejabat/sekretaris.jpg',
                'urutan' => 2,
                'aktif' => true,
            ],
            [
                'nama' => 'Drs. Budi Santoso, M.M.',
                'jabatan' => 'Kepala Bidang Bina Marga',
                'foto' => 'img/pejabat/kabid-bina-marga.jpg',
                'urutan' => 3,
                'aktif' => true,
            ],
            [
                'nama' => 'Ir. Dewi Kartika, M.T.',
                'jabatan' => 'Kepala Bidang Cipta Karya',
                'foto' => 'img/pejabat/kabid-cipta-karya.jpg',
                'urutan' => 4,
                'aktif' => true,
            ],
            [
                'nama' => 'Drs. Agus Supriyadi, M.M.',
                'jabatan' => 'Kepala Bidang Penataan Ruang',
                'foto' => 'img/pejabat/kabid-penataan-ruang.jpg',
                'urutan' => 5,
                'aktif' => true,
            ],
            [
                'nama' => 'Ir. Rina Marlina, M.Si.',
                'jabatan' => 'Kepala Bidang Sumber Daya Air',
                'foto' => 'img/pejabat/kabid-sda.jpg',
                'urutan' => 6,
                'aktif' => true,
            ],
            [
                'nama' => 'Drs. Eko Prasetyo, M.M.',
                'jabatan' => 'Kepala Bidang Perumahan dan Permukiman',
                'foto' => 'img/pejabat/kabid-perumahan.jpg',
                'urutan' => 7,
                'aktif' => true,
            ],
            [
                'nama' => 'Ir. Sari Indah, M.T.',
                'jabatan' => 'Kepala Bidang Infrastruktur Wilayah',
                'foto' => 'img/pejabat/kabid-infrastruktur.jpg',
                'urutan' => 8,
                'aktif' => true,
            ],
            [
                'nama' => 'Drs. Bambang Hartono, M.M.',
                'jabatan' => 'Kepala Seksi Perencanaan dan Program',
                'foto' => 'img/pejabat/kasi-perencanaan.jpg',
                'urutan' => 9,
                'aktif' => true,
            ],
            [
                'nama' => 'Ir. Maya Sari, M.Si.',
                'jabatan' => 'Kepala Seksi Pengawasan dan Evaluasi',
                'foto' => 'img/pejabat/kasi-pengawasan.jpg',
                'urutan' => 10,
                'aktif' => true,
            ],
            [
                'nama' => 'Drs. Joko Widodo, M.M.',
                'jabatan' => 'Kepala Seksi Keuangan dan Aset',
                'foto' => 'img/pejabat/kasi-keuangan.jpg',
                'urutan' => 11,
                'aktif' => true,
            ],
            [
                'nama' => 'Ir. Linda Sari, M.T.',
                'jabatan' => 'Kepala Seksi Teknis dan Operasional',
                'foto' => 'img/pejabat/kasi-teknis.jpg',
                'urutan' => 12,
                'aktif' => true,
            ],
        ];

        foreach ($pejabatData as $pejabat) {
            PejabatStruktural::create($pejabat);
        }
    }
}

