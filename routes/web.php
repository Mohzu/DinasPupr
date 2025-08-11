<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\VisiMisiController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('pages/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('pages/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

// Profil pages
Route::get('pages/sejarah', [SejarahController::class, 'index'])->name('sejarah');
Route::get('pages/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi');
Route::get('pages/visi-misi', [VisiMisiController::class, 'index'])->name('visi-misi');
