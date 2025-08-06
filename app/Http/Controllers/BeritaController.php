<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Import model Berita

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil berita terbaru dari database
        // Anda bisa menyesuaikan jumlahnya (misalnya, 5 berita terbaru)
        // 'latest()' akan mengurutkan berdasarkan created_at DESC
        // 'get()' akan mengambil semua hasil
        $beritas = Berita::latest()->take(5)->get(); 

        // Meneruskan data berita ke view
        return view('pages.berita', compact('beritas')); // 'beritas' akan tersedia di view
    }
}