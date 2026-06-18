@extends('layouts.app')

@section('title', 'Dinas PUPR Kabupaten Garut')
@section('description', 'Website resmi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
{{-- Include CSS untuk animasi --}}
@vite(['resources/css/index-animations.css'])

{{-- CSS untuk Service Cards --}}
<style>
    .service-card {
        position: relative;
        overflow: hidden;
        transform: translateY(0);
    }
    
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: currentColor;
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }
    
    .service-card:hover::before {
        transform: scaleY(1);
    }

    .service-card:hover {
        transform: translateY(-4px);
    }

    .service-icon-bg {
        position: relative;
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon-bg {
        transform: scale(1.1) rotate(5deg);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .service-card {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .service-card:nth-child(1) { animation-delay: 0.1s; }
    .service-card:nth-child(2) { animation-delay: 0.15s; }
    .service-card:nth-child(3) { animation-delay: 0.2s; }
    .service-card:nth-child(4) { animation-delay: 0.25s; }
    .service-card:nth-child(5) { animation-delay: 0.3s; }
    .service-card:nth-child(6) { animation-delay: 0.35s; }
    .service-card:nth-child(7) { animation-delay: 0.4s; }
    .service-card:nth-child(8) { animation-delay: 0.45s; }
</style>

    {{-- Hero Section --}}
    <section class="relative min-h-screen pt-20 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        {{-- Subtle Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 60px 60px;"></div>
        </div>

        {{-- Gradient Overlays --}}
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-slate-900/80 to-indigo-900/90"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

        {{-- Main Content --}}
        <div class="relative z-10 min-h-screen flex items-center pb-20">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid lg:grid-cols-12 gap-12 items-center">

                    {{-- Left Content --}}
                    <div class="lg:col-span-7 space-y-6">
                        {{-- Government Badge --}}
                        <div class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-lg">
                            <div class="w-2 h-2 bg-white rounded-full mr-3 animate-pulse"></div>
                            WEBSITE RESMI PEMERINTAH
                        </div>

                        {{-- Main Heading --}}
                        <div class="space-y-2">
                            <h1 class="text-5xl lg:text-7xl font-bold leading-tight text-white">
                                <span class="block">Membangun</span>
                                <span class="block bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 bg-clip-text text-transparent">
                                    Infrastruktur
                                </span>
                                <span class="block">Masa Depan</span>
                            </h1>
                        </div>

                        {{-- Organization Info --}}
                        <div class="space-y-2 pt-4">
                            <h2 class="text-xl lg:text-2xl text-blue-100 font-light tracking-wide leading-relaxed">
                                Dinas Pekerjaan Umum dan Penataan Ruang
                            </h2>
                            <h3 class="text-3xl lg:text-4xl font-bold text-yellow-400 tracking-tight">
                                Kabupaten Garut
                            </h3>
                        </div>

                        {{-- Description --}}
                        <div class="pt-2">
                            <p class="text-lg lg:text-xl text-gray-200 leading-relaxed max-w-2xl font-light">
                                Bersama membangun infrastruktur berkualitas dan penataan ruang yang berkelanjutan 
                                untuk kemajuan dan kesejahteraan masyarakat Kabupaten Garut.
                            </p>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <a href="#layanan-kami" class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                    Layanan Kami
                                </span>
                            </a>
                        </div>
                    </div>

                    {{-- Right Content - Floating Elements --}}
                    <div class="lg:col-span-5 relative flex items-center justify-center min-h-96">
                        {{-- Central Logo/Icon --}}
                        <div class="relative z-10">
                            <div class="w-32 h-32 bg-white/95 backdrop-blur-lg rounded-full shadow-2xl flex items-center justify-center border-4 border-white/30 group hover:scale-105 transition-all duration-300">
                                <img src="{{ asset('img/logoPU.png') }}" 
                                    alt="Logo PUPR" 
                                    class="w-20 h-20 group-hover:rotate-12 transition-transform duration-500"
                                    loading="eager"
                                    decoding="async"
                                    fetchpriority="high">
                            </div>
                            {{-- Pulse Ring --}}
                            <div class="absolute inset-0 w-32 h-32 rounded-full border-2 border-white/20 animate-ping"></div>
                            <div class="absolute inset-0 w-32 h-32 rounded-full border border-white/10 animate-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Decorative Wave --}}
        <div class="absolute bottom-0 left-0 right-0 z-20">
            <svg class="w-full h-24" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,60 C200,20 400,0 600,30 C800,60 1000,20 1200,40 L1200,120 L0,120 Z" fill="white"></path>
            </svg>
        </div>
    </section>

    {{-- Services Section --}}
    <section id="layanan-kami" class="pt-4 pb-20 bg-white relative">
        <div class="container mx-auto px-6 max-w-7xl">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 5a2 2 0 012-2h6a2 2 0 012 2v2h2a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2v-2H4a2 2 0 01-2-2V5zm8 0H4v6h2V9a2 2 0 012-2h2V5z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                    Pelayanan Publik <span class="text-blue-600">PUPR</span>
                </h2>
            </div>

            {{-- Services Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($layanans as $layanan)
                <a href="{{ route('layanan.show', $layanan->slug) }}" 
                   class="service-card group block bg-white rounded-2xl p-6 shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 hover:border-opacity-60"
                   style="color: {{ $layanan->warna }}; --hover-border: {{ $layanan->warna }};"
                   onmouseenter="this.style.borderColor='{{ $layanan->warna }}'" onmouseleave="this.style.borderColor=''">
                    <div class="flex items-start gap-4">
                        <div class="service-icon-bg w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors duration-300"
                             style="background-color: {{ $layanan->warna }}15;"
                             onmouseenter="this.style.backgroundColor='{{ $layanan->warna }}'" onmouseleave="this.style.backgroundColor='{{ $layanan->warna }}15'">
                            @if($layanan->ikon)
                                <div class="w-7 h-7 transition-colors duration-300" style="color: {{ $layanan->warna }};">
                                    {!! $layanan->ikon !!}
                                </div>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 transition-colors duration-300" style="color: {{ $layanan->warna }};" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-bold text-gray-900 transition-colors duration-300 mb-1" 
                                onmouseenter="this.style.color='{{ $layanan->warna }}'" onmouseleave="this.style.color=''">{{ $layanan->nama_layanan }}</h3>
                            <p class="text-sm text-gray-500 group-hover:text-gray-700 transition-colors duration-300">{{ $layanan->deskripsi_singkat }}</p>
                        </div>
                    </div>
                </a>
                @empty
                <div class="sm:col-span-2 lg:col-span-4 text-center py-12">
                    <p class="text-gray-500">Layanan belum tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Latest News Section --}}
    <section class="py-16 bg-gradient-to-br from-gray-50 via-blue-50/30 to-gray-50 relative overflow-hidden">
        {{-- Decorative Circles --}}
        <div class="absolute -top-48 -left-48 w-96 h-96 bg-gradient-to-br from-blue-200/40 to-indigo-200/30 rounded-full"></div>
        <div class="absolute -bottom-48 -right-48 w-96 h-96 bg-gradient-to-tl from-blue-200/40 to-indigo-200/30 rounded-full"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            {{-- Section Header --}}
            <div class="mb-12 relative">
                {{-- Lihat Semua Button --}}
                <div class="absolute top-0 right-0 hidden sm:block">
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-1 text-gray-700 hover:text-gray-900 font-medium transition-colors group">
                        <span class="text-base">Lihat Semua</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                {{-- Center: Icon + Title --}}
                <div class="flex flex-col items-center text-center">
                    <div class="flex items-center justify-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                            Berita <span class="text-blue-600">Terkini</span>
                        </h2>
                    </div>
                </div>
            </div>

            {{-- News Grid/Slider --}}
            @if(isset($beritas) && $beritas->isNotEmpty())
                <div class="relative -mx-6">
                    {{-- Navigation Arrows --}}
                    <button id="newsSliderPrev" class="absolute left-2 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-600 hover:text-blue-600 hover:shadow-xl transition-all hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="newsSliderNext" class="absolute right-2 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-600 hover:text-blue-600 hover:shadow-xl transition-all hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    {{-- Cards Container --}}
                    <div class="overflow-hidden px-6 sm:px-10 lg:px-16">
                        <div id="newsSliderContainer" class="flex gap-5 transition-transform duration-500">
                            @foreach($beritas->take(8) as $berita)
                                <div class="flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)] xl:w-[calc(25%-15px)]">
                                    <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                                        {{-- Image --}}
                                        <div class="relative bg-white h-48 sm:h-56 flex items-center justify-center border-b border-gray-100 overflow-hidden">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                                alt="{{ $berita->judul }}" 
                                                class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105"
                                                loading="lazy">
                                        </div>

                                        {{-- Content --}}
                                        <div class="p-5">
                                            {{-- Date --}}
                                            <div class="text-gray-500 text-sm mb-3">
                                                {{ $berita->created_at->format('d F Y') }}
                                            </div>
                                            
                                            {{-- Title --}}
                                            <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-3 leading-tight line-clamp-2 group-hover:text-blue-600 transition-colors duration-300 min-h-[3.5rem]">
                                                {{ $berita->judul }}
                                            </h3>

                                            {{-- Description --}}
                                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-2 mb-4 min-h-[2.5rem]">
                                                {{ strip_tags(Str::limit($berita->konten ?? $berita->deskripsi ?? 'Baca selengkapnya untuk mengetahui informasi lengkap tentang berita ini.', 100)) }}
                                            </p>

                                            {{-- Category Footer --}}
                                            <div class="pt-3 border-t border-gray-100">
                                                <span class="text-sm font-semibold text-gray-700">{{ $berita->kategori ?? 'Kementerian/Lembaga' }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    {{-- Lihat Semua Button for small screens --}}
                    <div class="text-center mt-8 sm:hidden">
                         <a href="{{ route('berita') }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium transition-colors group">
                            <span class="text-base font-semibold">Lihat Semua Berita</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

            @else
                {{-- No News Message --}}
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500">Berita terbaru akan segera ditampilkan di sini</p>
                </div>
            @endif
        </div>
    </section>
    
    {{-- Include JavaScript --}}
    @vite(['resources/js/index-animations.js', 'resources/js/news-slider.js'])
@endsection