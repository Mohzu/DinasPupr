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
        // Admin user 
        User::create([
            'name' => 'Administrator Dinas PUPR',
            'email' => env('ADMIN_EMAIL', 'admin@dinaspuprgarut.cloud'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            'role' => 'admin',
        ]);

        // Admin tambahan untuk keperluan backup/alternatif
        User::create([
            'name' => 'Kepala Dinas PUPR',
            'email' => env('ADMIN_ALT_EMAIL', 'kepala@dinaspuprgarut.cloud'),
            'password' => Hash::make(env('ADMIN_ALT_PASSWORD', 'password')),
            'role' => 'kepala_dinas',
        ]);
    }
}
