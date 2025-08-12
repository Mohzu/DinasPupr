@extends('layouts.app')

@section('title', 'Pengaduan - Dinas PUPR Kabupaten Garut')
@section('description', 'Sampaikan pengaduan Anda melalui form berikut. Kami menggunakan Formspree untuk pengiriman email yang aman.')

@php
    $formspreeEndpoint = env('FORMSPREE_ENDPOINT', 'https://formspree.io/f/yourFormId');
@endphp

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-yellow-50">
    <!-- Hero -->
    <section class="relative pt-28 pb-16 overflow-hidden">
        <div class="absolute -top-10 -right-10 w-80 h-80 bg-amber-200/50 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-12 w-96 h-96 bg-orange-200/40 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-100">Layanan Aspirasi</span>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">Form Pengaduan Masyarakat</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl">Sampaikan keluhan, laporan, atau masukan terkait layanan kami. Laporan Anda akan kami tindaklanjuti.</p>
                    <div class="mt-6 grid sm:grid-cols-3 gap-3">
                        <div class="p-4 rounded-2xl bg-white/70 backdrop-blur border border-amber-100">
                            <p class="text-xs text-gray-500">Langkah 1</p>
                            <p class="font-semibold text-gray-800">Isi Data Diri</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/70 backdrop-blur border border-amber-100">
                            <p class="text-xs text-gray-500">Langkah 2</p>
                            <p class="font-semibold text-gray-800">Jelaskan Pengaduan</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/70 backdrop-blur border border-amber-100">
                            <p class="text-xs text-gray-500">Langkah 3</p>
                            <p class="font-semibold text-gray-800">Kirim & Tunggu Tindak Lanjut</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-3xl border border-amber-100 bg-gradient-to-br from-white to-amber-50 p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-amber-500 text-white grid place-items-center shadow"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l.7 2.154a1 1 0 00.95.69h2.262c.969 0 1.371 1.24.588 1.81l-1.831 1.33a1 1 0 00-.364 1.118l.7 2.154c.3.921-.755 1.688-1.54 1.118l-1.831-1.33a1 1 0 00-1.176 0l-1.831 1.33c-.784.57-1.838-.197-1.539-1.118l.7-2.154a1 1 0 00-.364-1.118L6.2 7.581c-.783-.57-.38-1.81.588-1.81h2.262a1 1 0 00.95-.69l.7-2.154z"/></svg></div>
                            <div>
                                <p class="text-xs text-gray-500">Kebijakan</p>
                                <p class="font-semibold text-gray-800">Data Anda aman. Email dikirim via Formspree.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-20">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="rounded-3xl border border-amber-100 bg-white/80 backdrop-blur p-6 md:p-8 shadow-xl">
                <h2 class="text-xl font-extrabold text-gray-900">Form Pengaduan</h2>
                <p class="text-gray-500 mb-6">Form ini akan mengirimkan email ke pihak ketiga (Formspree). Pastikan data Anda benar.</p>

                <form action="{{ $formspreeEndpoint }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <input type="hidden" name="_subject" value="Pengaduan Baru dari Website PUPR Garut">
                    <input type="hidden" name="_language" value="id">
                    <input type="text" name="_gotcha" class="hidden" tabindex="-1" autocomplete="off">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="Nama Anda" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="email@domain.com" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="tel" name="telepon" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                            <option value="Layanan">Layanan</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Perizinan">Perizinan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                        <input type="text" name="subjek" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="Ringkasan pengaduan" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Pengaduan</label>
                        <textarea name="pesan" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="Tulis pengaduan Anda secara detail" required></textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-between">
                        <p class="text-xs text-gray-500">Dengan mengirimkan form ini, Anda setuju data dikirim ke Formspree sesuai kebijakan mereka.</p>
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-amber-600 text-white font-semibold hover:bg-amber-700 active:scale-[.99] transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                            Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection