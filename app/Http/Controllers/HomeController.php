<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latestWithLimit(9)->get();

        // Meneruskan data berita ke view
        return view('pages.index', compact('beritas'));
    }
}