<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
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

    // Download via direct storage URL on the client to preserve filename
}

