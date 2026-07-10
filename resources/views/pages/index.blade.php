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
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover {
        transform: translateY(-6px);
    }

    .service-icon-bg {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .service-icon-bg {
        transform: scale(1.1) rotate(6deg);
        background-color: var(--hover-color) !important;
        color: #ffffff !important;
        border-color: var(--hover-color) !important;
        box-shadow: 0 10px 20px -10px var(--hover-color);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .service-card {
        animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .service-card:nth-child(1) { animation-delay: 0.05s; }
    .service-card:nth-child(2) { animation-delay: 0.1s; }
    .service-card:nth-child(3) { animation-delay: 0.15s; }
    .service-card:nth-child(4) { animation-delay: 0.2s; }
    .service-card:nth-child(5) { animation-delay: 0.25s; }
    .service-card:nth-child(6) { animation-delay: 0.3s; }
    .service-card:nth-child(7) { animation-delay: 0.35s; }
    .service-card:nth-child(8) { animation-delay: 0.4s; }
</style>

    {{-- Hero Section --}}
    <section class="relative min-h-screen pt-20 bg-slate-950 overflow-hidden">
        {{-- Background Image with subtle overlay --}}
        <div class="absolute inset-0">
            <img src="{{ asset('img/hero_background.jpg') }}" alt="Kantor Dinas PUPR Garut" class="w-full h-full object-cover object-center opacity-60">
            {{-- Dark gray/slate gradient overlay for readability, less blue to let the office building show --}}
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/50 to-slate-950/20"></div>
            {{-- Extra bottom dark overlay for smooth blending with the white section below --}}
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/30 via-transparent to-transparent"></div>
        </div>

        {{-- Subtle Background Pattern --}}
        <div class="absolute inset-0 opacity-5 z-5 pointer-events-none">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 60px 60px;"></div>
        </div>

        {{-- Main Content --}}
        <div class="relative z-10 min-h-screen flex items-center pt-20 pb-20">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid lg:grid-cols-12 gap-12 items-center -translate-y-10">
                    {{-- Left Content --}}
                    <div class="lg:col-span-7 space-y-6">
                        {{-- Government Badge --}}
                        <div class="inline-flex items-center bg-blue-600/90 text-white px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                            <div class="w-2 h-2 bg-white rounded-full mr-3 animate-pulse"></div>
                            WEBSITE RESMI PEMERINTAH
                        </div>

                        {{-- Main Heading --}}
                        <div class="space-y-2">
                            <h1 class="text-5xl lg:text-7xl font-black leading-tight text-white tracking-tight">
                                <span class="block">Membangun</span>
                                <span class="block bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 bg-clip-text text-transparent">
                                    Infrastruktur
                                </span>
                                <span class="block">Masa Depan</span>
                            </h1>
                        </div>

                        {{-- Description / Organization Info --}}
                        <div class="space-y-4 pt-2">
                            <p class="text-lg md:text-xl text-gray-300 font-light max-w-2xl leading-relaxed">
                                Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                            </p>
                            <p class="text-sm md:text-base text-gray-400 font-light max-w-2xl leading-relaxed">
                                Pakar pembangunan infrastruktur & tata ruang terpercaya, memberikan pelayanan yang berkualitas, aman, dan tepat waktu untuk kemajuan Kabupaten Garut.
                            </p>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="flex flex-wrap gap-4 pt-4">
                            <a href="#layanan-kami" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-400 text-slate-950 px-8 py-3.5 rounded-lg text-sm sm:text-base font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                                Pelayanan Publik
                            </a>
                            <a href="{{ route('berita') }}" class="inline-flex items-center justify-center border border-white/40 hover:border-white hover:bg-white hover:text-slate-950 text-white px-8 py-3.5 rounded-lg text-sm sm:text-base font-semibold transition-all duration-300">
                                Berita Terkini
                            </a>
                        </div>
                    </div>

                    {{-- Right Content - Floating Elements --}}
                    <div class="hidden lg:flex lg:col-span-5 relative items-center justify-center min-h-96">
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
    <section id="layanan-kami" class="pt-16 pb-20 bg-white relative overflow-hidden">
        {{-- Faint background decoration --}}
        <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none z-0">
            <img src="{{ asset('img/logoPU.png') }}" class="w-[500px] h-[500px] object-contain" alt="">
        </div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <div class="flex items-center justify-center mb-4">
                    {{-- Premium stylized network/hub icon --}}
                    <svg class="w-10 h-10 text-blue-600 animate-pulse" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                        <circle cx="12" cy="4" r="2" fill="currentColor"/>
                        <circle cx="12" cy="20" r="2" fill="currentColor"/>
                        <circle cx="5" cy="8" r="2" fill="currentColor"/>
                        <circle cx="19" cy="16" r="2" fill="currentColor"/>
                        <circle cx="5" cy="16" r="2" fill="currentColor"/>
                        <circle cx="19" cy="8" r="2" fill="currentColor"/>
                        <path d="M12 7V9M12 15V17M6.5 9L8 10M17.5 15L16 14M6.5 15L8 14M17.5 9L16 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-4">
                    Pelayanan Publik <span class="text-amber-500">PUPR</span>
                </h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-base leading-relaxed">
                    Kami menghadirkan berbagai layanan perizinan dan teknis yang transparan,
                    akuntabel, dan berbasis digital untuk kenyamanan warga Garut.
                </p>
            </div>

            {{-- Services Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($layanans as $layanan)
                <a href="{{ route('layanan.show', $layanan->slug) }}" 
                   class="service-card group flex flex-col items-center text-center bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100"
                   style="--hover-color: {{ $layanan->warna }};">
                    <div class="service-icon-bg w-16 h-16 rounded-2xl flex items-center justify-center mb-6 border transition-all duration-300"
                         style="color: {{ $layanan->warna }}; border-color: {{ $layanan->warna }}20; background-color: {{ $layanan->warna }}08;">
                        <div class="w-8 h-8 flex items-center justify-center">
                            @if($layanan->ikon)
                                {!! $layanan->ikon !!}
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/>
                                </svg>
                            @endif
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3 tracking-tight group-hover:text-blue-600 transition-colors duration-300">
                        {{ $layanan->nama_layanan }}
                    </h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">
                        {{ $layanan->deskripsi_singkat }}
                    </p>
                </a>
                @empty
                <div class="sm:col-span-2 lg:col-span-4 text-center py-12">
                    <p class="text-slate-400">Layanan belum tersedia.</p>
                </div>
                @endforelse
            </div>
    </section>

    {{-- Latest News Section --}}
    <section class="py-20 bg-slate-50/50 relative overflow-hidden">
        {{-- Decorative Subtle Circles --}}
        <div class="absolute -top-48 -left-48 w-96 h-96 bg-blue-100/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-48 -right-48 w-96 h-96 bg-indigo-100/30 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            {{-- Section Header --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                <div>
                    <div class="flex items-center gap-2 text-xs font-bold tracking-wider text-blue-900 uppercase mb-2">
                        <span class="w-6 h-[2px] bg-yellow-400"></span>
                        Update Terbaru
                    </div>
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                        Berita <span class="text-amber-500">Terkini</span>
                    </h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#0f172a] hover:bg-[#1e293b] text-white text-sm font-semibold rounded-lg shadow-sm transition-all group">
                        Lihat Semua Berita
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- News Grid --}}
            @if(isset($beritas) && $beritas->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($beritas->take(4) as $berita)
                        <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="group flex flex-col bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                            {{-- Image --}}
                            <div class="relative h-48 sm:h-52 overflow-hidden bg-gradient-to-br from-blue-600 to-indigo-800">
                                @if($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                        alt="{{ $berita->judul }}" 
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                @else
                                    <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(circle at 50% 50%, white 1.5px, transparent 1.5px); background-size: 16px 16px;"></div>
                                    <div class="absolute inset-0 flex items-center justify-center text-white/40 font-bold text-xs uppercase tracking-widest p-4 text-center">
                                        Dinas PUPR Garut
                                    </div>
                                @endif
                                {{-- Category Badge --}}
                                <span class="absolute top-4 left-4 bg-slate-900/90 text-white text-[10px] font-bold tracking-widest px-3 py-1.5 rounded uppercase shadow-sm">
                                    {{ $berita->kategori ?? 'Umum' }}
                                </span>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-1">
                                {{-- Date --}}
                                <div class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" />
                                    </svg>
                                    {{ $berita->created_at ? $berita->created_at->format('d F Y') : '10 July 2026' }}
                                </div>
                                
                                {{-- Title --}}
                                <h3 class="text-base font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition-colors duration-300 line-clamp-2 min-h-[2.75rem]">
                                    {{ $berita->judul }}
                                </h3>

                                {{-- Description --}}
                                <p class="text-sm text-slate-500 leading-relaxed font-light line-clamp-2 mb-4">
                                    {{ strip_tags(Str::limit($berita->konten ?? $berita->deskripsi ?? 'Baca selengkapnya untuk mengetahui informasi lengkap tentang berita ini.', 100)) }}
                                </p>

                                {{-- Footer link --}}
                                <div class="mt-auto pt-4 border-t border-slate-50 flex items-center text-xs font-semibold text-slate-600 group-hover:text-blue-600 transition-colors duration-300">
                                    Baca Selengkapnya
                                    <svg class="w-3.5 h-3.5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
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