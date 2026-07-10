@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dinas PUPR Kabupaten Garut')
@section('description', 'Struktur Organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen bg-gray-50">
  
  <!-- Hero Section -->
  <section class="relative overflow-hidden mb-8 shadow-2xl h-[70vh] min-h-[500px]">
    <div class="absolute inset-0">
      <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Background PUPR Garut" class="w-full h-full object-cover object-center">
      <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70"></div>
      <div class="absolute inset-0 bg-black/20"></div>
    </div>
    
    <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
      <div class="max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-white rounded-full px-4 py-2 text-gray-800 text-sm font-semibold mb-6 border border-gray-200 shadow-lg">
          <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a8 8 0 100 16 8 8 0 000-16z"/>
          </svg>
          Profil Instansi
        </div>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4">
          Struktur
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300">Organisasi</span>
        </h1>
        
        <div class="inline-block bg-black/50 rounded-2xl px-6 py-3 mb-2">
          <p class="text-lg md:text-xl text-white font-semibold">
            Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <section class="container mx-auto px-4 sm:px-6 pb-16 -mt-8 relative z-10">
    
    <!-- Structure Chart Section -->
    @if($struktur)
    <div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-xl border border-gray-150 mb-8 sm:mb-12 mt-12 sm:mt-16">
      <div class="text-center mb-6 sm:mb-8">
        <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
          <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
          Bagan Organisasi
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">{{ $struktur->title }}</h2>
      </div>

      @if($struktur->gambar)
      <div class="relative group mb-6 sm:mb-8">
        <div class="rounded-lg border bg-white p-2 sm:p-3 shadow hover:shadow-lg transition-all duration-300 overflow-x-auto">
          <div class="min-w-[600px] sm:min-w-[800px] md:min-w-0 md:w-full aspect-[20/9] rounded-md border overflow-hidden bg-white relative">
            <img src="{{ Storage::disk('public')->url($struktur->gambar) }}" alt="{{ $struktur->title }}" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-102" loading="lazy">
          </div>
        </div>
      </div>
      @endif

      @if($struktur->content)
      <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700">
        {!! $struktur->content !!}
      </div>
      @endif
    </div>
    @else
    <div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-xl border border-gray-150 mb-8 sm:mb-12 mt-12 sm:mt-16">
      <div class="text-center mb-6 sm:mb-8">
        <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-semibold mb-3 sm:mb-4">
          <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
          Bagan Organisasi
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Struktur Organisasi</h2>
      </div>
      <div class="text-center p-6 sm:p-8">
        <p class="text-gray-600">Konten struktur organisasi sedang dalam proses persiapan. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
      </div>
    </div>
    @endif

    <!-- Leadership Section -->
    <div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-xl border border-gray-150">
      <div class="text-center mb-8 sm:mb-10">
        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
          Tim Kepemimpinan
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Pejabat Struktural</h2>
      </div>

      @if($leaders->count() > 0)
      <div class="relative">
        
        <!-- Navigation Buttons -->
        <button id="leaders-prev" class="absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-white hover:bg-gray-50 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 group disabled:opacity-50 disabled:cursor-not-allowed">
          <svg class="w-6 h-6 text-gray-600 group-hover:text-gray-900 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <button id="leaders-next" class="absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-white hover:bg-gray-50 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 group disabled:opacity-50 disabled:cursor-not-allowed">
          <svg class="w-6 h-6 text-gray-600 group-hover:text-gray-900 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>

        <!-- Leaders Cards Container -->
        <div id="leaders-scroll" class="overflow-x-auto no-scrollbar scroll-smooth px-12 sm:px-14 pb-6">
          <div class="flex gap-5 py-4">
            @foreach ($leaders as $index => $person)
            <div class="leader-card bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex-shrink-0 group" style="width: 250px;">
              
              <!-- Photo -->
              <div class="h-72 w-full bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center overflow-hidden relative">
                @if ($person->foto_url)
                  <img 
                    src="{{ $person->foto_url }}" 
                    alt="{{ $person->nama }}" 
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                  >
                @else
                  <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-full p-6">
                    <svg class="h-16 w-16 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                  </div>
                @endif
              </div>
              
              <!-- Info -->
              <div class="p-5 text-center">
                <h3 class="font-bold text-base text-gray-900 mb-3 leading-snug" style="min-height: 2.8rem; display: flex; align-items: center; justify-content: center;">
                  {{ $person->nama }}
                </h3>
                
                <div class="text-sm text-gray-700 bg-gray-50 rounded-lg px-4 py-3 leading-relaxed" style="min-height: 5rem; display: flex; align-items: center; justify-content: center;">
                  {{ $person->jabatan }}
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Scroll Indicators -->
        <div class="flex justify-center mt-6 gap-2" id="scroll-indicators"></div>
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
/* Hide Scrollbar */
.no-scrollbar::-webkit-scrollbar { 
  display: none; 
}
.no-scrollbar { 
  -ms-overflow-style: none; 
  scrollbar-width: none; 
}

/* Smooth Scroll */
#leaders-scroll {
  scroll-behavior: smooth;
  scroll-snap-type: x mandatory;
}

