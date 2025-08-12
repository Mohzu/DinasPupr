<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    // Menampilkan list pengumuman di frontend
    public function index()
    {
        $pengumuman = Pengumuman::orderByDesc('published_at')->get();

        return view('pages.pengumuman', compact('pengumuman'));
    }

    // Menampilkan detail 1 pengumuman
    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('pages.detail-pengumuman', compact('pengumuman'));
    }
}
