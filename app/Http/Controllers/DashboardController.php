<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Dokumen;
use App\Models\Pengaduan;
use App\Models\Kontak;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\StrukturOrganisasi;
use App\Models\PejabatStruktural;

class DashboardController extends Controller
{
    /**
     * API: Get dashboard statistics
     */
    public function apiIndex()
    {
        // Statistik
        $stats = [
            'berita' => Berita::count(),
            'pengumuman' => Pengumuman::count(),
            'dokumen' => Dokumen::count(),
            'pengaduan' => [
                'total' => Pengaduan::count(),
                'baru' => Pengaduan::where('status', 'baru')->count(),
                'diproses' => Pengaduan::where('status', 'diproses')->count(),
                'selesai' => Pengaduan::where('status', 'selesai')->count(),
            ],
            'kontak' => [
                'total' => Kontak::count(),
                'baru' => Kontak::where('status', 'baru')->count(),
                'dibalas' => Kontak::where('status', 'dibalas')->count(),
                'selesai' => Kontak::where('status', 'selesai')->count(),
            ],
        ];

        // Data Terbaru
        $recentBerita = Berita::latest()->take(5)->get();
        $recentPengumuman = Pengumuman::latest()->take(5)->get();
        $recentPengaduan = Pengaduan::latest()->take(5)->get();
        $recentKontak = Kontak::latest()->take(5)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'stats' => $stats,
                'recent_berita' => $recentBerita,
                'recent_pengumuman' => $recentPengumuman,
                'recent_pengaduan' => $recentPengaduan,
                'recent_kontak' => $recentKontak,
            ],
        ]);
    }
}

