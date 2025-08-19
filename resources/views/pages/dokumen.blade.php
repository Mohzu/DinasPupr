@extends('layouts.app')

@section('title', 'Arsip & Dokumen - Dinas PUPR Kabupaten Garut')
@section('description', 'Kumpulan arsip dan dokumen Dinas PUPR Kabupaten Garut yang dapat diunduh publik, seperti regulasi, pedoman, laporan, dan lainnya.')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero -->
    <div class="relative overflow-hidden mb-8 shadow-2xl mt-20">
        <div class="absolute inset-0">
            <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Dokumen PUPR Garut" class="w-full h-64 md:h-80 object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/40 to-black/70"></div>
        </div>
        <div class="relative z-10 container mx-auto px-6 py-14 md:py-20 text-white">
            <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-md rounded-full px-4 py-2 text-sm font-semibold border border-white/30">
                Dokumen Publik
            </div>
            <h1 class="mt-4 text-3xl md:text-5xl font-black leading-tight">Arsip & Dokumen</h1>
            <p class="mt-3 max-w-3xl text-white/90">Unduh regulasi, pedoman, laporan, dan dokumen publik lain yang diterbitkan oleh Dinas PUPR Kabupaten Garut.</p>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 -mt-10 relative z-20">
            <form method="GET" action="{{ route('dokumen') }}" class="grid md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pencarian</label>
                    <div class="relative">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul atau kata kunci dokumen..." class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 pl-10">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="kategori" class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Semua</option>
                        <option value="regulasi" @selected(request('kategori')==='regulasi')>Regulasi</option>
                        <option value="pedoman" @selected(request('kategori')==='pedoman')>Pedoman</option>
                        <option value="laporan" @selected(request('kategori')==='laporan')>Laporan</option>
                        <option value="lainnya" @selected(request('kategori')==='lainnya')>Lainnya</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-xl shadow-lg shadow-blue-600/20">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2.94 6.94A7 7 0 1112.5 15.56l4.22 4.22-1.41 1.41-4.22-4.22A7 7 0 012.94 6.94z"/></svg>
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Results info -->
        <div class="mt-8 flex items-center justify-between">
            <p class="text-sm text-gray-600">Menampilkan dokumen pilihan. Silakan gunakan pencarian untuk memfilter.</p>
        </div>

        <!-- Documents Grid (static placeholders; integrate with backend later) -->
        @php
            $documents = [
                [
                    'title' => 'Peraturan Bupati tentang Penataan Ruang 2025',
                    'category' => 'Regulasi',
                    'size' => '1.2 MB',
                    'date' => 'Jan 2025',
                    'url' => '#',
                ],
                [
                    'title' => 'Pedoman Teknis Pembangunan Jalan Kabupaten',
                    'category' => 'Pedoman',
                    'size' => '3.8 MB',
                    'date' => 'Des 2024',
                    'url' => '#',
                ],
                [
                    'title' => 'Laporan Kinerja Dinas PUPR 2024',
                    'category' => 'Laporan',
                    'size' => '5.1 MB',
                    'date' => 'Jan 2025',
                    'url' => '#',
                ],
                [
                    'title' => 'Rencana Kerja (Renja) 2025',
                    'category' => 'Lainnya',
                    'size' => '2.4 MB',
                    'date' => 'Jan 2025',
                    'url' => '#',
                ],
            ];
        @endphp

        <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($documents as $doc)
            <div class="group bg-white rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-xs font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100">{{ $doc['category'] }}</span>
                        <span class="text-xs text-gray-500">{{ $doc['date'] }}</span>
                    </div>
                    <h3 class="mt-3 font-bold text-gray-900 line-clamp-2">{{ $doc['title'] }}</h3>
                    <p class="mt-2 text-sm text-gray-500">PDF • {{ $doc['size'] }}</p>
                </div>
                <div class="px-5 pb-5 flex gap-2">
                    <a href="{{ $doc['url'] }}" class="flex-1 inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-xl transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3a1 1 0 011 1v10.59l3.3-3.3a1 1 0 011.4 1.42l-5 5a1 1 0 01-1.4 0l-5-5a1 1 0 011.4-1.42l3.3 3.3V4a1 1 0 011-1z"/></svg>
                        Unduh
                    </a>
                    <button class="px-4 py-2 rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold">Detail</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination placeholder -->
        <div class="mt-10 flex justify-center">
            <nav class="inline-flex rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 border-r border-gray-100">Sebelumnya</a>
                <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600">1</a>
                <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 border-l border-gray-100">Berikutnya</a>
            </nav>
        </div>
    </div>
</div>
@endsection

