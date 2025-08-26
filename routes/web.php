<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\DokumenController;

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

// Static pages: contact and pengaduan
Route::view('pages/kontak', 'pages.kontak')->name('kontak');
Route::view('pages/pengaduan', 'pages.pengaduan')->name('pengaduan');

Route::get('pages/dokumen', [DokumenController::class, 'index'])->name('dokumen');
