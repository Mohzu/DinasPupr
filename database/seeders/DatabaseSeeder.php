<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BeritaSeeder::class,
            PengumumanSeeder::class,
            PejabatStrukturalSeeder::class,
            DokumenSeeder::class,
            SejarahSeeder::class,
            VisiMisiSeeder::class,
            StrukturOrganisasiSeeder::class,
        ]);
    }
}
