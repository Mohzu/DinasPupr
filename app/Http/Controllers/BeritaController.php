<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // ========== FRONTEND METHODS ==========
    
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

        return view('pages.detail-berita', compact('berita'));
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of berita for admin
     */
    public function apiIndex(Request $request)
    {
        $query = Berita::query();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kategori
        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $beritas = $query->latest()->paginate(15);
        $kategoris = Berita::select('kategori')->distinct()->whereNotNull('kategori')->pluck('kategori');

        return response()->json([
            'success' => true,
            'data' => $beritas->items(),
            'pagination' => [
                'current_page' => $beritas->currentPage(),
                'last_page' => $beritas->lastPage(),
                'per_page' => $beritas->perPage(),
                'total' => $beritas->total(),
            ],
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * API: Get single berita
     */
    public function apiShow($id)
    {
        $berita = Berita::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $berita,
        ]);
    }

    /**
     * API: Store new berita
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'gambar' => 'required|image|max:2048',
            'kategori' => 'nullable|string|max:50',
        ]);

        // Generate slug
        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita-images', 'public');
        }

        $validated['slug'] = $slug;
        $validated['penulis'] = auth()->user()->name;
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = now();

        $berita = Berita::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil ditambahkan.',
                'data' => $berita,
            ], 201);
        }

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * API: Update berita
     */
    public function apiUpdate(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'kategori' => 'nullable|string|max:50',
        ]);

        // Generate slug if judul changed
        if ($berita->judul != $validated['judul']) {
            $slug = Str::slug($validated['judul']);
            $originalSlug = $slug;
            $counter = 1;
            while (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $slug;
        }

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita-images', 'public');
        }

        $berita->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil diperbarui.',
                'data' => $berita->fresh(),
            ]);
        }

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * API: Delete berita
     */
    public function apiDestroy(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Delete image
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
