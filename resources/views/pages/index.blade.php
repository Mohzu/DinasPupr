@extends('layouts.app')

@section('title', 'Dinas PUPR Kabupaten Garut')
@section('description', 'Website resmi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
    {{-- Hero Section (Versi Asli Statis) --}}
    <section class="relative min-h-screen pt-16 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        {{-- Subtle Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 60px 60px;"></div>
        </div>

        {{-- Gradient Overlays --}}
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-slate-900/80 to-indigo-900/90"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

        {{-- Main Content --}}
        <div class="relative z-10 min-h-screen flex items-center">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid lg:grid-cols-12 gap-12 items-center">

                    {{-- Left Content - Improved Spacing and Layout --}}
                    <div class="lg:col-span-7 space-y-6">
                        {{-- Government Badge --}}
                        <div class="inline-flex items-center bg-red-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-lg">
                            <div class="w-2 h-2 bg-white rounded-full mr-3 animate-pulse"></div>
                            WEBSITE RESMI PEMERINTAH
                        </div>

                        {{-- Main Heading dengan spacing yang lebih baik --}}
                        <div class="space-y-2">
                            <h1 class="text-5xl lg:text-7xl font-bold leading-tight text-white">
                                <span class="block">Membangun</span>
                                <span class="block bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 bg-clip-text text-transparent">
                                    Infrastruktur
                                </span>
                                <span class="block">Masa Depan</span>
                            </h1>
                        </div>

                        {{-- Organization Info - Diperbaiki hierarchy dan spacing --}}
                        <div class="space-y-2 pt-4">
                            <h2 class="text-xl lg:text-2xl text-blue-100 font-light tracking-wide leading-relaxed">
                                Dinas Pekerjaan Umum dan Penataan Ruang
                            </h2>
                            <h3 class="text-3xl lg:text-4xl font-bold text-yellow-400 tracking-tight">
                                Kabupaten Garut
                            </h3>
                        </div>

                        {{-- Description dengan spacing yang lebih baik --}}
                        <div class="pt-2">
                            <p class="text-lg lg:text-xl text-gray-200 leading-relaxed max-w-2xl font-light">
                                Bersama membangun infrastruktur berkualitas dan penataan ruang yang berkelanjutan 
                                untuk kemajuan dan kesejahteraan masyarakat Kabupaten Garut.
                            </p>
                        </div>

                        {{-- CTA Buttons dengan spacing yang diperbaiki --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <a href="#" class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                    Layanan Kami
                                </span>
                            </a>
                            
                            <a href="#" class="group relative px-8 py-4 bg-transparent border-2 border-white/60 text-white font-semibold rounded-xl backdrop-blur-sm transition-all duration-300 hover:bg-white/10 hover:border-white hover:scale-105">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v2a2 2 0 01-2 2m0-6V5a2 2 0 00-2-2H7a2 2 0 00-2 2v6m14 0v6a2 2 0 01-2 2H7a2 2 0 01-2-2v-6m0-6H5m-2 2a2 2 0 01-2-2V7a2 2 0 012-2h4"></path>
                                    </svg>
                                    Lihat Proyek
                                </span>
                            </a>
                        </div>
                    </div>

                    {{-- Right Content - Floating Elements dengan Animasi --}}
                    <div class="lg:col-span-5 relative flex items-center justify-center min-h-96">
                        {{-- Central Logo/Icon --}}
                        <div class="relative z-10">
                            <div class="w-32 h-32 bg-white/95 backdrop-blur-lg rounded-full shadow-2xl flex items-center justify-center border-4 border-white/30 group hover:scale-105 transition-all duration-300">
                                <img src="{{ asset('img/logoPU.png') }}" alt="Logo PUPR" class="w-20 h-20 group-hover:rotate-12 transition-transform duration-500">
                            </div>
                            {{-- Pulse Ring --}}
                            <div class="absolute inset-0 w-32 h-32 rounded-full border-2 border-white/20 animate-ping"></div>
                            <div class="absolute inset-0 w-32 h-32 rounded-full border border-white/10 animate-pulse"></div>
                        </div>
                        
                        {{-- Floating Elements --}}
                        <div class="absolute inset-0 flex items-center justify-center">
                            {{-- Element 1 - Top Right --}}
                            <div class="absolute top-8 right-8 bg-blue-500/90 backdrop-blur-lg rounded-2xl p-4 shadow-xl animate-float hover:scale-110 transition-transform duration-300 cursor-pointer" style="animation-delay: 0s;">
                                <div class="text-center text-white">
                                    <div class="text-2xl font-bold mb-1">500+</div>
                                    <div class="text-xs font-medium">Proyek</div>
                                    <div class="text-xs opacity-80">Selesai</div>
                                </div>
                            </div>
                            
                            {{-- Element 2 - Left --}}
                            <div class="absolute left-8 top-1/2 transform -translate-y-1/2 bg-green-500/90 backdrop-blur-lg rounded-2xl p-4 shadow-xl animate-float hover:scale-110 transition-transform duration-300 cursor-pointer" style="animation-delay: 1s;">
                                <div class="text-center text-white">
                                    <div class="text-2xl font-bold mb-1">42</div>
                                    <div class="text-xs font-medium">Kecamatan</div>
                                    <div class="text-xs opacity-80">Terjangkau</div>
                                </div>
                            </div>
                            
                            {{-- Element 3 - Bottom --}}
                            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 bg-yellow-500/90 backdrop-blur-lg rounded-2xl p-4 shadow-xl animate-float hover:scale-110 transition-transform duration-300 cursor-pointer" style="animation-delay: 2s;">
                                <div class="text-center text-white">
                                    <div class="text-2xl font-bold mb-1">15+</div>
                                    <div class="text-xs font-medium">Tahun</div>
                                    <div class="text-xs opacity-80">Pengalaman</div>
                                </div>
                            </div>
                            
                            {{-- Element 4 - Top Left --}}
                            <div class="absolute top-16 left-16 bg-purple-500/90 backdrop-blur-lg rounded-2xl p-4 shadow-xl animate-float hover:scale-110 transition-transform duration-300 cursor-pointer" style="animation-delay: 0.5s;">
                                <div class="text-center text-white">
                                    <div class="text-2xl font-bold mb-1">A</div>
                                    <div class="text-xs font-medium">Akreditasi</div>
                                    <div class="text-xs opacity-80">ISO 9001</div>
                                </div>
                            </div>
                            
                            {{-- Element 5 - Right Center --}}
                            <div class="absolute right-12 top-1/3 bg-indigo-500/90 backdrop-blur-lg rounded-2xl p-3 shadow-xl animate-float hover:scale-110 transition-transform duration-300 cursor-pointer" style="animation-delay: 1.5s;">
                                <div class="text-center text-white">
                                    <div class="text-xl font-bold mb-1">★</div>
                                    <div class="text-xs font-medium">Best</div>
                                    <div class="text-xs opacity-80">Practice</div>
                                </div>
                            </div>
                            
                            {{-- Element 6 - Bottom Left --}}
                            <div class="absolute bottom-16 left-1/4 bg-pink-500/90 backdrop-blur-lg rounded-2xl p-3 shadow-xl animate-float hover:scale-110 transition-transform duration-300 cursor-pointer" style="animation-delay: 2.5s;">
                                <div class="text-center text-white">
                                    <div class="text-xl font-bold mb-1">💡</div>
                                    <div class="text-xs font-medium">Inovasi</div>
                                    <div class="text-xs opacity-80">Terdepan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Scroll Indicator --}}
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
                <div class="flex flex-col items-center text-white/60 animate-bounce">
                    <span class="text-xs mb-3 font-medium tracking-widest">SCROLL</span>
                    <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center">
                        <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Decorative Wave --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-20 text-white fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,60 C200,20 400,0 600,30 C800,60 1000,20 1200,40 L1200,120 L0,120 Z"></path>
            </svg>
        </div>
    </section>

    {{-- Services Preview Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Membangun <span class="text-blue-600">Infrastruktur</span> Terdepan
                </h2>
            </div>

            {{-- Services Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Service Card 1 --}}
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-blue-200 hover:-translate-y-3">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-600 rounded-t-2xl"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Infrastruktur Jalan</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Pembangunan, pemeliharaan, dan rehabilitasi jalan kabupaten untuk meningkatkan konektivitas antar wilayah.</p>
                </div>

                {{-- Service Card 2 --}}
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-green-200 hover:-translate-y-3">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-500 to-green-600 rounded-t-2xl"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Penataan Ruang</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Perencanaan tata ruang wilayah yang terstruktur dan berkelanjutan sesuai dengan kebutuhan masa depan.</p>
                </div>

                {{-- Service Card 3 --}}
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-purple-200 hover:-translate-y-3">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-purple-600 rounded-t-2xl"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Perizinan IMB</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Layanan perizinan mendirikan bangunan dan konsultasi teknis untuk masyarakat dan pengembang.</p>
                </div>
            </div>
        </div>
    </section>

            {{-- Latest News Section dengan Background --}}
    <section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-gray-50 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, #3b82f6 1px, transparent 1px), radial-gradient(circle at 80% 20%, #3b82f6 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>
        
        {{-- Background Shapes --}}
        <div class="absolute top-10 right-10 w-72 h-72 bg-blue-100/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-96 h-96 bg-indigo-100/20 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            {{-- Section Header --}}
            <div class="flex items-center justify-between mb-12 max-w-6xl mx-auto">
                <div class="flex items-center space-x-4">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Berita Terkini</h2>
                </div>
                <a href="{{ route('berita') }}" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold px-6 py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-1 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span class="mr-2">Lihat Semua Berita</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>

            {{-- News Container dengan Background Card --}}
            <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/50 p-8 lg:p-12 relative">
                {{-- Decorative Elements --}}
                <div class="absolute top-4 right-4 w-20 h-20 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl opacity-50 rotate-12"></div>
                <div class="absolute bottom-4 left-4 w-16 h-16 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl opacity-40 -rotate-12"></div>

                <div class="grid lg:grid-cols-2 gap-12 relative z-10">
                    {{-- Left Side - Main News Slider --}}
                    <div class="relative">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl group h-96 lg:h-[500px]" id="newsSlider">
                            @if(isset($beritas) && $beritas->isNotEmpty())
                                @foreach($beritas->take(5) as $index => $berita)
                                    <div class="news-slide {{ $index === 0 ? 'active opacity-100' : 'opacity-0 translate-x-full' }} absolute inset-0 transition-all duration-700 ease-in-out" data-slide="{{ $index }}">
                                        {{-- Background Image (Diperbarui) --}}
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                            alt="{{ $berita->judul }}" 
                                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        
                                        {{-- Dark Overlay dengan Gradient --}}
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>

                                        {{-- Content Overlay (Diperbarui) --}}
                                        <div class="absolute inset-x-0 bottom-12 flex flex-col justify-end p-6 lg:p-8">
                                            {{-- Category Badge --}}
                                            <div class="inline-flex items-center bg-blue-600/80 backdrop-blur-sm text-white px-3 py-1.5 rounded-full text-xs font-semibold mb-4 w-fit transform hover:scale-105 transition-transform duration-300">
                                                <div class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></div>
                                                {{ strtoupper($berita->kategori ?? 'BERITA') }}
                                            </div>

                                            {{-- Title --}}
                                            <h3 class="text-2xl lg:text-3xl font-bold text-white leading-tight mb-4 transform translate-y-0 transition-transform duration-500">
                                                {{ $berita->judul }}
                                            </h3>

                                            {{-- Meta Info --}}
                                            <div class="flex items-center text-white/80 text-sm mb-4 space-x-4">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span>{{ $berita->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <span>{{ $berita->penulis ?? 'PUPR Garut' }}</span>
                                                </div>
                                            </div>

                                            {{-- CTA Button (Link sudah benar) --}}
                                            <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="inline-flex items-center bg-white/20 backdrop-blur-sm border border-white/30 text-white px-4 py-2 rounded-lg hover:bg-white/30 transition-all duration-300 w-fit transform hover:scale-105">
                                                <span class="mr-2">Baca Selengkapnya</span>
                                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- Navigation Controls --}}
                        <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between">
                            {{-- Manual Navigation --}}
                            <div class="flex items-center space-x-3">
                                <button id="prevSlide" class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 transform hover:scale-110">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <button id="nextSlide" class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 transform hover:scale-110">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>

                            {{-- Slide Indicator dengan Progress --}}
                            <div class="flex items-center text-white/80 text-sm bg-black/30 backdrop-blur-sm rounded-full px-4 py-2">
                                <span id="currentSlide" class="text-white font-semibold mr-1">1</span>
                                <span class="mr-2">dari</span>
                                <span id="totalSlides">{{ isset($beritas) ? $beritas->take(5)->count() : 5 }}</span>
                            </div>
                        </div>

                        {{-- Dots Navigation --}}
                        <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 flex space-x-2" id="dotsContainer">
                            @if(isset($beritas) && $beritas->isNotEmpty())
                                @foreach($beritas->take(5) as $index => $berita)
                                    <button class="dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white scale-125' : 'bg-white/40 hover:bg-white/60' }}" data-slide="{{ $index }}"></button>
                                @endforeach
                            @endif
                        </div>

                        {{-- Auto-play Progress Bar --}}
                        <div class="absolute top-0 left-0 right-0 h-1 bg-white/20">
                            <div id="progressBar" class="h-full bg-gradient-to-r from-blue-400 to-blue-600 transition-all duration-100 ease-linear" style="width: 0%"></div>
                        </div>
                    </div>

                    {{-- Right Side - News List --}}
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/50">
                        {{-- Tab Header --}}
                        <div class="flex items-center justify-between border-b border-gray-200 pb-4 mb-6">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 011 1v1m4 4l-4-4m0 0l-4 4m4-4v12"></path>
                                </svg>
                                BERITA TERBARU
                            </h3>
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        </div>

                        {{-- News List --}}
                        <div class="space-y-4">
                            @if(isset($beritas) && $beritas->count() > 5)
                                @foreach ($beritas->skip(5)->take(4) as $index => $berita)
                                    <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="group block p-4 hover:bg-white/70 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-blue-100">
                                        <h4 class="text-lg font-semibold text-gray-900 leading-tight mb-3 group-hover:text-blue-600 transition-colors duration-300">
                                            {{ $berita->judul }}
                                        </h4>
                                        <div class="flex items-center text-sm text-gray-500 space-x-3">
                                            <span class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                                                {{ $berita->kategori ?? 'Berita' }}
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $berita->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            @elseif(isset($beritas) && $beritas->count() > 1)
                                @foreach ($beritas->skip(1)->take(4) as $index => $berita)
                                    <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="group block p-4 hover:bg-white/70 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-blue-100">
                                        <h4 class="text-lg font-semibold text-gray-900 leading-tight mb-3 group-hover:text-blue-600 transition-colors duration-300">
                                            {{ $berita->judul }}
                                        </h4>
                                        <div class="flex items-center text-sm text-gray-500 space-x-3">
                                            <span class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                                                {{ $berita->kategori ?? 'Berita' }}
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $berita->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        {{-- No News Message --}}
                        @if(!isset($beritas) || $beritas->isEmpty())
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 011 1v1m4 4l-4-4m0 0l-4 4m4-4v12"></path>
                                </svg>
                                <p class="text-gray-500">Belum ada berita tersedia</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection