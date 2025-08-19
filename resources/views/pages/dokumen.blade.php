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

        <!-- Top actions: Year chips and layout -->
        @php
            $years = [2025, 2024, 2023, 2022, 2021];
            $activeYear = request('tahun');
        @endphp
        <div class="mt-6 flex flex-wrap items-center gap-2">
            <span class="text-sm text-gray-600 mr-2">Filter Tahun:</span>
            <a href="{{ route('dokumen', array_filter(['q' => request('q'), 'kategori' => request('kategori')])) }}" class="px-3 py-1.5 rounded-full text-xs font-semibold border {{ $activeYear ? 'text-gray-600 border-gray-200 hover:bg-gray-50' : 'text-white bg-blue-600 border-blue-600' }}">Semua</a>
            @foreach($years as $y)
                <a href="{{ route('dokumen', array_filter(['q' => request('q'), 'kategori' => request('kategori'), 'tahun' => $y])) }}" class="px-3 py-1.5 rounded-full text-xs font-semibold border {{ (string)$activeYear === (string)$y ? 'text-white bg-blue-600 border-blue-600' : 'text-gray-700 border-gray-200 hover:bg-gray-50' }}">{{ $y }}</a>
            @endforeach
        </div>

        <!-- Two-column layout: anchor sidebar + content -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Anchor Sidebar -->
            <aside class="lg:col-span-3">
                <div class="sticky top-28 bg-white rounded-2xl border border-gray-100 shadow-md p-4">
                    <h3 class="text-sm font-bold text-gray-900 mb-3">Kategori</h3>
                    <nav class="space-y-1 text-sm">
                        <a href="#perencanaan" class="block px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">Dokumen Perencanaan</a>
                        <a href="#lpj" class="block px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">Laporan Pertanggungjawaban</a>
                        <a href="#produk-hukum" class="block px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">Produk Hukum</a>
                        <a href="#kepegawaian" class="block px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">Transparansi Kepegawaian</a>
                        <a href="#keuangan" class="block px-3 py-2 rounded-lg hover:bg-gray-50 text-gray-700">Transparansi Pengelolaan Keuangan</a>
                    </nav>
                </div>
            </aside>

            <!-- Content -->
            <section class="lg:col-span-9 space-y-10">
                @php
                    $sections = [
                        [
                            'id' => 'perencanaan',
                            'title' => 'Dokumen Perencanaan',
                            'items' => [
                                ['judul' => 'RKPD Dinas PUPR 2025', 'tahun' => 2025, 'ukuran' => '2.1 MB', 'url' => '#'],
                                ['judul' => 'Renstra Dinas PUPR 2024-2025', 'tahun' => 2024, 'ukuran' => '3.6 MB', 'url' => '#'],
                                ['judul' => 'Renja Dinas PUPR 2024', 'tahun' => 2024, 'ukuran' => '1.9 MB', 'url' => '#'],
                            ],
                        ],
                        [
                            'id' => 'lpj',
                            'title' => 'Laporan Pertanggungjawaban',
                            'items' => [
                                ['judul' => 'LKPJ Kepala Daerah 2024 (Bidang PUPR)', 'tahun' => 2024, 'ukuran' => '4.2 MB', 'url' => '#'],
                                ['judul' => 'Laporan Kinerja (LKjIP) 2024', 'tahun' => 2024, 'ukuran' => '5.0 MB', 'url' => '#'],
                            ],
                        ],
                        [
                            'id' => 'produk-hukum',
                            'title' => 'Produk Hukum',
                            'items' => [
                                ['judul' => 'Perbup Penataan Ruang 2025', 'tahun' => 2025, 'ukuran' => '1.2 MB', 'url' => '#'],
                                ['judul' => 'Pergub Terkait Jalan Kabupaten', 'tahun' => 2024, 'ukuran' => '980 KB', 'url' => '#'],
                            ],
                        ],
                        [
                            'id' => 'kepegawaian',
                            'title' => 'Transparansi Kepegawaian',
                            'items' => [
                                ['judul' => 'Daftar Informasi Publik Kepegawaian 2025', 'tahun' => 2025, 'ukuran' => '650 KB', 'url' => '#'],
                            ],
                        ],
                        [
                            'id' => 'keuangan',
                            'title' => 'Transparansi Pengelolaan Keuangan Daerah',
                            'items' => [
                                ['judul' => 'RKA Dinas PUPR 2025', 'tahun' => 2025, 'ukuran' => '2.9 MB', 'url' => '#'],
                                ['judul' => 'DPA Dinas PUPR 2024', 'tahun' => 2024, 'ukuran' => '1.7 MB', 'url' => '#'],
                            ],
                        ],
                    ];
                @endphp

                @foreach($sections as $section)
                <div id="{{ $section['id'] }}" class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                        <div>
                            <h2 class="text-lg md:text-xl font-extrabold text-gray-900">{{ $section['title'] }}</h2>
                            <p class="text-sm text-gray-500">Daftar dokumen terbaru. Gunakan pencarian atau filter tahun untuk mempersempit hasil.</p>
                        </div>
                        <a href="#" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:text-blue-800">Lihat semua</a>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        @foreach($section['items'] as $item)
                            @if(!$activeYear || (string)$activeYear === (string)$item['tahun'])
                            <li class="p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 shrink-0 w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center border border-red-100">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M6 2h7l5 5v13a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zm7 7V3.5L18.5 9H13z"/></svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $item['judul'] }}</h3>
                                        <div class="mt-1 text-xs text-gray-500 flex flex-wrap items-center gap-2">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-gray-100 text-gray-700 font-medium">Tahun {{ $item['tahun'] }}</span>
                                            <span>PDF</span>
                                            <span>•</span>
                                            <span>{{ $item['ukuran'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ $item['url'] }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M14 3h7v7h-2V6.414l-9.293 9.293-1.414-1.414L17.586 5H14V3z"/></svg>
                                        Lihat
                                    </a>
                                    <a href="{{ $item['url'] }}" download class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3a1 1 0 011 1v10.59l3.3-3.3a1 1 0 011.4 1.42l-5 5a1 1 0 01-1.4 0l-5-5a1 1 0 011.4-1.42l3.3 3.3V4a1 1 0 011-1z"/></svg>
                                        Unduh
                                    </a>
                                </div>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endforeach

                <!-- Pagination placeholder -->
                <div class="flex justify-center">
                    <nav class="inline-flex rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 border-r border-gray-100">Sebelumnya</a>
                        <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600">1</a>
                        <a href="#" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 border-l border-gray-100">Berikutnya</a>
                    </nav>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

