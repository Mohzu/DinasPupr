<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KontakController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('pages/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('pages/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('pages/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('pages/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');

// Profil pages
Route::get('pages/sejarah', [SejarahController::class, 'index'])->name('sejarah');
Route::get('pages/strukturorganisasi', [StrukturOrganisasiController::class, 'index'])->name('strukturorganisasi');
Route::get('pages/visimisi', [VisiMisiController::class, 'index'])->name('visimisi');

Route::get('/berita/search', [BeritaController::class, 'search'])->name('berita.search');

// Pengaduan dan Kontak
Route::get('pages/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
Route::post('pages/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('pages/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('pages/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('pages/dokumen', [DokumenController::class, 'index'])->name('dokumen');
