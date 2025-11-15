<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class PengaduanController extends Controller
{
    /**
     * Menampilkan halaman form pengaduan
     */
    public function index()
    {
        return view('pages.pengaduan');
    }

    /**
     * Menyimpan pengaduan baru
     */
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telepon' => 'nullable|string|max:20',
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
            $pengaduan = Pengaduan::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'] ?? null,
                'subjek' => $validated['subjek'],
                'pesan' => $validated['pesan'],
                'status' => 'baru',
            ]);

            // Kirim email via Formspree 
            $formspreeEndpoint = env('FORMSPREE_ENDPOINT', 'https://formspree.io/f/meoznvdn');
            
            try {
                Http::asForm()->post($formspreeEndpoint, [
                    '_subject' => 'Pengaduan Baru dari Website PUPR Garut',
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'telepon' => $validated['telepon'] ?? '-',
                    'subjek' => $validated['subjek'],
                    'pesan' => $validated['pesan'],
                ]);
            } catch (\Exception $e) {
                // Log error tapi tidak gagalkan proses
                Log::warning('Gagal mengirim email via Formspree: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Pengaduan Anda telah berhasil dikirim. Terima kasih atas laporan Anda.'
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error menyimpan pengaduan: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.'
            ], 500);
        }
    }

    // ========== API METHODS (Admin) ==========

    /**
     * API: Get list of pengaduan for admin
     */
    public function apiIndex(Request $request)
    {
        $query = Pengaduan::query();

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

        $pengaduans = $query->latest()->paginate(15);
        $stats = [
            'total' => Pengaduan::count(),
            'baru' => Pengaduan::where('status', 'baru')->count(),
            'diproses' => Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => $pengaduans->items(),
            'pagination' => [
                'current_page' => $pengaduans->currentPage(),
                'last_page' => $pengaduans->lastPage(),
                'per_page' => $pengaduans->perPage(),
                'total' => $pengaduans->total(),
            ],
            'stats' => $stats,
        ]);
    }

    /**
     * API: Get single pengaduan
     */
    public function apiShow($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $pengaduan,
        ]);
    }

    /**
     * API: Update pengaduan
     */
    public function apiUpdate(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $pengaduan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Status pengaduan berhasil diperbarui.',
            'data' => $pengaduan->fresh(),
        ]);
    }

    /**
     * API: Delete pengaduan
     */
    public function apiDestroy(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pengaduan berhasil dihapus.',
            ]);
        }

        return redirect()->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
