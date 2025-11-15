<?php

namespace App\Http\Controllers;

use App\Models\PejabatStruktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PejabatStrukturalController extends Controller
{
    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of pejabat struktural for admin
     */
    public function apiIndex(Request $request)
    {
        $query = PejabatStruktural::query();

        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jabatan', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('aktif') && $request->aktif !== '') {
            $query->where('aktif', $request->aktif);
        }

        $pejabatStrukturals = $query->orderBy('urutan')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $pejabatStrukturals->items(),
            'pagination' => [
                'current_page' => $pejabatStrukturals->currentPage(),
                'last_page' => $pejabatStrukturals->lastPage(),
                'per_page' => $pejabatStrukturals->perPage(),
                'total' => $pejabatStrukturals->total(),
            ],
        ]);
    }

    /**
     * API: Get single pejabat struktural
     */
    public function apiShow($id)
    {
        $pejabat = PejabatStruktural::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $pejabat,
        ]);
    }

    /**
     * API: Store new pejabat struktural
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'jabatan' => 'required|string|max:180',
            'foto' => 'required|image|max:2048',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'nullable|boolean',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pejabat-foto', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['aktif'] = $request->has('aktif') ? true : false;
        $validated['urutan'] = $validated['urutan'] ?? 0;

        $pejabat = PejabatStruktural::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pejabat Struktural berhasil ditambahkan.',
            'data' => $pejabat,
        ], 201);
    }

    /**
     * API: Update pejabat struktural
     */
    public function apiUpdate(Request $request, $id)
    {
        $pejabat = PejabatStruktural::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'jabatan' => 'required|string|max:180',
            'foto' => 'nullable|image|max:2048',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'nullable|boolean',
        ]);

        if ($request->hasFile('foto')) {
            if ($pejabat->foto) {
                Storage::disk('public')->delete($pejabat->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pejabat-foto', 'public');
        }

        $validated['aktif'] = $request->has('aktif') ? true : false;

        $pejabat->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pejabat Struktural berhasil diperbarui.',
            'data' => $pejabat->fresh(),
        ]);
    }

    /**
     * API: Delete pejabat struktural
     */
    public function apiDestroy(Request $request, $id)
    {
        $pejabat = PejabatStruktural::findOrFail($id);

        if ($pejabat->foto) {
            Storage::disk('public')->delete($pejabat->foto);
        }

        $pejabat->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pejabat Struktural berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.pejabat.index')
            ->with('success', 'Pejabat Struktural berhasil dihapus.');
    }
}

