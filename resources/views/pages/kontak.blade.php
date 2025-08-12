@extends('layouts.app')

@section('title', 'Kontak - Dinas PUPR Kabupaten Garut')
@section('description', 'Hubungi Dinas PUPR Kabupaten Garut melalui informasi kontak berikut dan form pengaduan.')

@section('content')
<div class="min-h-screen bg-gray-50">
    <section class="pt-24 pb-12 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-extrabold">Kontak</h1>
            <p class="mt-2 text-white/80 max-w-2xl">Hubungi kami untuk informasi, layanan, atau kerjasama.</p>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-semibold mb-4">Informasi Kontak</h2>
                    <ul class="space-y-3 text-gray-700">
                        <li><strong>Alamat:</strong> Jl. Contoh No. 123, Garut</li>
                        <li><strong>Telepon:</strong> (0262) 123456</li>
                        <li><strong>Email:</strong> info@pupr-garut.go.id</li>
                        <li><strong>Jam Layanan:</strong> Senin - Jumat, 08.00 - 16.00</li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-semibold mb-4">Media Sosial</h2>
                    <div class="flex gap-3 text-blue-600">
                        <a href="#" class="hover:underline">Facebook</a>
                        <a href="#" class="hover:underline">Instagram</a>
                        <a href="#" class="hover:underline">Twitter</a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-semibold mb-1">Form Kontak</h2>
                    <p class="text-gray-500 mb-6">Gunakan form ini untuk mengirim pesan umum.</p>
                    <form action="#" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @csrf
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" class="w-full border-gray-300 rounded-xl" placeholder="Nama Anda" required>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full border-gray-300 rounded-xl" placeholder="email@domain.com" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea rows="5" class="w-full border-gray-300 rounded-xl" placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection