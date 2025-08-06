@extends('layouts.app')

@section('title', 'Berita Terkini - Dinas PUPR Kabupaten Garut')
@section('description', 'Berita terkini dan informasi terbaru dari Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50">
    <!-- Hero Section with Dynamic Background -->
    <div class="relative bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-32 h-32 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute top-40 right-32 w-20 h-20 bg-yellow-300 bg-opacity-20 rounded-full animate-ping"></div>
            <div class="absolute bottom-32 left-1/3 w-24 h-24 bg-green-400 bg-opacity-15 rounded-full animate-pulse"></div>
            <div class="absolute top-1/2 right-20 w-16 h-16 bg-pink-400 bg-opacity-10 rounded-full animate-spin"></div>
        </div>
        
        <div class="container mx-auto px-6 py-24 relative z-10 mt-16">
            <div class="text-center space-y-6">
                <div class="inline-flex items-center gap-3 bg-white bg-opacity-20 backdrop-blur-sm rounded-full px-6 py-3 text-white font-medium animate-pulse">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Update Terkini
                </div>
                
                <h1 class="text-6xl md:text-7xl font-black text-white drop-shadow-2xl leading-tight">
                    Berita 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-200 animate-pulse">
                        Terkini
                    </span>
                </h1>
                
                <p class="text-2xl text-blue-100 font-semibold max-w-3xl mx-auto leading-relaxed">
                    Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                </p>
                
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <div class="bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-lg rounded-2xl px-6 py-3 text-white font-medium border border-white/20">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                        </svg>
                        Update: 5 Agustus 2025
                    </div>
                    <div class="bg-gradient-to-r from-green-500/20 to-emerald-500/10 backdrop-blur-lg rounded-2xl px-6 py-3 text-white font-medium border border-green-400/20">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        15 Berita Baru
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Effect -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" class="w-full h-16 fill-slate-50">
                <path d="M0,60 C150,100 350,0 600,60 C850,120 1050,20 1200,60 L1200,120 L0,120 Z"/>
            </svg>
        </div>
    </div>

    <div class="container mx-auto px-6 -mt-8 relative z-20">
        <!-- Modern Filter Section -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 mb-12 shadow-2xl border border-white/20">
            <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-6">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-gray-800 font-bold text-lg flex items-center gap-2">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V4z"/>
                        </svg>
                        Filter:
                    </span>
                    
                    <button class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl text-sm font-bold transition-all duration-300 hover:scale-105 hover:shadow-2xl transform">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Semua
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-purple-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    
                    <button class="filter-btn px-8 py-4 bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-700 hover:text-blue-700 rounded-2xl text-sm font-bold border-2 border-gray-200 hover:border-blue-300 transition-all duration-300 hover:scale-105 transform shadow-lg hover:shadow-xl">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                            Infrastruktur
                        </span>
                    </button>
                    
                    <button class="filter-btn px-8 py-4 bg-white hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-100 text-gray-700 hover:text-green-700 rounded-2xl text-sm font-bold border-2 border-gray-200 hover:border-green-300 transition-all duration-300 hover:scale-105 transform shadow-lg hover:shadow-xl">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                            </svg>
                            Tata Ruang
                        </span>
                    </button>
                    
                    <button class="filter-btn px-8 py-4 bg-white hover:bg-gradient-to-r hover:from-orange-50 hover:to-amber-100 text-gray-700 hover:text-orange-700 rounded-2xl text-sm font-bold border-2 border-gray-200 hover:border-orange-300 transition-all duration-300 hover:scale-105 transform shadow-lg hover:shadow-xl">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                            </svg>
                            Pengumuman
                        </span>
                    </button>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari berita terbaru..." class="pl-14 pr-6 py-4 w-72 bg-white/50 backdrop-blur-sm border-2 border-gray-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/30 focus:border-blue-500 transition-all duration-300 text-gray-700 font-medium shadow-lg">
                        <svg class="w-6 h-6 absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Berita Utama Section -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 mb-4">
                    Berita Utama
                </h2>
                <p class="text-xl text-gray-600 font-medium">Informasi terpenting dan terkini untuk Anda</p>
            </div>
            
            <div class="grid xl:grid-cols-2 gap-12">
                <!-- Featured Article -->
                <article class="group relative bg-white rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 hover:scale-[1.02] border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/700x400?text=Pembangunan+Jalan+Tol" alt="Berita Utama" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        
                        <div class="absolute top-6 left-6">
                            <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-full text-sm font-black shadow-2xl animate-pulse flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                BREAKING NEWS
                            </span>
                        </div>
                        
                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="bg-white/20 backdrop-blur-md text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    5 Agustus 2025
                                </span>
                                <span class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                    <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                    </svg>
                                    INFRASTRUKTUR
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-3xl font-black text-gray-800 mb-6 leading-tight group-hover:text-blue-600 transition-colors duration-300">
                            <a href="#" class="hover:underline">Progres Pembangunan Jalan Tol Garut-Bandung Mencapai 75%</a>
                        </h3>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">Dinas PUPR Kabupaten Garut melaporkan bahwa pembangunan jalan tol yang menghubungkan Garut dengan Bandung telah mencapai progres 75%. Pembangunan ini diharapkan dapat meningkatkan konektivitas dan perekonomian daerah...</p>
                        
                        <div class="flex items-center justify-between">
                            <a href="#" class="group/link inline-flex items-center gap-3 text-blue-600 hover:text-blue-800 font-bold text-lg transition-all duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-5 h-5 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            
                            <div class="flex items-center gap-2">
                                <button class="p-3 bg-gray-100 hover:bg-blue-100 rounded-full transition-colors duration-300 hover:scale-110 transform">
                                    <svg class="w-5 h-5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                                <button class="p-3 bg-gray-100 hover:bg-green-100 rounded-full transition-colors duration-300 hover:scale-110 transform">
                                    <svg class="w-5 h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Sidebar Recent News -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1 h-12 bg-gradient-to-b from-purple-600 to-pink-600 rounded-full"></div>
                        <h3 class="text-3xl font-black text-gray-800">Berita Terbaru</h3>
                    </div>
                    
                    <div class="space-y-6">
                        <!-- Recent News Item -->
                        <article class="group bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                            <div class="flex gap-6">
                                <div class="relative overflow-hidden rounded-xl flex-shrink-0">
                                    <img src="https://via.placeholder.com/150x100?text=Jembatan" alt="Berita" class="w-32 h-24 object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-sm text-gray-500 font-medium">4 Agustus 2025</span>
                                        <span class="bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                            INFRASTRUKTUR
                                        </span>
                                    </div>
                                    <h4 class="font-black text-gray-800 text-lg mb-3 group-hover:text-blue-600 transition-colors leading-tight">
                                        <a href="#" class="hover:underline">Rehabilitasi Jembatan Cimanuk Fase 2 Dimulai</a>
                                    </h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Pekerjaan rehabilitasi jembatan strategis di Sungai Cimanuk memasuki fase kedua dengan target penyelesaian...</p>
                                </div>
                            </div>
                        </article>

                        <article class="group bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                            <div class="flex gap-6">
                                <div class="relative overflow-hidden rounded-xl flex-shrink-0">
                                    <img src="https://via.placeholder.com/150x100?text=RTRW" alt="Berita" class="w-32 h-24 object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-sm text-gray-500 font-medium">3 Agustus 2025</span>
                                        <span class="bg-gradient-to-r from-purple-100 to-violet-100 text-purple-800 px-3 py-1 rounded-full text-xs font-bold">
                                            TATA RUANG
                                        </span>
                                    </div>
                                    <h4 class="font-black text-gray-800 text-lg mb-3 group-hover:text-blue-600 transition-colors leading-tight">
                                        <a href="#" class="hover:underline">Revisi RTRW Kabupaten Garut 2025-2045 Masuk Tahap Konsultasi Publik</a>
                                    </h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Masyarakat diundang memberikan masukan dalam proses revisi Rencana Tata Ruang Wilayah...</p>
                                </div>
                            </div>
                        </article>

                        <article class="group bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                            <div class="flex gap-6">
                                <div class="relative overflow-hidden rounded-xl flex-shrink-0">
                                    <img src="https://via.placeholder.com/150x100?text=Pengumuman" alt="Berita" class="w-32 h-24 object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-sm text-gray-500 font-medium">2 Agustus 2025</span>
                                        <span class="bg-gradient-to-r from-orange-100 to-amber-100 text-orange-800 px-3 py-1 rounded-full text-xs font-bold">
                                            PENGUMUMAN
                                        </span>
                                    </div>
                                    <h4 class="font-black text-gray-800 text-lg mb-3 group-hover:text-blue-600 transition-colors leading-tight">
                                        <a href="#" class="hover:underline">Pengumuman Lelang Proyek Pembangunan Drainase Kota Garut</a>
                                    </h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Dinas PUPR mengumumkan pembukaan lelang untuk proyek pembangunan sistem drainase...</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <!-- All News Grid -->
        <div class="mb-16">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="flex items-center gap-4 mb-4 md:mb-0">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full"></div>
                    <h2 class="text-4xl font-black text-gray-800">Semua Berita</h2>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-gray-700 font-semibold">Urutkan:</span>
                    <select class="bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-medium focus:outline-none focus:ring-4 focus:ring-blue-500/30 focus:border-blue-500 transition-all duration-300 shadow-lg">
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>Terpopuler</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 mb-12">
                <!-- News Card 1 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250?text=Proyek+Irigasi" alt="Berita" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-gray-800">
                                TRENDING
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-sm text-gray-500 font-medium">1 Agustus 2025</span>
                            <span class="bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 px-3 py-1 rounded-full text-xs font-bold">
                                INFRASTRUKTUR
                            </span>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                            <a href="#" class="hover:underline">Modernisasi Sistem Irigasi Tarogong Kidul Rampung</a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Sistem irigasi modern dengan teknologi terkini telah selesai dibangun dan siap melayani petani di wilayah Tarogong Kidul...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-all duration-300 group/link">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250?text=Sanitasi" alt="Berita" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold animate-pulse">
                                NEW
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-sm text-gray-500 font-medium">31 Juli 2025</span>
                            <span class="bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                LINGKUNGAN
                            </span>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                            <a href="#" class="hover:underline">Program SANIMAS Tahap III Targetkan 50 Desa</a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Program Sanitasi Berbasis Masyarakat (SANIMAS) memasuki tahap ketiga dengan target pembangunan fasilitas sanitasi di 50 desa...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-all duration-300 group/link">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250?text=Pelatihan" alt="Berita" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                HOT
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-sm text-gray-500 font-medium">30 Juli 2025</span>
                            <span class="bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">
                                KEGIATAN
                            </span>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                            <a href="#" class="hover:underline">Pelatihan Teknis Konstruksi untuk Kontraktor Lokal</a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Dinas PUPR menyelenggarakan pelatihan teknis konstruksi untuk meningkatkan kapasitas kontraktor lokal dalam pelaksanaan proyek...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-all duration-300 group/link">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 4 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250?text=Smart+City" alt="Berita" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-sm text-gray-500 font-medium">29 Juli 2025</span>
                            <span class="bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 px-3 py-1 rounded-full text-xs font-bold">
                                TEKNOLOGI
                            </span>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                            <a href="#" class="hover:underline">Implementasi Smart City di Pusat Kota Garut</a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Konsep kota pintar mulai diterapkan dengan instalasi berbagai sensor IoT dan sistem monitoring terintegrasi...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-all duration-300 group/link">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 5 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250?text=Jalan+Tol" alt="Berita" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-sm text-gray-500 font-medium">28 Juli 2025</span>
                            <span class="bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-800 px-3 py-1 rounded-full text-xs font-bold">
                                TRANSPORTASI
                            </span>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                            <a href="#" class="hover:underline">Rencana Pembangunan Rest Area Modern di Tol Garut</a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Rest area dengan fasilitas lengkap dan ramah lingkungan akan dibangun untuk kenyamanan pengguna jalan tol...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-all duration-300 group/link">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- News Card 6 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250?text=Gedung+Hijau" alt="Berita" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                ECO
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-sm text-gray-500 font-medium">27 Juli 2025</span>
                            <span class="bg-gradient-to-r from-green-100 to-teal-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                BERKELANJUTAN
                            </span>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl mb-4 group-hover:text-blue-600 transition-colors leading-tight">
                            <a href="#" class="hover:underline">Gedung Perkantoran Ramah Lingkungan Segera Diresmikan</a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Bangunan dengan konsep green building dan sertifikat LEED akan menjadi landmark baru Kabupaten Garut...</p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-all duration-300 group/link">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Modern Pagination -->
            <div class="flex justify-center">
                <nav class="flex items-center gap-2">
                    <button class="group flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 rounded-xl text-gray-400 hover:text-gray-600 hover:border-blue-300 transition-all duration-300 shadow-lg disabled:opacity-50" disabled>
                        <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <button class="flex items-center justify-center w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-bold shadow-xl hover:scale-105 transform transition-all duration-300">
                        1
                    </button>
                    
                    <button class="flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600 transition-all duration-300 shadow-lg hover:scale-105 transform">
                        2
                    </button>
                    
                    <button class="flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600 transition-all duration-300 shadow-lg hover:scale-105 transform">
                        3
                    </button>
                    
                    <span class="px-4 py-2 text-gray-400 font-bold">...</span>
                    
                    <button class="flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600 transition-all duration-300 shadow-lg hover:scale-105 transform">
                        10
                    </button>
                    
                    <button class="group flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 rounded-xl text-gray-700 hover:text-gray-900 hover:border-blue-300 transition-all duration-300 shadow-lg hover:scale-105 transform">
                        <svg class="w-5 h-5 group-hover:translate-x-0.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn, button[class*="category-filter"]');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active state from all buttons
            filterButtons.forEach(btn => {
                if (btn.classList.contains('category-filter')) {
                    btn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-700');
                }
            });
            
            // Add active state to clicked button
            if (this.classList.contains('category-filter')) {
                this.classList.remove('bg-white', 'text-gray-700');
                this.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white');
            }
            
            // Add ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Search functionality with debouncing
    const searchInput = document.querySelector('input[type="text"]');
    let searchTimeout;
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                // Simulate search functionality
                console.log('Searching for:', this.value);
            }, 300);
        });
    }
    
    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all cards for animation
    document.querySelectorAll('article').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease-out';
        observer.observe(card);
    });
    
    // Add CSS animation keyframes dynamically
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endpush