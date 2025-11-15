<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    // ========== FRONTEND METHODS ==========
    
    public function index(Request $request)
    {
        $year = $request->query('year');
        $search = $request->query('q');

        $query = Dokumen::query();

        if ($year) {
            $query->where('year', (int) $year);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $documents = $query->orderByDesc('published_at')->orderByDesc('created_at')->paginate(10)->withQueryString();

        $years = Dokumen::select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        if ($request->ajax()) {
            return response()->json([
                'data' => $documents->map(function ($d) {
                    return [
                        'id' => $d->id,
                        'title' => $d->title,
                        'description' => $d->description,
                        'published_at' => optional($d->published_at)->locale('id')->translatedFormat('l, d F Y'),
                        'file_url' => asset('storage/'.$d->file_path),
                        'file_name' => basename($d->file_path),
                    ];
                }),
                'pagination' => [
                    'current_page' => $documents->currentPage(),
                    'last_page' => $documents->lastPage(),
                    'per_page' => $documents->perPage(),
                    'total' => $documents->total(),
                ],
            ]);
        }

        return view('pages.dokumen', [
            'documents' => $documents,
            'years' => $years,
            'activeYear' => $year,
            'search' => $search,
        ]);
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of dokumen for admin
     */
    public function apiIndex(Request $request)
    {
        $query = Dokumen::query();

        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }

        $dokumens = $query->latest()->paginate(15);
        $years = Dokumen::select('year')->distinct()->orderByDesc('year')->pluck('year');

        return response()->json([
            'success' => true,
            'data' => $dokumens->items(),
            'pagination' => [
                'current_page' => $dokumens->currentPage(),
                'last_page' => $dokumens->lastPage(),
                'per_page' => $dokumens->perPage(),
                'total' => $dokumens->total(),
            ],
            'years' => $years,
        ]);
    }

    /**
     * API: Get single dokumen
     */
    public function apiShow($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $dokumen,
        ]);
    }

    /**
     * API: Store new dokumen
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:3000',
            'file_path' => 'required|file|mimes:pdf|max:10240',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('dokumen', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['published_at'] = $validated['published_at'] ?? now();

        $dokumen = Dokumen::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Dokumen berhasil ditambahkan.',
            'data' => $dokumen,
        ], 201);
    }

    /**
     * API: Update dokumen
     */
    public function apiUpdate(Request $request, $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:3000',
            'file_path' => 'nullable|file|mimes:pdf|max:10240',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('file_path')) {
            if ($dokumen->file_path) {
                Storage::disk('public')->delete($dokumen->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('dokumen', 'public');
        }

        $dokumen->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Dokumen berhasil diperbarui.',
            'data' => $dokumen->fresh(),
        ]);
    }

    /**
     * API: Delete dokumen
     */
    public function apiDestroy(Request $request, $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->file_path) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        $dokumen->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }
}

