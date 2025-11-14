<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StrukturOrganisasi::create([
            'title' => 'Struktur Organisasi',
            'content' => '<p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">Hierarki dan susunan organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut</p>',
            'gambar' => null,
            'status' => 'published',
        ]);
    }
}
