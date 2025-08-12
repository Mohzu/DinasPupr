@extends('layouts.app')

@section('title', 'Pengaduan - Dinas PUPR Kabupaten Garut')
@section('description', 'Sampaikan pengaduan Anda melalui form berikut. Kami menggunakan Formspree untuk pengiriman email yang aman.')

@php
    // Ganti dengan endpoint Formspree Anda, contoh: https://formspree.io/f/xxxxx
    $formspreeEndpoint = env('FORMSPREE_ENDPOINT', 'https://formspree.io/f/yourFormId');
@endphp

@section('content')
<div class="min-h-screen bg-gray-50">
    <section class="pt-24 pb-12 bg-gradient-to-br from-amber-500 to-yellow-500 text-white">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-extrabold">Pengaduan</h1>
            <p class="mt-2 text-white/90 max-w-2xl">Sampaikan laporan atau pengaduan terkait layanan kami. Setiap laporan akan kami tindaklanjuti.</p>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <h2 class="text-lg font-semibold mb-1">Form Pengaduan</h2>
                <p class="text-gray-500 mb-6">Form ini akan mengirimkan email ke pihak ketiga (Formspree).</p>

                <form action="{{ $formspreeEndpoint }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="hidden" name="_subject" value="Pengaduan Baru dari Website PUPR Garut">
                    <input type="hidden" name="_language" value="id">
                    <input type="text" name="_gotcha" class="hidden" tabindex="-1" autocomplete="off">

                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full border-gray-300 rounded-xl" placeholder="Nama Anda" required>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-xl" placeholder="email@domain.com" required>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="tel" name="telepon" class="w-full border-gray-300 rounded-xl" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full border-gray-300 rounded-xl">
                            <option value="Layanan">Layanan</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Perizinan">Perizinan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                        <input type="text" name="subjek" class="w-full border-gray-300 rounded-xl" placeholder="Ringkasan pengaduan" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Pengaduan</label>
                        <textarea name="pesan" rows="6" class="w-full border-gray-300 rounded-xl" placeholder="Tulis pengaduan Anda secara detail" required></textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-between">
                        <p class="text-xs text-gray-500">Dengan mengirimkan form ini, Anda setuju data dikirim ke Formspree sesuai kebijakan mereka.</p>
                        <button type="submit" class="px-5 py-3 rounded-xl bg-amber-600 text-white font-semibold hover:bg-amber-700">Kirim Pengaduan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection