@extends('layouts.app')

@section('title', 'Berita Terkini - Dinas PUPR Kabupaten Garut')
@section('description', 'Berita terkini dan informasi terbaru dari Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section with Background Image -->
    <div class="relative overflow-hidden mb-8 shadow-2xl mt-20 h-[70vh] min-h-[500px]">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Background PUPR Garut" class="w-full h-full object-cover object-center">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70"></div>
            <div class="absolute inset-0 bg-black/20"></div>
        </div>
        
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 z-5">
            <div class="absolute top-20 left-20 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute top-40 right-32 w-20 h-20 bg-yellow-300 bg-opacity-20 rounded-full animate-ping"></div>
            <div class="absolute bottom-32 left-1/3 w-24 h-24 bg-green-400 bg-opacity-15 rounded-full animate-pulse"></div>
            <div class="absolute top-1/2 right-20 w-16 h-16 bg-pink-400 bg-opacity-10 rounded-full animate-spin"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="max-w-4xl mx-auto space-y-6">
                <div class="inline-flex items-center gap-3 bg-white/90 backdrop-blur-md rounded-full px-6 py-3 text-gray-800 font-semibold shadow-lg border border-white/50">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Update Terkini
                </div>
                
                <!-- Title -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)] leading-tight">
                    Berita 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-200 to-yellow-100 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Terkini
                    </span>
                </h1>
                
                <!-- Subtitle -->
                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3">
                    <p class="text-xl md:text-2xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                    </p>
                </div>
                
                <!-- Stats -->
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <div class="bg-white/90 backdrop-blur-md rounded-2xl px-6 py-3 text-gray-800 font-semibold border border-white/50 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                        </svg>
                        Update: 5 Agustus 2025
                    </div>
                    <div class="bg-white/90 backdrop-blur-md rounded-2xl px-6 py-3 text-gray-800 font-semibold border border-white/50 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        15 Berita Baru
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Effect -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" class="w-full h-16 fill-gray-50">
                <path d="M0,60 C150,100 350,0 600,60 C850,120 1050,20 1200,60 L1200,120 L0,120 Z"/>
            </svg>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 -mt-8 relative z-10">
        <!-- Search Section -->
        <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 mb-12 shadow-2xl border border-white/20">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Cari Berita</h3>
                    <p class="text-gray-600">Temukan informasi terkini yang Anda cari</p>
                </div>
                
                <!-- Modern Search Bar -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-2xl border-2 border-gray-100 overflow-hidden">
                        <div class="flex items-center">
                            <div class="pl-6 pr-4 py-4">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                placeholder="Ketik kata kunci berita yang ingin dicari..." 
                                class="flex-1 py-4 text-lg bg-transparent border-none outline-none focus:outline-none placeholder-gray-400 text-gray-700 font-medium"
                            >
                            <button class="mr-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-8 py-3 rounded-xl font-bold transition-all duration-300 hover:shadow-lg hover:scale-105 transform">
                                <span class="flex items-center gap-2">
                                    Cari
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured News Section -->
        <div class="mb-16">
            <!-- Category pills -->
            <div class="mb-6 flex flex-wrap items-center gap-3 justify-center">
                @php $tags = ['Semua','Infrastruktur','Tata Ruang','Lingkungan','Transportasi','Teknologi']; @endphp
                @foreach ($tags as $idx => $tag)
                <button class="px-4 py-2 rounded-full text-sm font-semibold border @if($idx===0) bg-blue-600 text-white border-blue-600 @else bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:text-blue-700 @endif transition">{{ $tag }}</button>
                @endforeach
            </div>
            <div class="text-center mb-12">
                <h2 class="text-4xl font-black text-gray-800 mb-4">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                        Berita Utama
                    </span>
                </h2>
                <p class="text-xl text-gray-600">Informasi terpenting dan terkini untuk Anda</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Main Featured Article -->
                <article class="bg-white rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/600x350/4F46E5/FFFFFF?text=Jalan+Tol+Garut-Bandung" alt="Berita Utama" class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        
                        <!-- Breaking Badge -->
                        <div class="absolute top-6 left-6">
                            <span class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse">
                                BREAKING NEWS
                            </span>
                        </div>
                        
                        <!-- Meta Info -->
                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="bg-white bg-opacity-20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm">
                                    5 Agustus 2025
                                </span>
                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                    INFRASTRUKTUR
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-2xl font-black text-gray-800 mb-4 leading-tight">
                            Progres Pembangunan Jalan Tol Garut-Bandung Mencapai 75%
                        </h3>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">
                            Dinas PUPR Kabupaten Garut melaporkan bahwa pembangunan jalan tol yang menghubungkan Garut dengan Bandung telah mencapai progres 75%. Pembangunan ini diharapkan dapat meningkatkan konektivitas dan perekonomian daerah.
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-colors duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            
                            <div class="flex items-center gap-2">
                                <button class="p-2 bg-gray-100 hover:bg-red-100 rounded-full transition-colors duration-300">
                                    <svg class="w-5 h-5 text-gray-500 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                                <button class="p-2 bg-gray-100 hover:bg-blue-100 rounded-full transition-colors duration-300">
                                    <svg class="w-5 h-5 text-gray-500 hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Recent News Sidebar -->
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl p-1 shadow-xl">
                        <div class="bg-white rounded-2xl p-5">
                            <h4 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m2 0V9a4 4 0 10-8 0v3H4l4 4 4-4h-2"/></svg>
                                Langganan Update
                            </h4>
                            <div class="flex gap-2">
                                <input type="email" placeholder="Email Anda" class="flex-1 px-3 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <button class="px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">Kirim</button>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-2xl font-black text-gray-800 mb-6 flex items-center gap-3">
                        <div class="w-1 h-8 bg-gradient-to-b from-purple-600 to-pink-600 rounded-full"></div>
                        Berita Terbaru
                    </h3>
                    
                    <!-- Recent News Items -->
                    <article class="bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300">
                        <div class="flex gap-4">
                            <img src="https://via.placeholder.com/120x80/10B981/FFFFFF?text=Jembatan" alt="Berita" class="w-24 h-20 object-cover rounded-xl flex-shrink-0">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-sm text-gray-500">4 Agustus 2025</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold">INFRASTRUKTUR</span>
                                </div>
                                <h4 class="font-bold text-gray-800 text-lg mb-2 hover:text-blue-600 cursor-pointer">
                                    Rehabilitasi Jembatan Cimanuk Fase 2 Dimulai
                                </h4>
                                <p class="text-gray-600 text-sm">Pekerjaan rehabilitasi jembatan strategis di Sungai Cimanuk memasuki fase kedua...</p>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300">
                        <div class="flex gap-4">
                            <img src="https://via.placeholder.com/120x80/8B5CF6/FFFFFF?text=RTRW" alt="Berita" class="w-24 h-20 object-cover rounded-xl flex-shrink-0">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-sm text-gray-500">3 Agustus 2025</span>
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs font-bold">TATA RUANG</span>
                                </div>
                                <h4 class="font-bold text-gray-800 text-lg mb-2 hover:text-blue-600 cursor-pointer">
                                    Revisi RTRW Kabupaten Garut 2025-2045
                                </h4>
                                <p class="text-gray-600 text-sm">Masyarakat diundang memberikan masukan dalam proses revisi...</p>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300">
                        <div class="flex gap-4">
                            <img src="https://via.placeholder.com/120x80/F59E0B/FFFFFF?text=Info" alt="Berita" class="w-24 h-20 object-cover rounded-xl flex-shrink-0">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-sm text-gray-500">2 Agustus 2025</span>
                                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-bold">PENGUMUMAN</span>
                                </div>
                                <h4 class="font-bold text-gray-800 text-lg mb-2 hover:text-blue-600 cursor-pointer">
                                    Pengumuman Lelang Proyek Drainase
                                </h4>
                                <p class="text-gray-600 text-sm">Dinas PUPR mengumumkan pembukaan lelang untuk proyek pembangunan...</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <!-- All News Grid -->
        <div class="mb-16">
            <!-- Horizontal Highlights Carousel -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xl font-bold text-gray-900">Sorotan</h3>
                    <div class="flex gap-2">
                        <button id="hl-prev" class="p-2 rounded-lg border bg-white hover:bg-gray-50">
                            <svg class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button id="hl-next" class="p-2 rounded-lg border bg-white hover:bg-gray-50">
                            <svg class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
                <div id="hl-scroll" class="relative">
                    <div class="flex gap-5 overflow-x-auto no-scrollbar snap-x snap-mandatory scroll-smooth pb-2">
                        @php $highlights = [
                          ['title'=>'Pembangunan Jembatan Baru','tag'=>'INFRASTRUKTUR','color'=>'blue','img'=>'https://via.placeholder.com/360x200/3B82F6/FFFFFF?text=Jembatan'],
                          ['title'=>'Penataan Kawasan Kota','tag'=>'TATA RUANG','color'=>'purple','img'=>'https://via.placeholder.com/360x200/8B5CF6/FFFFFF?text=Kota'],
                          ['title'=>'Program Air Bersih','tag'=>'LINGKUNGAN','color'=>'emerald','img'=>'https://via.placeholder.com/360x200/10B981/FFFFFF?text=Air+Bersih'],
                          ['title'=>'Smart Traffic System','tag'=>'TEKNOLOGI','color'=>'amber','img'=>'https://via.placeholder.com/360x200/F59E0B/FFFFFF?text=Traffic'],
                        ]; @endphp
                        @foreach ($highlights as $hl)
                        <a href="#" class="shrink-0 w-80 snap-start">
                            <div class="rounded-2xl overflow-hidden border bg-white shadow-sm hover:shadow-md transition">
                                <div class="relative">
                                    <img src="{{ $hl['img'] }}" class="w-full h-44 object-cover" alt="{{ $hl['title'] }}">
                                    <span class="absolute top-3 left-3 text-xs font-bold text-white px-2 py-1 rounded bg-black/40">{{ $hl['tag'] }}</span>
                                </div>
                                <div class="p-4">
                                    <p class="font-semibold text-gray-900 line-clamp-2">{{ $hl['title'] }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-black text-gray-800 mb-4 md:mb-0">Semua Berita</h2>
                <select class="bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-medium focus:outline-none focus:border-blue-500">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>Terpopuler</option>
                </select>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- News Card 1 -->
                <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/400x240/3B82F6/FFFFFF?text=Irigasi+Modern" alt="Berita" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-bold">TRENDING</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm text-gray-500">1 Agustus 2025</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-bold">INFRASTRUKTUR</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600 cursor-pointer">
                            Modernisasi Sistem Irigasi Tarogong Kidul Rampung
                        </h3>
                        <p class="text-gray-600 mb-4">Sistem irigasi modern dengan teknologi terkini telah selesai dibangun...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/400x240/10B981/FFFFFF?text=SANIMAS" alt="Berita" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">NEW</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm text-gray-500">31 Juli 2025</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold">LINGKUNGAN</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600 cursor-pointer">
                            Program SANIMAS Tahap III Targetkan 50 Desa
                        </h3>
                        <p class="text-gray-600 mb-4">Program Sanitasi Berbasis Masyarakat memasuki tahap ketiga...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/400x240/F59E0B/FFFFFF?text=Pelatihan" alt="Berita" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">HOT</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm text-gray-500">30 Juli 2025</span>
                            <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-bold">KEGIATAN</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600 cursor-pointer">
                            Pelatihan Teknis Konstruksi untuk Kontraktor Lokal
                        </h3>
                        <p class="text-gray-600 mb-4">Dinas PUPR menyelenggarakan pelatihan untuk meningkatkan kapasitas...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 4 -->
                <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/400x240/8B5CF6/FFFFFF?text=Smart+City" alt="Berita" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm text-gray-500">29 Juli 2025</span>
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs font-bold">TEKNOLOGI</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600 cursor-pointer">
                            Implementasi Smart City di Pusat Kota Garut
                        </h3>
                        <p class="text-gray-600 mb-4">Konsep kota pintar mulai diterapkan dengan instalasi sensor IoT...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 5 -->
                <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/400x240/EF4444/FFFFFF?text=Rest+Area" alt="Berita" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm text-gray-500">28 Juli 2025</span>
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-bold">TRANSPORTASI</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600 cursor-pointer">
                            Rencana Pembangunan Rest Area Modern di Tol Garut
                        </h3>
                        <p class="text-gray-600 mb-4">Rest area dengan fasilitas lengkap akan dibangun untuk kenyamanan...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 6 -->
                <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://via.placeholder.com/400x240/059669/FFFFFF?text=Green+Building" alt="Berita" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold">ECO</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm text-gray-500">27 Juli 2025</span>
                            <span class="bg-emerald-100 text-emerald-800 px-2 py-1 rounded-full text-xs font-bold">BERKELANJUTAN</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600 cursor-pointer">
                            Gedung Perkantoran Ramah Lingkungan Segera Diresmikan
                        </h3>
                        <p class="text-gray-600 mb-4">Bangunan dengan konsep green building akan menjadi landmark baru...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                <nav class="flex items-center gap-2">
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg text-gray-400 hover:text-gray-600 transition-colors duration-300" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <button class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-lg font-bold shadow-lg">
                        1
                    </button>
                    
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 text-gray-700 rounded-lg font-bold hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">
                        2
                    </button>
                    
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 text-gray-700 rounded-lg font-bold hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">
                        3
                    </button>
                    
                    <span class="px-3 py-2 text-gray-400">...</span>
                    
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 text-gray-700 rounded-lg font-bold hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">
                        10
                    </button>
                    
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg text-gray-700 hover:text-gray-900 transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
  .no-scrollbar::-webkit-scrollbar { display: none; }
  .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    const searchButton = document.querySelector('button[class*="bg-gradient-to-r"]');
    let searchTimeout;
    
    if (searchInput) {
        // Real-time search dengan debouncing
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                console.log('Mencari:', this.value);
                // Implementasi pencarian akan ditambahkan di sini
            }, 300);
        });
        
        // Search on Enter
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch(this.value);
            }
        });
    }
    
    if (searchButton) {
        searchButton.addEventListener('click', function() {
            const query = searchInput.value;
            performSearch(query);
        });
    }
    
    function performSearch(query) {
        if (query.trim()) {
            console.log('Melakukan pencarian untuk:', query);
            // Implementasi pencarian aktual akan ditambahkan di sini
            // Misalnya: window.location.href = `/search?q=${encodeURIComponent(query)}`;
        }
    }
    
    // Quick search tags
    const quickTags = document.querySelectorAll('button[class*="bg-blue-50"], button[class*="bg-purple-50"], button[class*="bg-green-50"], button[class*="bg-orange-50"]');
    
    quickTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const tagText = this.textContent.replace('#', '');
            searchInput.value = tagText;
            performSearch(tagText);
        });
    });
    
    // Smooth scroll for pagination
    const paginationButtons = document.querySelectorAll('nav button');
    paginationButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (!this.disabled) {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    });

    // Highlights scroll controls
    const hlContainer = document.querySelector('#hl-scroll > div');
    const hlPrev = document.getElementById('hl-prev');
    const hlNext = document.getElementById('hl-next');
    if (hlContainer && hlPrev && hlNext) {
        const step = 320;
        hlPrev.addEventListener('click', () => hlContainer.scrollBy({ left: -step, behavior: 'smooth' }));
        hlNext.addEventListener('click', () => hlContainer.scrollBy({ left: step, behavior: 'smooth' }));
    }
    
    // Add loading animation for cards
    const cards = document.querySelectorAll('article');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `all 0.6s ease-out ${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Add search input focus effects
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.closest('.group').classList.add('ring-4', 'ring-blue-500', 'ring-opacity-20');
        });
        
        searchInput.addEventListener('blur', function() {
            this.closest('.group').classList.remove('ring-4', 'ring-blue-500', 'ring-opacity-20');
        });
    }
});
</script>
@endpush