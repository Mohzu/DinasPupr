<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('pages/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('pages/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

// Profil pages
Route::get('pages/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
Route::get('pages/struktur-organisasi', [ProfilController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
Route::get('pages/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi-misi');
