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
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6">
        <!-- Search Section -->
        <section class="py-8">
            <div class="max-w-7xl mx-auto mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                        <div class="relative flex-1 max-w-md">
                            <input id="search-input" type="text" placeholder="Cari berita..." class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center">
                            <label for="sort-filter" class="text-sm text-gray-600">Urutkan:</label>
                            <select id="sort-filter" class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                <option value="terbaru">Terbaru</option>
                                <option value="terlama">Terlama</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured News Section -->
        <div class="max-w-7xl mx-auto mb-16">
            <div class="text-center mb-8">
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

        <!-- All News Grid (Dynamic) -->
        <div class="max-w-7xl mx-auto mb-16">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-black text-gray-800 mb-4 md:mb-0">Semua Berita</h2>
            </div>

            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @forelse ($beritas as $berita)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="relative">
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                                @else
                                    <img src="https://via.placeholder.com/400x240/3B82F6/FFFFFF?text=Berita" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-sm text-gray-500">{{ optional($berita->published_at ?? $berita->created_at)->translatedFormat('d M Y') }}</span>
                                    @if ($berita->kategori)
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-bold">{{ strtoupper($berita->kategori) }}</span>
                                    @endif
                                </div>
                                <h3 class="font-bold text-gray-800 text-xl mb-3 hover:text-blue-600">
                                    <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}">{{ $berita->judul }}</a>
                                </h3>
                                <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-3 text-center text-gray-500">Belum ada berita.</div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $beritas->onEachSide(1)->links() }}
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
    // Search functionality
    const searchInput = document.querySelector('#search-input');
    const sortFilter = document.querySelector('#sort-filter');
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
    
    if (sortFilter) {
        sortFilter.addEventListener('change', function() {
            console.log('Mengurutkan berdasarkan:', this.value);
            // Implementasi sorting akan ditambahkan di sini
        });
    }
    
    function performSearch(query) {
        if (query.trim()) {
            console.log('Melakukan pencarian untuk:', query);
            // Implementasi pencarian aktual akan ditambahkan di sini
            // Misalnya: window.location.href = `/search?q=${encodeURIComponent(query)}`;
        }
    }
    
    // Smooth scroll for pagination
    const paginationButtons = document.querySelectorAll('nav button');
    paginationButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (!this.disabled) {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    });
    
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