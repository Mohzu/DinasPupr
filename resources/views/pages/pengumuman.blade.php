@extends('layouts.app')

@section('title', 'Pengumuman')
@section('description', 'Pengumuman resmi dari Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
    
    <!-- Hero Section - Full Width dengan height yang pas -->
    <div class="relative overflow-hidden mb-8 shadow-2xl mt-20 h-[70vh] min-h-[500px] mt-16">
        <!-- Background Image dengan object positioning yang lebih baik -->
        <div class="absolute inset-0">
            <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Background PUPR Garut" class="w-full h-full object-cover object-center">
            <!-- Overlay yang lebih gelap untuk kontras text yang lebih baik -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70"></div>
            <!-- Tambahan overlay untuk memastikan text terbaca -->
            <div class="absolute inset-0 bg-black/20"></div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute inset-0 z-5">
            <div class="absolute top-8 left-8 w-16 h-16 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
            <div class="absolute top-24 right-12 w-12 h-12 bg-yellow-300 bg-opacity-30 rounded-full animate-bounce"></div>
            <div class="absolute bottom-16 left-1/4 w-10 h-10 bg-green-400 bg-opacity-20 rounded-full animate-ping"></div>
        </div>
        
        <!-- Content dengan positioning yang lebih centered -->
        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-white bg-opacity-95 backdrop-blur-md rounded-full px-4 py-2 text-gray-800 text-sm font-semibold mb-6 border border-white border-opacity-50 shadow-lg">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Update Terkini
                </div>
                
                <!-- Title dengan shadow yang lebih kuat -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
                    Pengumuman 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-200 to-orange-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Resmi
                    </span>
                </h1>
                
                <!-- Subtitle dengan background semi-transparent -->
                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-8">
                    <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                    </p>
                </div>
                
                <!-- Stats dengan background yang lebih kontras -->
                <div class="flex flex-wrap justify-center gap-3">
                    <div class="bg-white/90 backdrop-blur-md rounded-xl px-4 py-2 text-gray-800 text-sm font-semibold border border-white/50 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                        </svg>
                        6 Agustus 2025
                    </div>
                    <div class="bg-white/90 backdrop-blur-md rounded-xl px-4 py-2 text-gray-800 text-sm font-semibold border border-white/50 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        127 Pengumuman
                    </div>
                    <div class="bg-white/90 backdrop-blur-md rounded-xl px-4 py-2 text-gray-800 text-sm font-semibold border border-white/50 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        5 Baru
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container untuk konten selanjutnya -->
    <div class="container mx-auto px-6 py-8">

        <!-- Featured Announcement -->
        <div class="mb-12">
            <div class="bg-gradient-to-r from-red-500 to-pink-600 rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="p-8">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-white bg-opacity-20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="flex-1 text-white">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="bg-yellow-300 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                    URGENT
                                </span>
                                <span class="bg-white bg-opacity-20 backdrop-blur-sm px-3 py-1 rounded-full text-xs">
                                    Deadline: 15 Agustus 2025
                                </span>
                            </div>
                            
                            <h2 class="text-2xl font-bold mb-3">
                                Lelang Terbuka Pembangunan Jalan Lingkar Utara Garut Tahap II
                            </h2>
                            
                            <p class="text-white text-opacity-90 mb-4 leading-relaxed">
                                Pengumuman lelang untuk proyek strategis pembangunan infrastruktur jalan senilai Rp 45 Miliar. 
                                Batas akhir pendaftaran dalam 10 hari.
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-white bg-opacity-20 backdrop-blur-sm px-3 py-1 rounded-lg text-xs">💰 Rp 45 Miliar</span>
                                <span class="bg-white bg-opacity-20 backdrop-blur-sm px-3 py-1 rounded-lg text-xs">🏗️ Infrastruktur</span>
                                <span class="bg-white bg-opacity-20 backdrop-blur-sm px-3 py-1 rounded-lg text-xs">📍 Garut Utara</span>
                            </div>
                            
                            <button class="bg-white hover:bg-gray-100 text-red-600 px-6 py-2 rounded-xl font-semibold transition-all duration-300 hover:scale-105">
                                Lihat Detail Lengkap
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Announcements Grid -->
        <div class="space-y-8 mb-12">
            
            <!-- Announcement Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Pengadaan
                                </span>
                                <span class="text-gray-500 text-sm">5 Agustus 2025</span>
                                <span class="ml-auto bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                    SELESAI
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors cursor-pointer">
                                Pengumuman Hasil Lelang Rehabilitasi Jembatan Cikandang
                            </h3>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Telah selesai dilakukan evaluasi terhadap penawaran yang masuk untuk pekerjaan rehabilitasi 
                                Jembatan Cikandang. Pemenang lelang telah ditetapkan dengan nilai kontrak Rp 2.8 Miliar.
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">🏗️ Infrastruktur</span>
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">💰 Rp 2.8M</span>
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">⏱️ 6 Bulan</span>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                        </svg>
                                        245 dilihat
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        23 unduhan
                                    </span>
                                </div>
                                
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-medium transition-all duration-300">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcement Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Kebijakan
                                </span>
                                <span class="text-gray-500 text-sm">3 Agustus 2025</span>
                                <span class="ml-auto bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                    BARU
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors cursor-pointer">
                                Peraturan Baru Tata Cara Pengurusan IMB di Kabupaten Garut
                            </h3>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Dalam rangka meningkatkan pelayanan publik, Dinas PUPR mengeluarkan peraturan terbaru 
                                mengenai tata cara pengurusan Izin Mendirikan Bangunan (IMB) dengan sistem digital terintegrasi.
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">📋 Perizinan</span>
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">💻 Digital</span>
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">⚡ Cepat</span>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                        </svg>
                                        189 dilihat
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        45 unduhan
                                    </span>
                                </div>
                                
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-medium transition-all duration-300">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcement Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-violet-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Rekrutmen
                                </span>
                                <span class="text-gray-500 text-sm">1 Agustus 2025</span>
                                <span class="ml-auto bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-medium">
                                    HOT
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors cursor-pointer">
                                Lowongan Tenaga Kontrak PUPR Garut Periode 2025
                            </h3>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Dinas PUPR Kabupaten Garut membuka kesempatan bagi putra-putri terbaik untuk bergabung 
                                sebagai tenaga kontrak pada berbagai bidang keahlian teknis dan administrasi.
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">👥 15 Posisi</span>
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">🎓 S1/D3</span>
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">📅 Deadline 20 Agt</span>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                        </svg>
                                        412 dilihat
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        67 unduhan
                                    </span>
                                </div>
                                
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-medium transition-all duration-300">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <span class="text-gray-700 font-medium">Tampilkan:</span>
                    <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option>10 per halaman</option>
                        <option>25 per halaman</option>
                        <option>50 per halaman</option>
                    </select>
                    <span class="text-gray-500">dari 127 pengumuman</span>
                </div>
                
                <div class="flex items-center space-x-1">
                    <button class="p-2 text-gray-400 rounded-lg hover:bg-gray-100 transition-colors" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium shadow-md">1</button>
                    <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">2</button>
                    <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">3</button>
                    <span class="px-2 text-gray-400">...</span>
                    <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">13</button>
                    
                    <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700');
            });
            
            this.classList.remove('bg-white', 'text-gray-700');
            this.classList.add('bg-blue-600', 'text-white');
        });
    });
    
    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    let searchTimeout;
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                console.log('Searching for:', this.value);
            }, 300);
        });
    }
    
    // Scroll animations
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
    
    // Observe cards for animation
    document.querySelectorAll('.bg-white').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease-out';
        observer.observe(card);
    });
});
</script>
@endpush