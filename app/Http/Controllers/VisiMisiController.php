<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    // ========== FRONTEND METHODS ==========
    
    public function index()
    {
        $visimisi = VisiMisi::published()->first();

        return view('pages.visimisi', compact('visimisi'));
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of visimisi for admin
     */
    public function apiIndex(Request $request)
    {
        $query = VisiMisi::query();

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $visiMisis = $query->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $visiMisis->items(),
            'pagination' => [
                'current_page' => $visiMisis->currentPage(),
                'last_page' => $visiMisis->lastPage(),
                'per_page' => $visiMisis->perPage(),
                'total' => $visiMisis->total(),
            ],
        ]);
    }

    /**
     * API: Get single visimisi
     */
    public function apiShow($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $visimisi,
        ]);
    }

    /**
     * API: Store new visimisi
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'content' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $validated['user_id'] = auth()->id();

        $visimisi = VisiMisi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Visi & Misi berhasil ditambahkan.',
            'data' => $visimisi,
        ], 201);
    }

    /**
     * API: Update visimisi
     */
    public function apiUpdate(Request $request, $id)
    {
        $visimisi = VisiMisi::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'content' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $visimisi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Visi & Misi berhasil diperbarui.',
            'data' => $visimisi->fresh(),
        ]);
    }

    /**
     * API: Delete visimisi
     */
    public function apiDestroy(Request $request, $id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        $visimisi->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Visi & Misi berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.visimisi.index')
            ->with('success', 'Visi & Misi berhasil dihapus.');
    }
}
