<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
{
    // ========== FRONTEND METHODS ==========
    
    public function index()
    {
        $leaders = \App\Models\PejabatStruktural::query()
            ->where('aktif', true)
            ->orderBy('urutan')
            ->orderBy('id')
            ->get(['nama','jabatan','foto'])
            ->map(function ($leader) {
                $leader->foto_url = $leader->foto
                    ? (Str::startsWith($leader->foto, ['http://', 'https://'])
                        ? $leader->foto
                        : Storage::disk('public')->url($leader->foto))
                    : null;
                return $leader;
            });

        $struktur = StrukturOrganisasi::published()->first();

        return view('pages.strukturorganisasi', compact('leaders', 'struktur'));
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of struktur organisasi for admin
     */
    public function apiIndex(Request $request)
    {
        $query = StrukturOrganisasi::query();

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $strukturOrganisasis = $query->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $strukturOrganisasis->items(),
            'pagination' => [
                'current_page' => $strukturOrganisasis->currentPage(),
                'last_page' => $strukturOrganisasis->lastPage(),
                'per_page' => $strukturOrganisasis->perPage(),
                'total' => $strukturOrganisasis->total(),
            ],
        ]);
    }

    /**
     * API: Get single struktur organisasi
     */
    public function apiShow($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $struktur,
        ]);
    }

    /**
     * API: Store new struktur organisasi
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'gambar' => 'required|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('struktur-organisasi', 'public');
        }

        $validated['user_id'] = auth()->id();

        $struktur = StrukturOrganisasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Struktur Organisasi berhasil ditambahkan.',
            'data' => $struktur,
        ], 201);
    }

    /**
     * API: Update struktur organisasi
     */
    public function apiUpdate(Request $request, $id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('gambar')) {
            if ($struktur->gambar) {
                Storage::disk('public')->delete($struktur->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('struktur-organisasi', 'public');
        }

        $struktur->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Struktur Organisasi berhasil diperbarui.',
            'data' => $struktur->fresh(),
        ]);
    }

    /**
     * API: Delete struktur organisasi
     */
    public function apiDestroy(Request $request, $id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        if ($struktur->gambar) {
            Storage::disk('public')->delete($struktur->gambar);
        }

        $struktur->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Struktur Organisasi berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.struktur.index')
            ->with('success', 'Struktur Organisasi berhasil dihapus.');
    }
}
