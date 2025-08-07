@extends('layouts.app')

@section('title', 'Pengumuman')
@section('description', 'Pengumuman resmi dari Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@push('styles')
<style>
    .glass-effect {
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        background: rgba(255, 255, 255, 0.1);
    }
    
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">

    <!-- Hero Section -->
    <section class="relative overflow-hidden mb-8 shadow-2xl mt-20 h-[70vh] min-h-[500px]">
        <div class="absolute inset-0">
            <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Background PUPR Garut" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70"></div>
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="absolute inset-0 z-5">
            <div class="absolute top-8 left-8 w-16 h-16 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
            <div class="absolute top-24 right-12 w-12 h-12 bg-yellow-300 bg-opacity-30 rounded-full animate-bounce"></div>
            <div class="absolute bottom-16 left-1/4 w-10 h-10 bg-green-400 bg-opacity-20 rounded-full animate-ping"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-white bg-opacity-95 backdrop-blur-md rounded-full px-4 py-2 text-gray-800 text-sm font-semibold mb-6 border border-white border-opacity-50 shadow-lg">
                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Update Terkini
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
                    Pengumuman
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Resmi
                    </span>
                </h1>

                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-8">
                    <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                    </p>
                </div>

                <div class="flex flex-wrap justify-center gap-3">
                    <div class="bg-white/90 backdrop-blur-md rounded-xl px-4 py-2 text-gray-800 text-sm font-semibold border border-white/50 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" />
                        </svg>
                        6 Agustus 2025
                    </div>
                    <div class="bg-white/90 backdrop-blur-md rounded-xl px-4 py-2 text-gray-800 text-sm font-semibold border border-white/50 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        127 Pengumuman
                    </div>
                    <div class="bg-white/90 backdrop-blur-md rounded-xl px-4 py-2 text-gray-800 text-sm font-semibold border border-white/50 shadow-lg">
                        <svg class="w-4 h-4 inline mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        5 Baru
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            
            <!-- Filters -->
            <div class="max-w-7xl mx-auto mb-12">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                        <!-- Search -->
                        <div class="relative flex-1 max-w-md">
                            <input id="search-input" 
                                   type="text" 
                                   placeholder="Cari pengumuman..." 
                                   class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Filters -->
                        <div class="flex gap-3">
                            <select id="category-filter" class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                <option value="">Semua Kategori</option>
                            </select>
                            
                            <select id="sort-filter" class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                <option value="terbaru">Terbaru</option>
                                <option value="terlama">Terlama</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements List -->
            <div class="max-w-7xl mx-auto">
                <div class="space-y-6 pengumuman-list fade-in">
                    
                    <!-- Announcement Item 1 -->
                    <article class="pengumuman-item bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover" 
                             data-kategori="pengadaan" 
                             data-tanggal="2025-08-06">
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-red-700 bg-red-50 rounded-full border border-red-200">
                                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-2"></span>
                                            URGENT
                                        </span>
                                        <span class="text-sm text-gray-500">06 Agustus 2025</span>
                                    </div>
                                    
                                    <h2 class="pengumuman-judul text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                        Lelang Terbuka Pembangunan Jalan Lingkar Utara Garut Tahap II
                                    </h2>
                                    
                                    <p class="text-gray-600 leading-relaxed mb-6">
                                        Pengumuman lelang untuk proyek strategis pembangunan infrastruktur jalan senilai Rp 45 Miliar. Batas akhir pendaftaran dalam 10 hari.
                                    </p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-sm text-gray-500">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Pengadaan</span>
                                            </div>
                                        </div>
                                        
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200 font-medium">
                                            Baca selengkapnya
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Announcement Item 2 -->
                    <article class="pengumuman-item bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover"
                             data-kategori="pengadaan"
                             data-tanggal="2025-08-05">
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-blue-700 bg-blue-50 rounded-full border border-blue-200">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span>
                                            Pengadaan
                                        </span>
                                        <span class="text-sm text-gray-500">05 Agustus 2025</span>
                                    </div>
                                    
                                    <h2 class="pengumuman-judul text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                        Pengumuman Hasil Lelang Rehabilitasi Jembatan Cikandang
                                    </h2>
                                    
                                    <p class="text-gray-600 leading-relaxed mb-6">
                                        Telah selesai dilakukan evaluasi terhadap penawaran yang masuk untuk pekerjaan rehabilitasi Jembatan Cikandang. Pemenang lelang telah ditetapkan dengan nilai kontrak Rp 2.8 Miliar.
                                    </p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-sm text-gray-500">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Pengadaan</span>
                                            </div>
                                        </div>
                                        
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200 font-medium">
                                            Baca selengkapnya
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Announcement Item 3 -->
                    <article class="pengumuman-item bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover"
                             data-kategori="kebijakan"
                             data-tanggal="2025-08-03">
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-green-700 bg-green-50 rounded-full border border-green-200">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                                            Kebijakan
                                        </span>
                                        <span class="text-sm text-gray-500">03 Agustus 2025</span>
                                    </div>
                                    
                                    <h2 class="pengumuman-judul text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                        Peraturan Baru Tata Cara Pengurusan IMB di Kabupaten Garut
                                    </h2>
                                    
                                    <p class="text-gray-600 leading-relaxed mb-6">
                                        Dalam rangka meningkatkan pelayanan publik, Dinas PUPR mengeluarkan peraturan terbaru mengenai tata cara pengurusan Izin Mendirikan Bangunan (IMB) dengan sistem digital terintegrasi.
                                    </p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-sm text-gray-500">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Kebijakan</span>
                                            </div>
                                        </div>
                                        
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200 font-medium">
                                            Baca selengkapnya
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Announcement Item 4 -->
                    <article class="pengumuman-item bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover"
                             data-kategori="rekrutmen"
                             data-tanggal="2025-08-01">
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-purple-700 bg-purple-50 rounded-full border border-purple-200">
                                            <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                                            Rekrutmen
                                        </span>
                                        <span class="text-sm text-gray-500">01 Agustus 2025</span>
                                    </div>
                                    
                                    <h2 class="pengumuman-judul text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                        Lowongan Tenaga Kontrak PUPR Garut Periode 2025
                                    </h2>
                                    
                                    <p class="text-gray-600 leading-relaxed mb-6">
                                        Dinas PUPR Kabupaten Garut membuka kesempatan bagi putra-putri terbaik untuk bergabung sebagai tenaga kontrak pada berbagai bidang keahlian teknis dan administrasi.
                                    </p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-sm text-gray-500">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Rekrutmen</span>
                                            </div>
                                        </div>
                                        
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200 font-medium">
                                            Baca selengkapnya
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                    <!-- No Results Message -->
                    <div class="no-results-message bg-white rounded-2xl border border-gray-100 p-12 text-center" style="display:none;">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada pengumuman ditemukan</h3>
                        <p class="text-gray-500">Coba ubah kata kunci pencarian atau filter kategori Anda.</p>
                    </div>

                </div>

                <!-- Pagination -->
                <div class="mt-12 pagination-container">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <nav class="flex items-center justify-between">
                            <!-- Mobile Pagination -->
                            <div class="flex-1 flex justify-between sm:hidden">
                                <button id="prev-page-mobile" class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                                    Previous
                                </button>
                                <button id="next-page-mobile" class="ml-3 relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                                    Next
                                </button>
                            </div>
                            
                            <!-- Desktop Pagination -->
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Menampilkan
                                        <span id="first-item" class="font-medium">1</span>
                                        sampai
                                        <span id="last-item" class="font-medium">10</span>
                                        dari
                                        <span id="total-items" class="font-medium">127</span>
                                        hasil
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-xl shadow-sm -space-x-px" aria-label="Pagination" id="pagination-links">
                                    </nav>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const categoryFilter = document.getElementById('category-filter');
        const sortFilter = document.getElementById('sort-filter');
        const pengumumanContainer = document.querySelector('.pengumuman-list');
        const noResultMessage = document.querySelector('.no-results-message');
        const paginationContainer = document.querySelector('.pagination-container');

        let allPengumumanItems = [];
        const itemsPerPage = 3;
        let currentPage = 1;

        // Inisialisasi data dari DOM saat halaman dimuat
        function initPengumumanData() {
            const initialItems = pengumumanContainer.querySelectorAll('.pengumuman-item');
            allPengumumanItems = Array.from(initialItems).map(item => {
                const judul = item.querySelector('.pengumuman-judul').textContent.trim();
                const kategori = item.getAttribute('data-kategori') || '';
                const tanggal = item.getAttribute('data-tanggal') || '';
                
                return {
                    element: item,
                    judul: judul,
                    kategori: kategori,
                    tanggal: new Date(tanggal),
                    displayText: judul.toLowerCase(),
                };
            });
        }
        
        // Fungsi utama untuk filter, sorting, dan paginasi
        function updateDisplay() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const selectedCategory = categoryFilter.value;
            const sortOrder = sortFilter.value;

            // 1. Filter
            let filteredItems = allPengumumanItems.filter(item => {
                const matchesSearch = item.displayText.includes(searchTerm);
                const matchesCategory = selectedCategory === '' || item.kategori === selectedCategory;
                return matchesSearch && matchesCategory;
            });

            // 2. Sort
            filteredItems.sort((a, b) => {
                switch(sortOrder) {
                    case 'terbaru':
                        return b.tanggal - a.tanggal;
                    case 'terlama':
                        return a.tanggal - b.tanggal;
                    case 'a-z':
                        return a.judul.localeCompare(b.judul);
                    case 'z-a':
                        return b.judul.localeCompare(a.judul);
                    default:
                        return 0;
                }
            });

            // 3. Display
            displayResults(filteredItems);
            // 4. Update Pagination
            updatePagination(filteredItems.length);
        }

        // Tampilkan hasil yang sudah difilter dan diurutkan
        function displayResults(items) {
            // Sembunyikan semua item di DOM terlebih dahulu
            allPengumumanItems.forEach(item => {
                item.element.style.display = 'none';
            });
            
            // Tampilkan item untuk halaman saat ini
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, items.length);
            
            for (let i = startIndex; i < endIndex; i++) {
                items[i].element.style.display = '';
            }
            
            // Tampilkan/sembunyikan pesan "tidak ditemukan"
            if (items.length === 0) {
                noResultMessage.style.display = 'block';
            } else {
                noResultMessage.style.display = 'none';
            }
        }
        
        // Update tampilan pagination
        function updatePagination(totalItems) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const paginationLinks = document.getElementById('pagination-links');
            
            // Bersihkan pagination sebelumnya
            if (paginationLinks) {
                paginationLinks.innerHTML = '';
            }

            // Update info total items
            document.getElementById('total-items').textContent = totalItems;
            document.getElementById('first-item').textContent = (totalItems > 0) ? (currentPage - 1) * itemsPerPage + 1 : 0;
            document.getElementById('last-item').textContent = Math.min(currentPage * itemsPerPage, totalItems);

            if (totalPages <= 1) {
                paginationContainer.style.display = 'none';
                return;
            } else {
                paginationContainer.style.display = 'block';
            }

            // Buat tombol navigasi Previous
            const prevButton = document.createElement('button');
            prevButton.className = 'relative inline-flex items-center px-3 py-2 rounded-l-xl border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors';
            prevButton.innerHTML = `<span class="sr-only">Previous</span><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>`;
            prevButton.disabled = currentPage === 1;
            if (prevButton.disabled) {
                prevButton.className = 'relative inline-flex items-center px-3 py-2 rounded-l-xl border border-gray-300 bg-gray-50 text-sm font-medium text-gray-300 cursor-not-allowed';
            }
            prevButton.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateDisplay();
                }
            };
            paginationLinks.appendChild(prevButton);

            // Buat tautan halaman
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.className = `relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors ${
                    i === currentPage 
                        ? 'z-10 bg-blue-50 border-blue-500 text-blue-600' 
                        : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                }`;
                pageButton.onclick = () => {
                    currentPage = i;
                    updateDisplay();
                };
                paginationLinks.appendChild(pageButton);
            }
            
            // Buat tombol navigasi Next
            const nextButton = document.createElement('button');
            nextButton.className = 'relative inline-flex items-center px-3 py-2 rounded-r-xl border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors';
            nextButton.innerHTML = `<span class="sr-only">Next</span><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>`;
            nextButton.disabled = currentPage === totalPages;
            if (nextButton.disabled) {
                nextButton.className = 'relative inline-flex items-center px-3 py-2 rounded-r-xl border border-gray-300 bg-gray-50 text-sm font-medium text-gray-300 cursor-not-allowed';
            }
            nextButton.onclick = () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateDisplay();
                }
            };
            paginationLinks.appendChild(nextButton);
        }

        // Event Listeners
        searchInput.addEventListener('input', () => {
            currentPage = 1; 
            updateDisplay();
        });
        
        categoryFilter.addEventListener('change', () => {
            currentPage = 1; 
            updateDisplay();
        });
        
        sortFilter.addEventListener('change', () => {
            currentPage = 1; 
            updateDisplay();
        });

        // Mobile pagination event listeners
        const prevMobile = document.getElementById('prev-page-mobile');
        const nextMobile = document.getElementById('next-page-mobile');
        
        if (prevMobile) {
            prevMobile.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateDisplay();
                }
            });
        }
        
        if (nextMobile) {
            nextMobile.addEventListener('click', () => {
                const totalItems = allPengumumanItems.filter(item => {
                    const searchTerm = searchInput.value.toLowerCase().trim();
                    const selectedCategory = categoryFilter.value;
                    const matchesSearch = item.displayText.includes(searchTerm);
                    const matchesCategory = selectedCategory === '' || item.kategori === selectedCategory;
                    return matchesSearch && matchesCategory;
                }).length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                
                if (currentPage < totalPages) {
                    currentPage++;
                    updateDisplay();
                }
            });
        }

        // Inisialisasi awal
        initPengumumanData();
        updateDisplay();
    });
</script>
@endpush