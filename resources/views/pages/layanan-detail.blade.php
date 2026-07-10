@extends('layouts.app')

@section('title', $layanan->nama_layanan . ' - Dinas PUPR Kabupaten Garut')
@section('description', $layanan->deskripsi_singkat)

@section('content')
<div class="min-h-screen bg-gray-50">

  {{-- ============ HERO SECTION ============ --}}
  <section class="relative overflow-hidden shadow-2xl h-[60vh] min-h-[420px]">
    {{-- Animated Gradient Background --}}
    <div class="absolute inset-0 hero-gradient" style="--accent: {{ $layanan->warna }};"></div>

    {{-- Dot Pattern --}}
    <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 50px 50px;"></div>

    {{-- Floating Blobs --}}
    <div class="absolute inset-0 z-0 overflow-hidden">
      <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full opacity-20 animate-blob" style="background: {{ $layanan->warna }};"></div>
      <div class="absolute -bottom-32 -right-20 w-96 h-96 rounded-full opacity-10 animate-blob animation-delay-2000" style="background: {{ $layanan->warna }};"></div>
      <div class="absolute top-1/2 left-1/3 w-48 h-48 rounded-full opacity-10 animate-blob animation-delay-4000" style="background: white;"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
      <div class="max-w-4xl mx-auto space-y-6">
        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-md rounded-full px-5 py-2.5 text-gray-800 text-sm font-semibold shadow-lg border border-white/50 hero-fade-in">
          <div class="w-2 h-2 rounded-full animate-pulse" style="background: {{ $layanan->warna }};"></div>
          Pelayanan Publik PUPR
        </div>

        {{-- Icon --}}
        <div class="flex justify-center hero-fade-in animation-delay-200">
          <div class="w-24 h-24 rounded-3xl flex items-center justify-center shadow-2xl backdrop-blur-sm border border-white/20 icon-float" style="background: {{ $layanan->warna }}30;">
            @if($layanan->ikon)
              <div class="w-12 h-12 text-white">{!! $layanan->ikon !!}</div>
            @else
              <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            @endif
          </div>
        </div>

        {{-- Title --}}
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white leading-tight drop-shadow-[4px_4px_8px_rgba(0,0,0,0.5)] hero-fade-in animation-delay-400">
          {{ $layanan->nama_layanan }}
        </h1>

        {{-- Subtitle --}}
        <div class="hero-fade-in animation-delay-600">
          <div class="inline-block bg-black/20 backdrop-blur-sm rounded-2xl px-8 py-4">
            <p class="text-lg md:text-xl text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
              {{ $layanan->deskripsi_singkat }}
            </p>
          </div>
        </div>

        {{-- Quick Nav Pills --}}
        <div class="flex flex-wrap justify-center gap-3 pt-2 hero-fade-in animation-delay-800">
          @if($layanan->penjelasan_detail)
          <a href="#tentang" class="px-4 py-2 bg-white/15 hover:bg-white/25 backdrop-blur-sm rounded-full text-white text-sm font-medium transition-all duration-300 border border-white/20 hover:border-white/40 hover:scale-105">📋 Tentang</a>
          @endif
          @if($layanan->alur)
          <a href="#alur" class="px-4 py-2 bg-white/15 hover:bg-white/25 backdrop-blur-sm rounded-full text-white text-sm font-medium transition-all duration-300 border border-white/20 hover:border-white/40 hover:scale-105">🔄 Alur</a>
          @endif
          @if($layanan->persyaratan)
          <a href="#persyaratan" class="px-4 py-2 bg-white/15 hover:bg-white/25 backdrop-blur-sm rounded-full text-white text-sm font-medium transition-all duration-300 border border-white/20 hover:border-white/40 hover:scale-105">✅ Persyaratan</a>
          @endif
          @if($layanan->file_dokumen)
          <a href="#unduh" class="px-4 py-2 bg-white/15 hover:bg-white/25 backdrop-blur-sm rounded-full text-white text-sm font-medium transition-all duration-300 border border-white/20 hover:border-white/40 hover:scale-105">📥 Unduh</a>
          @endif
        </div>
      </div>
    </div>

    {{-- Bottom Wave --}}
    <div class="absolute bottom-0 left-0 right-0 z-20">
      <svg class="w-full h-16 md:h-24" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,60 C200,20 400,0 600,30 C800,60 1000,20 1200,40 L1200,120 L0,120 Z" fill="#f9fafb"></path>
      </svg>
    </div>
  </section>

  {{-- ============ MAIN CONTENT ============ --}}
  <section class="container mx-auto px-4 sm:px-6 pb-20 relative z-20 max-w-6xl">
    <div class="space-y-10 -mt-4">

      {{-- ======== TENTANG LAYANAN ======== --}}
      @if($layanan->penjelasan_detail)
      <div id="tentang" class="scroll-mt-28 section-reveal">
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100/80 overflow-hidden hover:shadow-xl transition-shadow duration-500">
          {{-- Header --}}
          <div class="px-8 py-6 border-b border-gray-100" style="background: linear-gradient(135deg, {{ $layanan->warna }}05, {{ $layanan->warna }}10);">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-2xl flex items-center justify-center shadow-sm" style="background: {{ $layanan->warna }}15;">
                <svg class="w-6 h-6" style="color: {{ $layanan->warna }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              </div>
              <div>
                <h2 class="text-2xl font-bold text-gray-900">Tentang Layanan</h2>
                <p class="text-sm text-gray-500 mt-0.5">Informasi lengkap mengenai layanan {{ $layanan->nama_layanan }}</p>
              </div>
            </div>
          </div>
          {{-- Body --}}
          <div class="p-8">
            <div class="text-gray-700 leading-relaxed text-base sm:text-lg space-y-4">
              {!! nl2br(e($layanan->penjelasan_detail)) !!}
            </div>
          </div>
        </div>
      </div>
      @endif

      {{-- ======== ALUR + PERSYARATAN GRID ======== --}}
      <div class="grid lg:grid-cols-2 gap-8">

        {{-- ======== ALUR PELAYANAN (TIMELINE) ======== --}}
        @if($layanan->alur)
        <div id="alur" class="scroll-mt-28 section-reveal">
          <div class="bg-white rounded-3xl shadow-lg border border-gray-100/80 overflow-hidden hover:shadow-xl transition-shadow duration-500 h-full">
            <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-blue-50/80 to-indigo-50/80">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/25">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                </div>
                <div>
                  <h2 class="text-2xl font-bold text-gray-900">Alur Pelayanan</h2>
                  <p class="text-sm text-gray-500 mt-0.5">Langkah-langkah proses pengajuan</p>
                </div>
              </div>
            </div>
            <div class="p-8">
              @php
                $steps = array_values(array_filter(preg_split('/\r\n|\r|\n/', $layanan->alur), function($s) { return trim($s) !== ''; }));
                $totalSteps = count($steps);
              @endphp
              <div class="relative">
                {{-- Timeline Line --}}
                <div class="absolute left-[23px] top-3 bottom-3 w-0.5 bg-gradient-to-b from-blue-300 via-indigo-300 to-blue-200 rounded-full"></div>

                <div class="space-y-6">
                  @foreach($steps as $index => $step)
                  <div class="relative flex items-start gap-5 group timeline-item" style="animation-delay: {{ $index * 0.1 }}s;">
                    {{-- Circle --}}
                    <div class="relative z-10 flex-shrink-0 w-12 h-12 rounded-2xl flex items-center justify-center text-white text-sm font-bold shadow-lg transition-transform duration-300 group-hover:scale-110 {{ $index === $totalSteps - 1 ? 'bg-gradient-to-br from-green-500 to-emerald-600 shadow-green-500/25' : '' }}" style="{{ $index !== $totalSteps - 1 ? 'background: linear-gradient(135deg, ' . $layanan->warna . ', ' . $layanan->warna . 'dd); box-shadow: 0 4px 14px ' . $layanan->warna . '30;' : '' }}">
                      @if($index === $totalSteps - 1)
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                      @else
                        {{ $index + 1 }}
                      @endif
                    </div>
                    {{-- Text --}}
                    <div class="flex-1 pt-2.5 pb-1">
                      <p class="text-gray-700 leading-relaxed font-medium group-hover:text-gray-900 transition-colors duration-300">{{ preg_replace('/^\d+[\.\)]\s*/', '', trim($step)) }}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

        {{-- ======== PERSYARATAN ======== --}}
        @if($layanan->persyaratan)
        <div id="persyaratan" class="scroll-mt-28 section-reveal">
          <div class="bg-white rounded-3xl shadow-lg border border-gray-100/80 overflow-hidden hover:shadow-xl transition-shadow duration-500 h-full">
            <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-emerald-50/80 to-green-50/80">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-lg shadow-emerald-500/25">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                  <h2 class="text-2xl font-bold text-gray-900">Persyaratan</h2>
                  <p class="text-sm text-gray-500 mt-0.5">Dokumen yang perlu disiapkan</p>
                </div>
              </div>
            </div>
            <div class="p-8">
              <div class="space-y-4">
                @foreach(preg_split('/\r\n|\r|\n/', $layanan->persyaratan) as $index => $syarat)
                  @if(trim($syarat))
                  <div class="flex items-start gap-4 group req-item p-3 -mx-3 rounded-xl hover:bg-emerald-50/50 transition-all duration-300" style="animation-delay: {{ $index * 0.08 }}s;">
                    <div class="flex-shrink-0 w-8 h-8 rounded-xl bg-gradient-to-br from-emerald-100 to-green-100 flex items-center justify-center group-hover:from-emerald-500 group-hover:to-green-500 transition-all duration-300 shadow-sm">
                      <svg class="w-4 h-4 text-emerald-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </div>
                    <span class="text-gray-700 leading-relaxed pt-1 font-medium">{{ preg_replace('/^[-•*]\s*/', '', trim($syarat)) }}</span>
                  </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>

      {{-- ======== DOKUMEN UNDUHAN ======== --}}
      @if($layanan->file_dokumen)
      <div id="unduh" class="scroll-mt-28 section-reveal">
        <div class="relative overflow-hidden rounded-3xl shadow-xl border border-gray-100/80">
          {{-- Background gradient --}}
          <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900"></div>
          <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 50%, white 1px, transparent 1px), radial-gradient(circle at 80% 50%, white 1px, transparent 1px); background-size: 40px 40px;"></div>
          <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full opacity-10 animate-blob" style="background: {{ $layanan->warna }};"></div>

          <div class="relative z-10 p-8 md:p-12">
            <div class="flex flex-col lg:flex-row items-center gap-8">
              {{-- Left side --}}
              <div class="flex-1 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-4">
                  <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16z"/></svg>
                  <span class="text-white/80 text-sm font-medium">Dokumen Tersedia</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-white mb-3">
                  Unduh Dokumen 📥
                </h2>
                <p class="text-white/70 text-lg max-w-lg leading-relaxed">
                  Download formulir dan dokumen persyaratan yang diperlukan untuk layanan <span class="text-white font-semibold">{{ $layanan->nama_layanan }}</span>.
                </p>
              </div>

              {{-- Right side - Download Card --}}
              <div class="w-full lg:w-auto">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 p-6 min-w-[280px] hover:bg-white/15 transition-all duration-300">
                  {{-- File Icon --}}
                  <div class="flex items-center gap-4 mb-5">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg shadow-red-500/30 flex-shrink-0">
                      @php
                        $ext = pathinfo($layanan->file_dokumen, PATHINFO_EXTENSION);
                      @endphp
                      <span class="text-white font-black text-sm uppercase">{{ $ext }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                      <p class="text-white font-bold text-sm truncate">{{ basename($layanan->file_dokumen) }}</p>
                      <p class="text-white/50 text-xs mt-1">Formulir / Dokumen Persyaratan</p>
                    </div>
                  </div>

                  {{-- Download Button --}}
                  <a href="{{ asset('storage/' . $layanan->file_dokumen) }}" target="_blank" download
                     class="group flex items-center justify-center gap-3 w-full px-6 py-4 rounded-xl bg-gradient-to-r from-white to-gray-50 text-gray-900 font-bold text-base hover:shadow-2xl hover:shadow-white/20 transition-all duration-300 hover:-translate-y-0.5">
                    <svg class="w-5 h-5 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Unduh Sekarang
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      {{-- ======== BACK NAVIGATION ======== --}}
      <div class="flex justify-center pt-6">
        <a href="{{ route('home') }}#layanan-kami" class="group inline-flex items-center gap-3 px-8 py-4 bg-white rounded-2xl shadow-md hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1">
          <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:-translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          <span class="text-gray-600 group-hover:text-gray-900 font-semibold transition-colors">Kembali ke Halaman Utama</span>
        </a>
      </div>

    </div>
  </section>
</div>
@endsection

@push('styles')
<style>
  /* ===== Hero Gradient Animation ===== */
  .hero-gradient {
    background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 25%, color-mix(in srgb, var(--accent) 40%, #1e3a8a) 50%, #312e81 75%, #1e1b4b 100%);
    background-size: 400% 400%;
    animation: gradientShift 8s ease infinite;
  }

  @keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }

  /* ===== Floating Animation ===== */
  .icon-float {
    animation: iconFloat 4s ease-in-out infinite;
  }

  @keyframes iconFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
  }

  /* ===== Blob Animation ===== */
  .animate-blob {
    animation: blob 7s infinite;
  }

  .animation-delay-2000 { animation-delay: 2s; }
  .animation-delay-4000 { animation-delay: 4s; }
  .animation-delay-200 { animation-delay: 0.2s; }
  .animation-delay-400 { animation-delay: 0.4s; }
  .animation-delay-600 { animation-delay: 0.6s; }
  .animation-delay-800 { animation-delay: 0.8s; }

  @keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
  }

  /* ===== Hero Fade In ===== */
  .hero-fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: heroFadeIn 0.8s ease-out forwards;
  }

  @keyframes heroFadeIn {
    to { opacity: 1; transform: translateY(0); }
  }

  /* ===== Section Reveal ===== */
  .section-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .section-reveal.revealed {
    opacity: 1;
    transform: translateY(0);
  }

  /* ===== Timeline Items ===== */
  .timeline-item {
    opacity: 0;
    transform: translateX(-20px);
    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .timeline-item.visible {
    opacity: 1;
    transform: translateX(0);
  }

  /* ===== Requirement Items ===== */
  .req-item {
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .req-item.visible {
    opacity: 1;
    transform: translateX(0);
  }

  /* ===== Smooth Scroll ===== */
  html {
    scroll-behavior: smooth;
  }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Intersection Observer for section reveals
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');

        // Animate children (timeline + requirement items)
        const items = entry.target.querySelectorAll('.timeline-item, .req-item');
        items.forEach((item, i) => {
          setTimeout(() => {
            item.classList.add('visible');
          }, i * 100);
        });

        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -50px 0px' });

  document.querySelectorAll('.section-reveal').forEach(el => revealObserver.observe(el));
});
</script>
@endpush
