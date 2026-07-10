@extends('layouts.app')

@section('title', 'Berita Terkini - Dinas PUPR Kabupaten Garut')
@section('description', 'Berita terkini dan informasi terbaru dari Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section with Background Image -->
    <div class="relative overflow-hidden mb-8 shadow-2xl h-[70vh] min-h-[500px]">
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
                        Update: {{ \Carbon\Carbon::parse($lastUpdate)->translatedFormat('d F Y') }}
                    </div>

                    <div class="bg-white/90 backdrop-blur-md rounded-2xl px-6 py-3 text-gray-800 font-semibold border border-white/50 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $totalBerita }} Berita Baru
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6">
        <!-- Search & Filter -->
        <section class="py-8">
            <div class="max-w-7xl mx-auto mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <form method="GET" action="{{ route('berita') }}">
                        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                            <!-- Search -->
                            <div class="relative flex-1 max-w-md">
                                <input 
                                    type="text" 
                                    name="q" 
                                    id="search-input"
                                    value="{{ request('q') }}" 
                                    placeholder="Cari berita..." 
                                    class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Filter -->
                            <div class="flex gap-3 items-center">
                                <label for="sort" class="text-sm text-gray-600">Urutkan:</label>
                                <select 
                                    id="sort" 
                                    name="sort" 
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Featured News Section -->
        <div class="max-w-7xl mx-auto mb-16">   
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Main Featured Article (Dynamic) -->
                <article class="bg-white rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 flex flex-col h-full">
                    @if(isset($featured))
                    <div class="relative bg-gray-900 border-b border-gray-100 flex items-center justify-center h-72 lg:h-[420px] overflow-hidden group">
                        @if ($featured->gambar)
                            <!-- Blurred Background -->
                            <div class="absolute inset-0 bg-cover bg-center blur-xl scale-110 opacity-60 transition-transform duration-700 group-hover:scale-125" 
                                 style="background-image: url('{{ asset('storage/' . $featured->gambar) }}')"></div>
                            <!-- Main Image -->
                            <img src="{{ asset('storage/' . $featured->gambar) }}" alt="{{ $featured->judul }}" class="relative w-full h-full object-contain z-10 transition-transform duration-700 group-hover:scale-105">
                        @else
                            <img src="https://via.placeholder.com/600x350/4F46E5/FFFFFF?text=Berita+Utama" alt="{{ $featured->judul }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent z-20"></div>
                        
                        <!-- Meta Info -->
                        <div class="absolute bottom-6 left-6 right-6 z-30">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="bg-white/20 backdrop-blur-md text-white px-3 py-1 rounded-full text-sm font-medium border border-white/20">
                                    {{ optional($featured->published_at ?? $featured->created_at)->translatedFormat('d M Y') }}
                                </span>
                                @if ($featured->kategori)
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                    {{ strtoupper($featured->kategori) }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8 flex-1 flex flex-col">
                        <h3 class="text-2xl font-black text-gray-800 mb-4 leading-tight">
                            {{ $featured->judul }}
                        </h3>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6 line-clamp-3">
                            {{ Str::limit(strip_tags($featured->isi), 180) }}
                        </p>
                        
                        <div class="mt-auto flex items-center justify-between pt-6 border-t border-gray-100">
                            <a href="{{ route('berita.show', $featured->slug ?? $featured->id) }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition-colors duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endif
                </article>

                <!-- Recent News Sidebar (Dynamic) -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <div class="w-1 h-8 bg-amber-600 rounded-full"></div>
                        Berita <span class="text-amber-500">Terbaru</span>
                    </h3>
                    
                    <!-- Recent News Items -->
                    @if(isset($recent) && $recent->isNotEmpty())
                        @foreach($recent as $item)
                        <article class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-all duration-300 group border border-gray-100/50">
                            <div class="flex gap-4">
                                <a href="{{ route('berita.show', $item->slug ?? $item->id) }}" class="block flex-shrink-0 overflow-hidden rounded-xl">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                    @else
                                        <img src="https://via.placeholder.com/120x80/10B981/FFFFFF?text=Berita" alt="{{ $item->judul }}" class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                    @endif
                                </a>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1.5">
                                        <span class="text-xs font-medium text-gray-400">{{ optional($item->published_at ?? $item->created_at)->translatedFormat('d M Y') }}</span>
                                        @if ($item->kategori)
                                        <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider">{{ $item->kategori }}</span>
                                        @endif
                                    </div>
                                    <h4 class="font-bold text-gray-800 text-base mb-1 hover:text-blue-600 transition-colors line-clamp-2">
                                        <a href="{{ route('berita.show', $item->slug ?? $item->id) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- All News Grid (Dynamic) -->
        <div class="max-w-7xl mx-auto mb-16">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-0">
                    Semua <span class="text-amber-500">Berita</span>
                </h2>
            </div>

            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12 berita-list">
                    @forelse ($beritas as $berita)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 berita-item flex flex-col h-full border border-gray-100" data-tanggal="{{ $berita->published_at ?? $berita->created_at }}">
                            <div class="relative w-full h-56 bg-gray-900 overflow-hidden group">
                                @if ($berita->gambar)
                                    <!-- Blurred Background -->
                                    <div class="absolute inset-0 bg-cover bg-center blur-md scale-110 opacity-50 transition-transform duration-700 group-hover:scale-125" 
                                         style="background-image: url('{{ asset('storage/' . $berita->gambar) }}')"></div>
                                    <!-- Main Image -->
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="relative w-full h-full object-contain z-10 transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <img src="https://via.placeholder.com/400x240/3B82F6/FFFFFF?text=Berita" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @endif
                            </div>
                            
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs font-medium text-gray-500 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ optional($berita->published_at ?? $berita->created_at)->translatedFormat('d M Y') }}
                                    </span>
                                    @if ($berita->kategori)
                                        <span class="bg-blue-50 text-blue-600 px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider">{{ $berita->kategori }}</span>
                                    @endif
                                </div>
                                
                                <h3 class="font-bold text-gray-900 text-xl mb-3 hover:text-blue-600 transition-colors leading-snug line-clamp-2 berita-judul">
                                    <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}">{{ $berita->judul }}</a>
                                </h3>
                                
                                <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-1">
                                    {{ Str::limit(strip_tags($berita->isi), 120) }}
                                </p>
                                
                                <div class="mt-auto pt-4 border-t border-gray-100">
                                    <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold text-sm group-hover:gap-3 transition-all">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <p class="text-lg text-gray-500 font-medium">Belum ada berita tersimpan.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Custom Pagination -->
                <div class="pagination-container mt-12">
                    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-xl shadow-sm">
                        <div class="flex flex-1 justify-between sm:hidden">
                            <button id="mobile-prev" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Previous
                            </button>
                            <button id="mobile-next" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Next
                            </button>
                        </div>
                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium" id="first-item">1</span>
                                    to
                                    <span class="font-medium" id="last-item">6</span>
                                    of
                                    <span class="font-medium" id="total-items">0</span>
                                    results
                                </p>
                            </div>
                            <div>
                                <nav class="isolate inline-flex -space-x-px rounded-xl shadow-sm" id="pagination-links" aria-label="Pagination">
                                    <!-- Pagination buttons will be inserted here by JavaScript -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
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
    const searchInput = document.querySelector('input[name="q"]');
    const sortFilter = document.querySelector('select[name="sort"]');
    const beritaContainer = document.querySelector('.berita-list');
    const paginationContainer = document.querySelector('.pagination-container');

    let allBeritaItems = [];
    const itemsPerPage = 6;
    let currentPage = 1;

    function initBeritaData() {
        const initialItems = beritaContainer.querySelectorAll('.berita-item');
        allBeritaItems = Array.from(initialItems).map(item => {
            const judul = item.querySelector('.berita-judul').textContent.trim();
            const tanggalAttr = item.getAttribute('data-tanggal') || '';
            const tanggal = tanggalAttr ? new Date(tanggalAttr.replace(' ', 'T')) : new Date(0);
            return { element: item, judul, tanggal, displayText: judul.toLowerCase() };
        });
    }

    function updateDisplay() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const sortOrder = sortFilter ? sortFilter.value : 'terbaru';

        let filteredItems = allBeritaItems.filter(item => item.displayText.includes(searchTerm));

        filteredItems.sort((a, b) => {
            if (sortOrder === 'terbaru') return b.tanggal - a.tanggal;
            if (sortOrder === 'terlama') return a.tanggal - b.tanggal;
            return 0;
        });

        displayResults(filteredItems);
        updatePagination(filteredItems.length);
    }

    function displayResults(items) {
        allBeritaItems.forEach(item => { item.element.style.display = 'none'; });
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, items.length);
        for (let i = startIndex; i < endIndex; i++) items[i].element.style.display = '';
    }

    function updatePagination(totalItems) {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const paginationLinks = document.getElementById('pagination-links');
        if (paginationLinks) paginationLinks.innerHTML = '';

        const totalItemsEl = document.getElementById('total-items');
        if (totalItemsEl) totalItemsEl.textContent = totalItems;
        const firstItemEl = document.getElementById('first-item');
        const lastItemEl = document.getElementById('last-item');
        if (firstItemEl) firstItemEl.textContent = (totalItems > 0) ? (currentPage - 1) * itemsPerPage + 1 : 0;
        if (lastItemEl) lastItemEl.textContent = Math.min(currentPage * itemsPerPage, totalItems);

        if (totalPages <= 1) { 
            paginationContainer?.classList.add('hidden'); 
            return; 
        }
        paginationContainer?.classList.remove('hidden');

        const prevButton = document.createElement('button');
        prevButton.className = 'relative inline-flex items-center px-3 py-2 rounded-l-xl border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors';
        prevButton.innerHTML = `<span class="sr-only">Previous</span><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>`;
        prevButton.disabled = currentPage === 1;
        if (prevButton.disabled) prevButton.className = 'relative inline-flex items-center px-3 py-2 rounded-l-xl border border-gray-300 bg-gray-50 text-sm font-medium text-gray-300 cursor-not-allowed';
        prevButton.onclick = () => { if (currentPage > 1) { currentPage--; updateDisplay(); } };
        paginationLinks.appendChild(prevButton);

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.textContent = i;
            pageButton.className = `relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors ${i === currentPage ? 'z-10 bg-blue-50 border-blue-500 text-blue-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'}`;
            pageButton.onclick = () => { currentPage = i; updateDisplay(); };
            paginationLinks.appendChild(pageButton);
        }

        const nextButton = document.createElement('button');
        nextButton.className = 'relative inline-flex items-center px-3 py-2 rounded-r-xl border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors';
        nextButton.innerHTML = `<span class="sr-only">Next</span><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>`;
        nextButton.disabled = currentPage === totalPages;
        if (nextButton.disabled) nextButton.className = 'relative inline-flex items-center px-3 py-2 rounded-r-xl border border-gray-300 bg-gray-50 text-sm font-medium text-gray-300 cursor-not-allowed';
        nextButton.onclick = () => { if (currentPage < totalPages) { currentPage++; updateDisplay(); } };
        paginationLinks.appendChild(nextButton);

        // Mobile pagination
        const mobilePrev = document.getElementById('mobile-prev');
        const mobileNext = document.getElementById('mobile-next');
        if (mobilePrev) {
            mobilePrev.disabled = currentPage === 1;
            mobilePrev.onclick = () => { if (currentPage > 1) { currentPage--; updateDisplay(); } };
        }
        if (mobileNext) {
            mobileNext.disabled = currentPage === totalPages;
            mobileNext.onclick = () => { if (currentPage < totalPages) { currentPage++; updateDisplay(); } };
        }
    }

    searchInput?.addEventListener('input', () => { currentPage = 1; updateDisplay(); });
    sortFilter?.addEventListener('change', () => { currentPage = 1; updateDisplay(); });

    // Initialize
    initBeritaData();
    updateDisplay();
    
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
            this.closest('.bg-white').classList.add('ring-4', 'ring-blue-500', 'ring-opacity-20');
        });
        
        searchInput.addEventListener('blur', function() {
            this.closest('.bg-white').classList.remove('ring-4', 'ring-blue-500', 'ring-opacity-20');
        });
    }
});
</script>
@endpush