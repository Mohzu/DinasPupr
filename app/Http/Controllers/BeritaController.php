<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // Halaman utama daftar berita
    public function index()
    {
        $featured = Berita::latest()->first();
        $recent   = Berita::latest()->skip(1)->take(3)->get();
        $beritas  = Berita::latest()->paginate(9);

        // ambil tanggal update terakhir
        $lastUpdate = Berita::latest('updated_at')->value('updated_at');

        // total semua berita
        $totalBerita = Berita::count();

        return view('pages.berita', compact(
            'featured',
            'recent',
            'beritas',
            'lastUpdate',
            'totalBerita'
        ));
    }

    // Fungsi pencarian berita
    public function search(Request $request)
    {
        $keyword = $request->input('q'); // pastikan input form name="q"

        $beritas = Berita::where('judul', 'like', "%{$keyword}%")
            ->orWhere('isi', 'like', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('pages.berita', compact('beritas', 'keyword'));
    }

    // Detail berita berdasarkan slug
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('pages.berita-detail', compact('berita'));
    }
}
