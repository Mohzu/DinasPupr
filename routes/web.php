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
use App\Http\Controllers\PejabatStrukturalController;
use App\Http\Controllers\DashboardController;

// ========== FRONTEND ROUTES ==========
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

// ========== AUTH ROUTES ==========
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ========== ADMIN VIEW ROUTES ==========
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Berita
    Route::get('/berita', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\Berita::query();
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        $beritas = $query->latest()->paginate(15);
        $kategoris = \App\Models\Berita::select('kategori')->distinct()->whereNotNull('kategori')->pluck('kategori');
        return view('admin.berita.index', compact('beritas', 'kategoris'));
    })->name('berita.index');
    Route::get('/berita/create', function() { return view('admin.berita.create'); })->name('berita.create');
    Route::get('/berita/{id}/edit', function($id) { return view('admin.berita.edit', ['berita' => \App\Models\Berita::findOrFail($id)]); })->name('berita.edit');
    Route::post('/berita', [BeritaController::class, 'apiStore'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'apiUpdate'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'apiDestroy'])->name('berita.destroy');
    
    // Pengumuman
    Route::get('/pengumuman', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\Pengumuman::query();
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
            });
        }
        $pengumumans = $query->latest()->paginate(15);
        return view('admin.pengumuman.index', compact('pengumumans'));
    })->name('pengumuman.index');
    Route::get('/pengumuman/create', function() { return view('admin.pengumuman.create'); })->name('pengumuman.create');
    Route::get('/pengumuman/{id}/edit', function($id) { return view('admin.pengumuman.edit', ['pengumuman' => \App\Models\Pengumuman::findOrFail($id)]); })->name('pengumuman.edit');
    Route::post('/pengumuman', [PengumumanController::class, 'apiStore'])->name('pengumuman.store');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'apiUpdate'])->name('pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'apiDestroy'])->name('pengumuman.destroy');
    
    // Dokumen
    Route::get('/dokumen', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\Dokumen::query();
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }
        $dokumens = $query->latest()->paginate(15);
        $years = \App\Models\Dokumen::select('year')->distinct()->orderByDesc('year')->pluck('year');
        return view('admin.dokumen.index', compact('dokumens', 'years'));
    })->name('dokumen.index');
    Route::get('/dokumen/create', function() { return view('admin.dokumen.create'); })->name('dokumen.create');
    Route::get('/dokumen/{id}/edit', function($id) { return view('admin.dokumen.edit', ['dokumen' => \App\Models\Dokumen::findOrFail($id)]); })->name('dokumen.edit');
    Route::post('/dokumen', [DokumenController::class, 'apiStore'])->name('dokumen.store');
    Route::put('/dokumen/{id}', [DokumenController::class, 'apiUpdate'])->name('dokumen.update');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'apiDestroy'])->name('dokumen.destroy');
    
    // Sejarah
    Route::get('/sejarah', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\Sejarah::query();
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        $sejarahs = $query->latest()->paginate(15);
        return view('admin.sejarah.index', compact('sejarahs'));
    })->name('sejarah.index');
    Route::get('/sejarah/create', function() { return view('admin.sejarah.create'); })->name('sejarah.create');
    Route::get('/sejarah/{id}/edit', function($id) { return view('admin.sejarah.edit', ['sejarah' => \App\Models\Sejarah::findOrFail($id)]); })->name('sejarah.edit');
    Route::post('/sejarah', [SejarahController::class, 'apiStore'])->name('sejarah.store');
    Route::put('/sejarah/{id}', [SejarahController::class, 'apiUpdate'])->name('sejarah.update');
    Route::delete('/sejarah/{id}', [SejarahController::class, 'apiDestroy'])->name('sejarah.destroy');
    
    // VisiMisi
    Route::get('/visimisi', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\VisiMisi::query();
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        $visiMisis = $query->latest()->paginate(15);
        return view('admin.visimisi.index', compact('visiMisis'));
    })->name('visimisi.index');
    Route::get('/visimisi/create', function() { return view('admin.visimisi.create'); })->name('visimisi.create');
    Route::get('/visimisi/{id}/edit', function($id) { return view('admin.visimisi.edit', ['visimisi' => \App\Models\VisiMisi::findOrFail($id)]); })->name('visimisi.edit');
    Route::post('/visimisi', [VisiMisiController::class, 'apiStore'])->name('visimisi.store');
    Route::put('/visimisi/{id}', [VisiMisiController::class, 'apiUpdate'])->name('visimisi.update');
    Route::delete('/visimisi/{id}', [VisiMisiController::class, 'apiDestroy'])->name('visimisi.destroy');
    
    // Struktur Organisasi
    Route::get('/struktur', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\StrukturOrganisasi::query();
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        $strukturOrganisasis = $query->latest()->paginate(15);
        return view('admin.struktur.index', compact('strukturOrganisasis'));
    })->name('struktur.index');
    Route::get('/struktur/create', function() { return view('admin.struktur.create'); })->name('struktur.create');
    Route::get('/struktur/{id}/edit', function($id) { return view('admin.struktur.edit', ['struktur' => \App\Models\StrukturOrganisasi::findOrFail($id)]); })->name('struktur.edit');
    Route::post('/struktur', [StrukturOrganisasiController::class, 'apiStore'])->name('struktur.store');
    Route::put('/struktur/{id}', [StrukturOrganisasiController::class, 'apiUpdate'])->name('struktur.update');
    Route::delete('/struktur/{id}', [StrukturOrganisasiController::class, 'apiDestroy'])->name('struktur.destroy');
    
    // Pejabat Struktural
    Route::get('/pejabat', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\PejabatStruktural::query();
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jabatan', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->has('aktif') && $request->aktif !== '') {
            $query->where('aktif', $request->aktif);
        }
        $pejabatStrukturals = $query->orderBy('urutan')->paginate(15);
        return view('admin.pejabat.index', compact('pejabatStrukturals'));
    })->name('pejabat.index');
    Route::get('/pejabat/create', function() { return view('admin.pejabat.create'); })->name('pejabat.create');
    Route::get('/pejabat/{id}/edit', function($id) { return view('admin.pejabat.edit', ['pejabat' => \App\Models\PejabatStruktural::findOrFail($id)]); })->name('pejabat.edit');
    Route::post('/pejabat', [PejabatStrukturalController::class, 'apiStore'])->name('pejabat.store');
    Route::put('/pejabat/{id}', [PejabatStrukturalController::class, 'apiUpdate'])->name('pejabat.update');
    Route::delete('/pejabat/{id}', [PejabatStrukturalController::class, 'apiDestroy'])->name('pejabat.destroy');
    
    // Pengaduan
    Route::get('/pengaduan', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\Pengaduan::query();
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subjek', 'like', '%' . $request->search . '%')
                  ->orWhere('pesan', 'like', '%' . $request->search . '%');
            });
        }
        $pengaduans = $query->latest()->paginate(15);
        $stats = [
            'total' => \App\Models\Pengaduan::count(),
            'baru' => \App\Models\Pengaduan::where('status', 'baru')->count(),
            'diproses' => \App\Models\Pengaduan::where('status', 'diproses')->count(),
            'selesai' => \App\Models\Pengaduan::where('status', 'selesai')->count(),
        ];
        return view('admin.pengaduan.index', compact('pengaduans', 'stats'));
    })->name('pengaduan.index');
    Route::get('/pengaduan/{id}', function($id) { return view('admin.pengaduan.show', ['pengaduan' => \App\Models\Pengaduan::findOrFail($id)]); })->name('pengaduan.show');
    Route::get('/pengaduan/{id}/edit', function($id) { return view('admin.pengaduan.edit', ['pengaduan' => \App\Models\Pengaduan::findOrFail($id)]); })->name('pengaduan.edit');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'apiUpdate'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'apiDestroy'])->name('pengaduan.destroy');
    
    // Kontak
    Route::get('/kontak', function(\Illuminate\Http\Request $request) {
        $query = \App\Models\Kontak::query();
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subjek', 'like', '%' . $request->search . '%')
                  ->orWhere('pesan', 'like', '%' . $request->search . '%');
            });
        }
        $kontaks = $query->latest()->paginate(15);
        $stats = [
            'total' => \App\Models\Kontak::count(),
            'baru' => \App\Models\Kontak::where('status', 'baru')->count(),
            'dibalas' => \App\Models\Kontak::where('status', 'dibalas')->count(),
            'selesai' => \App\Models\Kontak::where('status', 'selesai')->count(),
        ];
        return view('admin.kontak.index', compact('kontaks', 'stats'));
    })->name('kontak.index');
    Route::get('/kontak/{id}', function($id) { return view('admin.kontak.show', ['kontak' => \App\Models\Kontak::findOrFail($id)]); })->name('kontak.show');
    Route::get('/kontak/{id}/edit', function($id) { return view('admin.kontak.edit', ['kontak' => \App\Models\Kontak::findOrFail($id)]); })->name('kontak.edit');
    Route::put('/kontak/{id}', [KontakController::class, 'apiUpdate'])->name('kontak.update');
    Route::delete('/kontak/{id}', [KontakController::class, 'apiDestroy'])->name('kontak.destroy');
});

