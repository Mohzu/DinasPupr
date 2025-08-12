<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Import model Berita

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil berita terbaru dari database
        // Anda bisa menyesuaikan jumlahnya (misalnya, 5 berita terbaru)
        // 'latest()' akan mengurutkan berdasarkan created_at DESC
        // 'get()' akan mengambil semua hasil
        $beritas = Berita::latest()->take(9)->get(); 

        return view('pages.index', compact('beritas'));
    }
}