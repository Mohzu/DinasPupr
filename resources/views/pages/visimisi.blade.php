@extends('layouts.app')

@section('title', 'Visi & Misi - Dinas PUPR Kabupaten Garut')
@section('description', 'Visi dan Misi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gray-50">
  <!-- Hero Section (TIDAK DIUBAH) -->
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
          <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16z"/></svg>
          Profil Instansi
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
          Visi & 
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Misi</span>
        </h1>

        <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
          <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
            Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <section class="container mx-auto px-4 sm:px-6 pb-16 relative z-20 max-w-6xl">
    @if($visimisi)
    <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 mb-8">
      
      <!-- Visi Card -->
      @if($visimisi->visi)
      <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden text-center">
        <div class="bg-gradient-to-r from-blue-800 to-blue-900 px-6 sm:px-8 py-6">
          <div class="flex items-center justify-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-400">
              <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
            <h3 class="text-xl sm:text-2xl font-bold text-yellow-400">Visi</h3>
          </div>
        </div>
        
        <div class="p-6 sm:p-8 text-center">
          <p class="text-gray-800 text-sm sm:text-base leading-relaxed">
            {{ $visimisi->visi }}
          </p>
        </div>
      </div>
      @endif

      <!-- Misi Card -->
      @if($visimisi->misi)
      <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden text-center">
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 px-6 sm:px-8 py-6">
          <div class="flex items-center justify-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-900">
              <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
              <path d="m9 12 2 2 4-4"/>
            </svg>
            <h3 class="text-xl sm:text-2xl font-bold text-blue-900">Misi</h3>
          </div>
        </div>
        
        <div class="p-6 sm:p-8">
          <div class="prose prose-sm sm:prose-base max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700">
            {!! $visimisi->misi !!}
          </div>
        </div>
      </div>
      @endif

      <!-- Content Lengkap (jika ada) -->
      @if($visimisi->content)
      <div class="lg:col-span-2 bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 sm:px-8 py-6">
          <h2 class="text-xl sm:text-2xl font-bold text-white text-center">{{ $visimisi->title }}</h2>
        </div>
        
        <div class="p-6 sm:p-8">
          <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700">
            {!! $visimisi->content !!}
          </div>
        </div>
      </div>
      @endif

    </div>

    <!-- Info Section -->
    <div class="mt-6 sm:mt-8 bg-blue-50 border border-blue-200 rounded-xl p-4 sm:p-6">
      <div class="flex items-start gap-3 sm:gap-4">
        <div class="flex-shrink-0 mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" sm:width="24" sm:height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-800">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 16v-4"/>
            <path d="M12 8h.01"/>
          </svg>
        </div>
        <div>
          <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">Tentang Visi dan Misi</h4>
          <p class="text-gray-700 text-xs sm:text-sm leading-relaxed">
            Visi dan Misi Dinas PUPR Kabupaten Garut disusun sebagai panduan strategis dalam pelaksanaan tugas dan fungsi organisasi. 
            Melalui komitmen ini, kami berupaya memberikan pelayanan terbaik dalam pembangunan infrastruktur dan penataan ruang 
            yang berkelanjutan untuk kesejahteraan masyarakat Garut.
          </p>
        </div>
      </div>
    </div>
    @else
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
      <div class="bg-gradient-to-r from-blue-800 to-blue-900 px-6 sm:px-8 py-6">
        <h2 class="text-xl sm:text-2xl font-bold text-white text-center">Visi & Misi</h2>
      </div>
      <div class="p-6 sm:p-8 text-center">
        <p class="text-gray-600">Konten visi dan misi sedang dalam proses persiapan. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
      </div>
    </div>
    @endif

  </section>
</div>
@endsection
