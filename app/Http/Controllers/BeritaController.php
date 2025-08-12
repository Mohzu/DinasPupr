<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Import model Berita

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(9);
        return view('pages.berita', compact('beritas'));
    }

    public function show(string $slugOrId)
    {
        $berita = Berita::where('slug', $slugOrId)
            ->orWhere('id', $slugOrId)
            ->firstOrFail();

        return view('pages.detail-berita', compact('berita'));
    }
}