.leader-card {
  scroll-snap-align: start;
}

/* Card Hover Animation */
.leader-card {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.leader-card:hover {
  transform: translateY(-4px);
}

/* Scroll Indicators */
.scroll-indicator {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #d1d5db;
  transition: all 0.3s ease;
  cursor: pointer;
}

.scroll-indicator:hover {
  background: #9ca3af;
}

.scroll-indicator.active {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  transform: scale(1.3);
  box-shadow: 0 2px 8px rgba(102, 126, 234, 0.4);
}
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

  const cardWidth = 250;
  const gap = 20;
  const step = cardWidth + gap;
  const totalCards = {{ $leaders->count() ?? 0 }};
  let currentIndex = 0;

  // Calculate visible cards
  const getVisibleCards = () => {
    const containerWidth = container.offsetWidth - 112;
    return Math.max(1, Math.floor(containerWidth / step));
  };

  let visibleCards = getVisibleCards();
  const maxIndex = Math.max(0, totalCards - visibleCards);

  // Create indicators
  function createIndicators() {
    if (totalCards <= visibleCards) return;
    
    indicatorsContainer.innerHTML = '';
    const totalDots = Math.ceil(totalCards / visibleCards);
    
    for (let i = 0; i < totalDots; i++) {
      const indicator = document.createElement('div');
      indicator.className = `scroll-indicator ${i === 0 ? 'active' : ''}`;
      indicator.addEventListener('click', () => scrollToIndex(i * visibleCards));
      indicatorsContainer.appendChild(indicator);
    }
  }

  // Update buttons
  function updateButtons() {
    prevBtn.disabled = currentIndex <= 0;
    nextBtn.disabled = currentIndex >= maxIndex;
    
    prevBtn.style.opacity = currentIndex <= 0 ? '0.5' : '1';
    nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
  }

  // Update indicators
  function updateIndicators() {
    const indicators = indicatorsContainer.querySelectorAll('.scroll-indicator');
    const activeIndex = Math.floor(currentIndex / visibleCards);
    
    indicators.forEach((indicator, index) => {
      indicator.classList.toggle('active', index === activeIndex);
    });
  }

  // Scroll to index
  function scrollToIndex(index) {
    currentIndex = Math.max(0, Math.min(index, maxIndex));
    const scrollLeft = currentIndex * step;
    container.scrollTo({ left: scrollLeft, behavior: 'smooth' });
    updateButtons();
    updateIndicators();
  }

  // Navigation
  function goNext() {
    scrollToIndex(currentIndex + visibleCards);
  }

  function goPrev() {
    scrollToIndex(currentIndex - visibleCards);
  }

  // Event listeners
  prevBtn.addEventListener('click', goPrev);
  nextBtn.addEventListener('click', goNext);

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') goPrev();
    if (e.key === 'ArrowRight') goNext();
  });

  // Sync index and indicators on native scroll (momentum/swipe)
  let scrollTimeout;
  container.addEventListener('scroll', () => {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
      const scrollLeft = container.scrollLeft;
      const newIndex = Math.min(maxIndex, Math.max(0, Math.round(scrollLeft / step)));
      if (newIndex !== currentIndex) {
        currentIndex = newIndex;
        updateButtons();
        updateIndicators();
      }
    }, 100);
  });

  // Responsive
  window.addEventListener('resize', () => {
    const newVisibleCards = getVisibleCards();
    if (newVisibleCards !== visibleCards) {
      visibleCards = newVisibleCards;
      currentIndex = 0;
      createIndicators();
      updateButtons();
      scrollToIndex(0);
    }
  });

  // Initialize
  createIndicators();
  updateButtons();

  // Entrance animation
  const cards = document.querySelectorAll('.leader-card');
  cards.forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    }, index * 80);
  });
});
</script>
@endpush