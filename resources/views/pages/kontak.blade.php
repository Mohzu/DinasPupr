@extends('layouts.app')

@section('title', 'Kontak - Dinas PUPR Kabupaten Garut')
@section('description', 'Hubungi Dinas PUPR Kabupaten Garut melalui informasi kontak dan form yang tersedia.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
    <!-- Hero -->
    <section class="relative pt-28 pb-16 overflow-hidden">
        <div class="absolute -top-12 -right-12 w-72 h-72 bg-blue-200/40 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-12 w-96 h-96 bg-indigo-200/40 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-100">Hubungi Kami</span>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">Kontak Dinas PUPR Kabupaten Garut</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl">Silakan gunakan informasi atau form di bawah untuk pertanyaan, kolaborasi, atau permohonan informasi layanan kami.</p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('pengaduan') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold shadow-lg hover:bg-blue-700 active:scale-[.99] transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405M19 13V7a2 2 0 00-2-2H7a2 2 0 00-2 2v6m14 0a2 2 0 01-2 2H7a2 2 0 01-2-2m14 0v4a2 2 0 01-2 2H7a2 2 0 01-2-2v-4"/></svg>
                            Ajukan Pengaduan
                        </a>
                        <a href="#lokasi" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-blue-700 font-semibold shadow border border-blue-100 hover:bg-blue-50 active:scale-[.99] transition">Lihat Lokasi</a>
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-3xl border border-blue-100 bg-gradient-to-br from-white to-blue-50 p-6 shadow-xl">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12m0 0L8.343 6.929M13.414 12l4.243-4.243M13.414 12l-4.243 4.243"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Alamat</p>
                                        <p class="font-semibold text-gray-800">Jl. Contoh No. 123, Garut</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59a2 2 0 001.8 1.16H17a2 2 0 002-2V7a2 2 0 00-2-2H3z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Telepon</p>
                                        <p class="font-semibold text-gray-800">(0262) 123456</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H5m3 0h8m0 0h3M4 6h16M4 18h16"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Email</p>
                                        <p class="font-semibold text-gray-800">info@pupr-garut.go.id</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Jam Layanan</p>
                                        <p class="font-semibold text-gray-800">Senin - Jumat, 08.00 - 16.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Form + Peta -->
    <section class="pb-20">
        <div class="container mx-auto px-6 grid lg:grid-cols-3 gap-8">
            <!-- Peta / Lokasi -->
            <div id="lokasi" class="lg:col-span-1">
                <div class="h-full rounded-3xl border border-gray-100 bg-white p-4 shadow-sm">
                    <div class="h-72 rounded-2xl bg-gradient-to-br from-blue-100 to-blue-200 grid place-items-center text-blue-700">
                        <div class="text-center">
                            <svg class="mx-auto w-10 h-10 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 10.5C19.5 15.194 12 21 12 21S4.5 15.194 4.5 10.5C4.5 7.462 7.015 5 10.125 5h3.75C16.985 5 19.5 7.462 19.5 10.5z"/></svg>
                            <p class="font-semibold">Tampilan Peta</p>
                            <p class="text-sm text-blue-700/70">Sematkan peta Google Maps di sini</p>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-600">
                        <p><span class="font-semibold">Koordinat:</span> -7.2, 107.9</p>
                        <p><span class="font-semibold">Catatan:</span> Silakan sesuaikan embed Maps sesuai alamat resmi.</p>
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="lg:col-span-2">
                <div class="rounded-3xl border border-gray-100 bg-white/80 backdrop-blur p-6 md:p-8 shadow-xl">
                    <h2 class="text-xl font-extrabold text-gray-900">Form Kontak</h2>
                    <p class="text-gray-500 mb-6">Kirim pertanyaan atau pesan umum Anda. Kami akan membalas melalui email.</p>
                    <form action="#" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nama Anda" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="email@domain.com" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Topik pesan" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <div class="md:col-span-2 flex items-center justify-between">
                            <p class="text-xs text-gray-500">Form kontak ini tidak mengirim ke email. Untuk laporan/aduan gunakan halaman Pengaduan.</p>
                            <button type="submit" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 active:scale-[.99] transition">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection