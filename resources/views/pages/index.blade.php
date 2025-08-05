@extends('layouts.app')

@section('title', 'Beranda - Dinas PUPR Kabupaten Garut')
@section('description', 'Website resmi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
    {{-- Hero Section --}}
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
                
                {{-- Connecting Lines (Optional - untuk efek lebih menarik) --}}
                <div class="absolute inset-0 pointer-events-none">
                    <svg class="w-full h-full opacity-10">
                        <defs>
                            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#grid)" />
                    </svg>
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
                <div class="inline-flex items-center bg-blue-50 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    LAYANAN UNGGULAN
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Membangun <span class="text-blue-600">Infrastruktur</span> Terdepan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Kami menyediakan layanan terbaik dalam pembangunan infrastruktur dan penataan ruang 
                    untuk mendukung kemajuan Kabupaten Garut
                </p>
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
                    
                    <a href="#" class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                        <span class="mr-2">Pelajari lebih lanjut</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
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
                    
                    <a href="#" class="flex items-center text-green-600 font-semibold group-hover:text-green-700">
                        <span class="mr-2">Pelajari lebih lanjut</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
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
                    
                    <a href="#" class="flex items-center text-purple-600 font-semibold group-hover:text-purple-700">
                        <span class="mr-2">Pelajari lebih lanjut</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- View All Button --}}
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 transform hover:-translate-y-1 transition-all duration-300 shadow-xl">
                    <span class="mr-2">Lihat Semua Layanan</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Latest News Section Added --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            {{-- Modifikasi di sini: Konten berita dibungkus dalam card putih yang besar --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden p-8 lg:p-12">
                
                {{-- Section Header --}}
                <div class="flex items-center justify-between mb-8 border-b pb-4">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-3xl font-bold text-gray-900">Berita Terkini</h2>
                        <div class="mt-1 flex space-x-2">
                            <a href="#" class="px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-100 rounded-lg shadow-sm">Terbaru</a>
                            <a href="#" class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">Populer</a>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center text-blue-600 font-semibold group">
                        <span class="mr-1">Lihat Semua Berita</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                {{-- News Layout --}}
                <div class="grid lg:grid-cols-12 gap-8">
                    {{-- Main News (Kolom Kiri) --}}
                    <div class="lg:col-span-8 bg-white rounded-xl shadow-lg overflow-hidden group">
                        <img src="https://via.placeholder.com/1200x800.png?text=Berita+Utama" alt="Berita Utama" class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 leading-tight mb-2 group-hover:text-blue-600 transition-colors duration-200">
                                Sekda Ajak Perangkat Daerah Semarakkan Hari Jadi Garut
                            </h3>
                            <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                                <span><svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 7 jam yang lalu</span>
                                <span><svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> Oleh Admin</span>
                            </div>
                            <p class="text-md text-gray-600 line-clamp-3">Pemerintah Kabupaten Garut melalui Dinas PUPR mengadakan sosialisasi dan mengajak seluruh perangkat daerah untuk terlibat aktif dalam perayaan hari jadi kabupaten...</p>
                            <a href="#" class="inline-flex items-center mt-4 text-blue-600 font-semibold group">
                                <span class="mr-1">Baca Selengkapnya</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Sidebar News List (Kolom Kanan) --}}
                    <div class="lg:col-span-4 space-y-4">
                        {{-- News List Item 1 --}}
                        <a href="#" class="group block bg-white rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                            <h4 class="text-lg font-bold text-gray-900 leading-tight mb-1 group-hover:text-blue-600 transition-colors duration-200">
                                Sharia Financial Fair Berhasil Tambah 785 Rekening Baru Nasabah
                            </h4>
                            <div class="flex items-center text-xs text-gray-500 space-x-2">
                                <span>Ekonomi</span>
                                <span class="text-gray-300">•</span>
                                <span>8 Jam Yang Lalu</span>
                            </div>
                        </a>
                        
                        {{-- News List Item 2 --}}
                        <a href="#" class="group block bg-white rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                            <h4 class="text-lg font-bold text-gray-900 leading-tight mb-1 group-hover:text-blue-600 transition-colors duration-200">
                                Wagub Erwan Setiawan Hadiri Pengambilan Sumpah PAW DPRD...
                            </h4>
                            <div class="flex items-center text-xs text-gray-500 space-x-2">
                                <span>Pemerintahan</span>
                                <span class="text-gray-300">•</span>
                                <span>8 Jam Yang Lalu</span>
                            </div>
                        </a>

                        {{-- News List Item 3 --}}
                        <a href="#" class="group block bg-white rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                            <h4 class="text-lg font-bold text-gray-900 leading-tight mb-1 group-hover:text-blue-600 transition-colors duration-200">
                                Sekda Kabupaten Bogor Tekankan Semangat Kolaboratif dan Responsif...
                            </h4>
                            <div class="flex items-center text-xs text-gray-500 space-x-2">
                                <span>Pemerintahan</span>
                                <span class="text-gray-300">•</span>
                                <span>6 Jam Yang Lalu</span>
                            </div>
                        </a>

                        {{-- News List Item 4 --}}
                        <a href="#" class="group block bg-white rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                            <h4 class="text-lg font-bold text-gray-900 leading-tight mb-1 group-hover:text-blue-600 transition-colors duration-200">
                                Sekda Ajak Perangkat Daerah Semarakkan Hari Jadi ke-75...
                            </h4>
                            <div class="flex items-center text-xs text-gray-500 space-x-2">
                                <span>Pemerintahan</span>
                                <span class="text-gray-300">•</span>
                                <span>6 Jam Yang Lalu</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Footer Section --}}
    @include('partials.footer')
@endsection