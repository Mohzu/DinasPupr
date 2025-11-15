<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    // ========== FRONTEND METHODS ==========
    
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

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of pengumuman for admin
     */
    public function apiIndex(Request $request)
    {
        $query = Pengumuman::query();

        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
            });
        }

        $pengumumans = $query->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $pengumumans->items(),
            'pagination' => [
                'current_page' => $pengumumans->currentPage(),
                'last_page' => $pengumumans->lastPage(),
                'per_page' => $pengumumans->perPage(),
                'total' => $pengumumans->total(),
            ],
        ]);
    }

    /**
     * API: Get single pengumuman
     */
    public function apiShow($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $pengumuman,
        ]);
    }

    /**
     * API: Store new pengumuman
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'lampiran' => 'nullable|file|max:4096',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('pengumuman-lampiran', 'public');
        }

        $validated['penulis'] = auth()->user()->name;
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = $validated['published_at'] ?? now();

        $pengumuman = Pengumuman::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pengumuman berhasil ditambahkan.',
            'data' => $pengumuman,
        ], 201);
    }

    /**
     * API: Update pengumuman
     */
    public function apiUpdate(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'lampiran' => 'nullable|file|max:4096',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('lampiran')) {
            if ($pengumuman->lampiran) {
                Storage::disk('public')->delete($pengumuman->lampiran);
            }
            $validated['lampiran'] = $request->file('lampiran')->store('pengumuman-lampiran', 'public');
        }

        $pengumuman->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pengumuman berhasil diperbarui.',
            'data' => $pengumuman->fresh(),
        ]);
    }

    /**
     * API: Delete pengumuman
     */
    public function apiDestroy(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->lampiran) {
            Storage::disk('public')->delete($pengumuman->lampiran);
        }

        $pengumuman->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
