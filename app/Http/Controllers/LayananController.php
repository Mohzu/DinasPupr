<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    /**
     * Frontend: Tampilkan detail layanan
     */
    public function show($slug)
    {
        $layanan = Layanan::where('slug', $slug)->firstOrFail();

        return view('pages.layanan-detail', compact('layanan'));
    }

    // ========== ADMIN API METHODS ==========

    /**
     * Admin: Store new layanan
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:500',
            'penjelasan_detail' => 'nullable|string',
            'alur' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'ikon' => 'nullable|string',
            'warna' => 'required|string|max:50',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['nama_layanan']);

        if ($request->hasFile('file_dokumen')) {
            $validated['file_dokumen'] = $request->file('file_dokumen')->store('dokumen_layanan', 'public');
        }

        $validated['urutan'] = $validated['urutan'] ?? 0;

        Layanan::create($validated);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Admin: Update layanan
     */
    public function apiUpdate(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:500',
            'penjelasan_detail' => 'nullable|string',
            'alur' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'ikon' => 'nullable|string',
            'warna' => 'required|string|max:50',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['nama_layanan']);

        if ($request->hasFile('file_dokumen')) {
            // Hapus file lama jika ada
            if ($layanan->file_dokumen) {
                Storage::disk('public')->delete($layanan->file_dokumen);
            }
            $validated['file_dokumen'] = $request->file('file_dokumen')->store('dokumen_layanan', 'public');
        }

        // Hapus file jika checkbox remove dicentang
        if ($request->has('remove_file') && $request->remove_file) {
            if ($layanan->file_dokumen) {
                Storage::disk('public')->delete($layanan->file_dokumen);
            }
            $validated['file_dokumen'] = null;
        }

        $validated['urutan'] = $validated['urutan'] ?? 0;

        $layanan->update($validated);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Admin: Delete layanan
     */
    public function apiDestroy(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->file_dokumen) {
            Storage::disk('public')->delete($layanan->file_dokumen);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}
