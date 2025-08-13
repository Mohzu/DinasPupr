@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dinas PUPR Kabupaten Garut')
@section('description', 'Struktur Organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gray-50">
  <!-- Hero Section - TIDAK DIUBAH -->
  <section class="relative overflow-hidden mb-8 shadow-2xl mt-20 h-[70vh] min-h-[500px]">
    <div class="absolute inset-0">
      <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Background PUPR Garut" class="w-full h-full object-cover object-center">
      <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70"></div>
      <div class="absolute inset-0 bg-black/20"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
      <div class="max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-white bg-opacity-95 backdrop-blur-md rounded-full px-4 py-2 text-gray-800 text-sm font-semibold mb-6 border border-white border-opacity-50 shadow-lg">
          <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16z"/></svg>
          Profil Instansi
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4">
          Struktur
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300">Organisasi</span>
        </h1>
        <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
          <p class="text-lg md:text-xl text-white font-semibold">
            Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content - ENHANCED -->
  <section class="container mx-auto px-6 pb-16 -mt-8 relative z-10">
    <!-- Enhanced Structure Chart Section -->
    <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20 mb-12 mt-16">
      <div class="text-center mb-8">
        <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
          Bagan Organisasi
        </div>
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Struktur Organisasi</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Hierarki dan susunan organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut</p>
      </div>

      <!-- Interactive Structure Chart -->
      <div class="relative group">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/10 via-purple-400/10 to-emerald-400/10 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
        <div class="rounded-lg border bg-white/90 backdrop-blur p-3 shadow hover:shadow-lg transition-all duration-300">
          <div class="aspect-[20/9] w-full rounded-md border overflow-hidden bg-white relative group">
            <img src="{{ asset('img/strukturorganisasi.png') }}" alt="Struktur Organisasi" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-102" onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';">
            <div class="w-full h-full place-content-center text-gray-400 hidden">
              <div class="text-center">
                <div class="bg-gray-100 rounded-full p-3 w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                  <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
                  </svg>
                </div>
                <p class="text-base font-medium text-gray-600">Gambar struktur belum tersedia</p>
                <p class="text-xs text-gray-400 mt-1">Mohon tunggu proses upload gambar</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Enhanced Leadership Section -->
    <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20">
      <div class="text-center mb-10">
        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
          Tim Kepemimpinan
        </div>
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Pejabat Struktural</h2>
      </div>

      @if($leaders->count() > 0)
      <div class="relative">
        <!-- Navigation Buttons -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 z-20">
          <button id="leaders-prev" class="bg-white hover:bg-gray-50 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 border border-gray-200 group">
            <svg class="w-6 h-6 text-gray-600 group-hover:text-gray-900 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
        </div>

        <div class="absolute right-0 top-1/2 -translate-y-1/2 z-20">
          <button id="leaders-next" class="bg-white hover:bg-gray-50 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 border border-gray-200 group">
            <svg class="w-6 h-6 text-gray-600 group-hover:text-gray-900 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        <!-- Leaders Scroll Container -->
        <div id="leaders-scroll" class="overflow-x-auto no-scrollbar scroll-smooth px-6">
          <div class="flex gap-4 py-3">
            @foreach ($leaders as $index => $person)
            <div class="leader-card bg-white rounded-xl shadow hover:shadow-lg transition-all duration-300 overflow-hidden text-center border border-gray-100 w-52 flex-shrink-0 group">
              <!-- Photo Section -->
              <div class="h-52 w-full bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center overflow-hidden relative">
                @if ($person->foto_url)
                  <img src="{{ $person->foto_url }}" alt="{{ $person->nama }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                @else
                  <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-full p-4">
                    <svg class="h-12 w-12 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4
                        -4 1.79-4 4 1.79 4 4 4zm0 2
                        c-3.31 0-6 2.69-6 6h12
                        c0-3.31-2.69-6-6-6z"/>
                    </svg>
                  </div>
                @endif
              </div>
              
              <!-- Info Section -->
              <div class="p-4">
                <h3 class="font-semibold text-base text-gray-900 mb-2 leading-tight line-clamp-2">{{ $person->nama }}</h3>
                <p class="text-sm text-gray-600 bg-gray-50 rounded-full px-3 py-1 inline-block line-clamp-2">{{ $person->jabatan }}</p>
                
                <!-- Simplified Contact Info -->
                @if(isset($person->email))
                <div class="mt-3 text-xs text-gray-500 truncate">
                  {{ $person->email }}
                </div>
                @endif
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Scroll Indicators -->
        <div class="flex justify-center mt-8 space-x-2" id="scroll-indicators">
          <!-- Dynamically generated by JavaScript -->
        </div>
      </div>
      @else
        <div class="text-center py-16">
          <div class="bg-gray-100 rounded-full p-8 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data</h3>
          <p class="text-gray-500">Data pejabat struktural sedang dalam proses pemutakhiran.</p>
        </div>
      @endif
    </div>
  </section>
</div>
@endsection

@push('styles')
<style>
  .no-scrollbar::-webkit-scrollbar { display: none; }
  .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  
  /* Smooth animations */
  .leader-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  .leader-card:hover {
    transform: translateY(-3px);
  }
  
  /* Add line clamp utility */
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  /* Scroll indicator styles */
  .scroll-indicator {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #d1d5db;
    transition: all 0.3s ease;
    cursor: pointer;
  }
  
  .scroll-indicator.active {
    background: #3b82f6;
    transform: scale(1.2);
  }
  
  /* Stats cards animation */
  @keyframes slideInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .stats-card {
    animation: slideInUp 0.6s ease-out forwards;
  }
  
  .stats-card:nth-child(1) { animation-delay: 0.1s; }
  .stats-card:nth-child(2) { animation-delay: 0.2s; }
  .stats-card:nth-child(3) { animation-delay: 0.3s; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector('#leaders-scroll');
  const prevBtn = document.getElementById('leaders-prev');
  const nextBtn = document.getElementById('leaders-next');
  const indicatorsContainer = document.getElementById('scroll-indicators');
  
  if (!container || !prevBtn || !nextBtn) return;

  const step = 220; // Width of one card plus gap
  const totalCards = {{ $leaders->count() ?? 0 }};
  const visibleCards = Math.floor(container.clientWidth / step);
  const totalPages = Math.max(1, Math.ceil(totalCards / visibleCards));
  let currentPage = 0;

  // Create scroll indicators
  function createIndicators() {
    if (totalPages <= 1) return;
    
    indicatorsContainer.innerHTML = '';
    for (let i = 0; i < totalPages; i++) {
      const indicator = document.createElement('div');
      indicator.className = `scroll-indicator ${i === 0 ? 'active' : ''}`;
      indicator.addEventListener('click', () => goToPage(i));
      indicatorsContainer.appendChild(indicator);
    }
  }

  // Update indicators
  function updateIndicators() {
    const indicators = indicatorsContainer.querySelectorAll('.scroll-indicator');
    indicators.forEach((indicator, index) => {
      indicator.classList.toggle('active', index === currentPage);
    });
  }

  // Go to specific page
  function goToPage(page) {
    currentPage = Math.max(0, Math.min(page, totalPages - 1));
    const scrollLeft = currentPage * step * visibleCards;
    container.scrollTo({ left: scrollLeft, behavior: 'smooth' });
    updateIndicators();
  }

  // Navigation functions
  function goNext() {
    if (currentPage < totalPages - 1) {
      goToPage(currentPage + 1);
    }
  }

  function goPrev() {
    if (currentPage > 0) {
      goToPage(currentPage - 1);
    }
  }

  // Event listeners
  prevBtn.addEventListener('click', goPrev);
  nextBtn.addEventListener('click', goNext);

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') goPrev();
    if (e.key === 'ArrowRight') goNext();
  });

  // Touch/swipe support
  let startX = null;
  container.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
  });

  container.addEventListener('touchend', (e) => {
    if (startX === null) return;
    const endX = e.changedTouches[0].clientX;
    const diff = startX - endX;
    
    if (Math.abs(diff) > 50) { // Minimum swipe distance
      if (diff > 0) goNext();
      else goPrev();
    }
    startX = null;
  });

  // Auto-play (optional)
  let autoPlayInterval;
  
  function startAutoPlay() {
    autoPlayInterval = setInterval(() => {
      if (currentPage < totalPages - 1) {
        goNext();
      } else {
        goToPage(0); // Loop back to start
      }
    }, 5000); // Change slide every 5 seconds
  }

  function stopAutoPlay() {
    clearInterval(autoPlayInterval);
  }

  // Pause auto-play on hover
  container.addEventListener('mouseenter', stopAutoPlay);
  container.addEventListener('mouseleave', startAutoPlay);

  // Initialize
  createIndicators();
  // startAutoPlay(); // Uncomment to enable auto-play

  // Responsive handling
  window.addEventListener('resize', () => {
    const newVisibleCards = Math.floor(container.clientWidth / step);
    if (newVisibleCards !== visibleCards) {
      location.reload(); // Simple solution for responsive changes
    }
  });

  // Smooth scroll behavior enhancement
  container.style.scrollBehavior = 'smooth';
  
  // Add loading animation for cards
  const cards = document.querySelectorAll('.leader-card');
  cards.forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
      card.style.transition = 'all 0.6s ease';
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    }, index * 100);
  });
});

// Add stats counter animation
function animateStats() {
  const statsNumbers = document.querySelectorAll('.stats-card h3');
  
  statsNumbers.forEach(stat => {
    const target = parseInt(stat.textContent);
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(timer);
      }
      stat.textContent = Math.floor(current);
    }, 30);
  });
}

// Trigger stats animation when page loads
window.addEventListener('load', () => {
  setTimeout(animateStats, 500);
});
</script>
@endpush