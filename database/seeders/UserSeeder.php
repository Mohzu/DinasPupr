<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user untuk mengelola konten melalui Filament
        User::create([
            'name' => 'Administrator Dinas PUPR',
            'email' => 'admin@dinaspupr.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Admin tambahan untuk keperluan backup/alternatif
        User::create([
            'name' => 'Kepala Dinas PUPR',
            'email' => 'kepala@dinaspupr.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
    }
}
