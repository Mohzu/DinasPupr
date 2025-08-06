<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('pages/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('pages/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
