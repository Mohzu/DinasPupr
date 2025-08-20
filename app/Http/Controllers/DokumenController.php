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

        return view('pages.dokumen', [
            'documents' => $documents,
            'years' => $years,
            'activeYear' => $year,
            'search' => $search,
        ]);
    }

    public function download(int $id)
    {
        $document = Dokumen::findOrFail($id);

        $relativePath = $document->file_path;
        $absolutePath = storage_path('app/public/' . ltrim($relativePath, '/'));

        if (! file_exists($absolutePath)) {
            abort(404);
        }

        $downloadName = basename($relativePath);

        return response()->download($absolutePath, $downloadName);
    }
}

