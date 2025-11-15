<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;

class SejarahController extends Controller
{
    // ========== FRONTEND METHODS ==========
    
    public function index()
    {
        $sejarah = Sejarah::published()->first();

        return view('pages.sejarah', compact('sejarah'));
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of sejarah for admin
     */
    public function apiIndex(Request $request)
    {
        $query = Sejarah::query();

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $sejarahs = $query->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $sejarahs->items(),
            'pagination' => [
                'current_page' => $sejarahs->currentPage(),
                'last_page' => $sejarahs->lastPage(),
                'per_page' => $sejarahs->perPage(),
                'total' => $sejarahs->total(),
            ],
        ]);
    }

    /**
     * API: Get single sejarah
     */
    public function apiShow($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $sejarah,
        ]);
    }

    /**
     * API: Store new sejarah
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $validated['user_id'] = auth()->id();

        $sejarah = Sejarah::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Sejarah berhasil ditambahkan.',
            'data' => $sejarah,
        ], 201);
    }

    /**
     * API: Update sejarah
     */
    public function apiUpdate(Request $request, $id)
    {
        $sejarah = Sejarah::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $sejarah->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Sejarah berhasil diperbarui.',
            'data' => $sejarah->fresh(),
        ]);
    }

    /**
     * API: Delete sejarah
     */
    public function apiDestroy(Request $request, $id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Sejarah berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.sejarah.index')
            ->with('success', 'Sejarah berhasil dihapus.');
    }
}
