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
}
