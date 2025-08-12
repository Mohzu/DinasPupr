<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Import model Berita

class BeritaController extends Controller
{
    public function index()
    {
        $featured = Berita::latest()->first();
        $recent = Berita::latest()->skip(1)->take(3)->get();
        $beritas = Berita::latest()->paginate(9);

        return view('pages.berita', compact('featured', 'recent', 'beritas'));
    }

    public function show(string $slugOrId)
    {
        $berita = Berita::where('slug', $slugOrId)
            ->orWhere('id', $slugOrId)
            ->firstOrFail();

        $related = Berita::where('id', '!=', $berita->id)
            ->latest()
            ->take(3)
            ->get();

        $previous = Berita::where('id', '<', $berita->id)->orderBy('id', 'desc')->first();
        $next = Berita::where('id', '>', $berita->id)->orderBy('id', 'asc')->first();

        return view('pages.detail-berita', compact('berita', 'related', 'previous', 'next'));
    }
}