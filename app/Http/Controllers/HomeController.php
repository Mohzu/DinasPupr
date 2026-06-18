<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latestWithLimit(9)->get();
        $layanans = Layanan::orderBy('urutan')->get();

        // Meneruskan data berita dan layanan ke view
        return view('pages.index', compact('beritas', 'layanans'));
    }
}