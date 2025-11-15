<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class KontakController extends Controller
{
    /**
     * Menampilkan halaman form kontak
     */
    public function index()
    {
        return view('pages.kontak');
    }

    /**
     * Menyimpan pesan kontak baru
     */
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'nomor_telepon' => 'nullable|string|max:20',
                'subjek' => 'required|string|max:255',
                'pesan' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Silakan periksa kembali data yang Anda masukkan.',
                'errors' => $e->errors()
            ], 422);
        }

        try {
            // Simpan ke database
            $kontak = Kontak::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'nomor_telepon' => $validated['nomor_telepon'] ?? null,
                'subjek' => $validated['subjek'],
                'pesan' => $validated['pesan'],
                'status' => 'baru',
            ]);

            // Kirim email via Formspree 
            $formspreeEndpoint = env('FORMSPREE_CONTACT_ENDPOINT', 'https://formspree.io/f/meoznvdn');
            
            try {
                Http::asForm()->post($formspreeEndpoint, [
                    '_subject' => 'Pesan Baru dari Website PUPR Garut',
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'nomor_telepon' => $validated['nomor_telepon'] ?? '-',
                    'subjek' => $validated['subjek'],
                    'pesan' => $validated['pesan'],
                ]);
            } catch (\Exception $e) {
                // Log error tapi tidak gagalkan proses
                Log::warning('Gagal mengirim email via Formspree: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda telah berhasil dikirim. Kami akan membalas melalui email.'
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error menyimpan kontak: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.'
            ], 500);
        }
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of kontak for admin
     */
    public function apiIndex(Request $request)
    {
        $query = Kontak::query();

        // Filter status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subjek', 'like', '%' . $request->search . '%')
                  ->orWhere('pesan', 'like', '%' . $request->search . '%');
            });
        }

        $kontaks = $query->latest()->paginate(15);
        $stats = [
            'total' => Kontak::count(),
            'baru' => Kontak::where('status', 'baru')->count(),
            'dibalas' => Kontak::where('status', 'dibalas')->count(),
            'selesai' => Kontak::where('status', 'selesai')->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => $kontaks->items(),
            'pagination' => [
                'current_page' => $kontaks->currentPage(),
                'last_page' => $kontaks->lastPage(),
                'per_page' => $kontaks->perPage(),
                'total' => $kontaks->total(),
            ],
            'stats' => $stats,
        ]);
    }

    /**
     * API: Get single kontak
     */
    public function apiShow($id)
    {
        $kontak = Kontak::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $kontak,
        ]);
    }

    /**
     * API: Update kontak
     */
    public function apiUpdate(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:baru,dibalas,selesai',
        ]);

        $kontak->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Status kontak berhasil diperbarui.',
            'data' => $kontak->fresh(),
        ]);
    }

    /**
     * API: Delete kontak
     */
    public function apiDestroy(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Kontak berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