// ========== ADMIN API ROUTES ==========
Route::middleware(['auth'])->prefix('api/admin')->name('api.admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'apiIndex'])->name('dashboard');
    
    // Berita
    Route::get('/berita', [BeritaController::class, 'apiIndex'])->name('berita.index');
    Route::get('/berita/{id}', [BeritaController::class, 'apiShow'])->name('berita.show');
    Route::post('/berita', [BeritaController::class, 'apiStore'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'apiUpdate'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'apiDestroy'])->name('berita.destroy');
    
    // Pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'apiIndex'])->name('pengumuman.index');
    Route::get('/pengumuman/{id}', [PengumumanController::class, 'apiShow'])->name('pengumuman.show');
    Route::post('/pengumuman', [PengumumanController::class, 'apiStore'])->name('pengumuman.store');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'apiUpdate'])->name('pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'apiDestroy'])->name('pengumuman.destroy');
    
    // Dokumen
    Route::get('/dokumen', [DokumenController::class, 'apiIndex'])->name('dokumen.index');
    Route::get('/dokumen/{id}', [DokumenController::class, 'apiShow'])->name('dokumen.show');
    Route::post('/dokumen', [DokumenController::class, 'apiStore'])->name('dokumen.store');
    Route::put('/dokumen/{id}', [DokumenController::class, 'apiUpdate'])->name('dokumen.update');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'apiDestroy'])->name('dokumen.destroy');
    
    // Sejarah
    Route::get('/sejarah', [SejarahController::class, 'apiIndex'])->name('sejarah.index');
    Route::get('/sejarah/{id}', [SejarahController::class, 'apiShow'])->name('sejarah.show');
    Route::post('/sejarah', [SejarahController::class, 'apiStore'])->name('sejarah.store');
    Route::put('/sejarah/{id}', [SejarahController::class, 'apiUpdate'])->name('sejarah.update');
    Route::delete('/sejarah/{id}', [SejarahController::class, 'apiDestroy'])->name('sejarah.destroy');
    
    // VisiMisi
    Route::get('/visimisi', [VisiMisiController::class, 'apiIndex'])->name('visimisi.index');
    Route::get('/visimisi/{id}', [VisiMisiController::class, 'apiShow'])->name('visimisi.show');
    Route::post('/visimisi', [VisiMisiController::class, 'apiStore'])->name('visimisi.store');
    Route::put('/visimisi/{id}', [VisiMisiController::class, 'apiUpdate'])->name('visimisi.update');
    Route::delete('/visimisi/{id}', [VisiMisiController::class, 'apiDestroy'])->name('visimisi.destroy');
    
    // Struktur Organisasi
    Route::get('/struktur', [StrukturOrganisasiController::class, 'apiIndex'])->name('struktur.index');
    Route::get('/struktur/{id}', [StrukturOrganisasiController::class, 'apiShow'])->name('struktur.show');
    Route::post('/struktur', [StrukturOrganisasiController::class, 'apiStore'])->name('struktur.store');
    Route::put('/struktur/{id}', [StrukturOrganisasiController::class, 'apiUpdate'])->name('struktur.update');
    Route::delete('/struktur/{id}', [StrukturOrganisasiController::class, 'apiDestroy'])->name('struktur.destroy');
    
    // Pejabat Struktural
    Route::get('/pejabat', [PejabatStrukturalController::class, 'apiIndex'])->name('pejabat.index');
    Route::get('/pejabat/{id}', [PejabatStrukturalController::class, 'apiShow'])->name('pejabat.show');
    Route::post('/pejabat', [PejabatStrukturalController::class, 'apiStore'])->name('pejabat.store');
    Route::put('/pejabat/{id}', [PejabatStrukturalController::class, 'apiUpdate'])->name('pejabat.update');
    Route::delete('/pejabat/{id}', [PejabatStrukturalController::class, 'apiDestroy'])->name('pejabat.destroy');
    
    // Pengaduan (tanpa create/store karena dibuat dari frontend)
    Route::get('/pengaduan', [PengaduanController::class, 'apiIndex'])->name('pengaduan.index');
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'apiShow'])->name('pengaduan.show');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'apiUpdate'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'apiDestroy'])->name('pengaduan.destroy');
    
    // Kontak (tanpa create/store karena dibuat dari frontend)
    Route::get('/kontak', [KontakController::class, 'apiIndex'])->name('kontak.index');
    Route::get('/kontak/{id}', [KontakController::class, 'apiShow'])->name('kontak.show');
    Route::put('/kontak/{id}', [KontakController::class, 'apiUpdate'])->name('kontak.update');
    Route::delete('/kontak/{id}', [KontakController::class, 'apiDestroy'])->name('kontak.destroy');
});
