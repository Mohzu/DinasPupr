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
}
