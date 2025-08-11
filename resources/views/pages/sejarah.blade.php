@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gray-50">
  <!-- Hero Section (consistent with berita/pengumuman) -->
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
          Sejarah
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Instansi</span>
        </h1>

        <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
          <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
            Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
          </p>
        </div>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
      <svg viewBox="0 0 1200 120" class="w-full h-16 fill-gray-50">
        <path d="M0,60 C150,100 350,0 600,60 C850,120 1050,20 1200,60 L1200,120 L0,120 Z"/>
      </svg>
    </div>
  </section>

  <!-- Main Content -->
  <section class="container mx-auto px-6 pb-16 -mt-8 relative z-10">
    <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20">
      <ol class="relative ms-3 border-s border-blue-100">
        @php $events = [
          ['title' => 'Pembentukan Dinas', 'year' => 'Tahun …', 'desc' => 'Dinas PUPR Kabupaten Garut dibentuk untuk melaksanakan urusan pemerintahan bidang pekerjaan umum dan penataan ruang.'],
          ['title' => 'Penguatan Kelembagaan', 'year' => 'Tahun …', 'desc' => 'Penyesuaian struktur dan nomenklatur sesuai regulasi nasional dan daerah untuk meningkatkan kualitas layanan.'],
          ['title' => 'Transformasi Layanan', 'year' => 'Tahun …', 'desc' => 'Penerapan inovasi, digitalisasi layanan, serta penguatan kolaborasi dengan pemangku kepentingan.'],
        ]; @endphp

        @foreach ($events as $event)
        <li class="relative mb-10 ms-6">
          <span class="absolute -start-3 grid h-6 w-6 place-content-center rounded-full bg-gradient-to-br from-blue-500 to-sky-600 text-white ring-8 ring-white">
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/></svg>
          </span>
          <div class="p-5 rounded-xl border bg-white/80 backdrop-blur shadow-sm">
            <div class="flex flex-wrap items-center justify-between gap-2">
              <h3 class="font-semibold text-gray-900">{{ $event['title'] }}</h3>
              <time class="text-sm text-blue-700 font-medium">{{ $event['year'] }}</time>
            </div>
            <p class="mt-2 text-gray-700">{{ $event['desc'] }}</p>
          </div>
        </li>
        @endforeach
      </ol>

      <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @php $highlights = [
          ['label' => 'Ruas Jalan', 'value' => '1.200+ km'],
          ['label' => 'Jembatan', 'value' => '300+ unit'],
          ['label' => 'Sistem Irigasi', 'value' => '150+ lokasi'],
          ['label' => 'Proyek/Tahun', 'value' => '100+ paket'],
        ]; @endphp
        @foreach ($highlights as $h)
        <div class="p-5 rounded-xl border bg-white/70 backdrop-blur text-center hover:shadow-md transition-shadow">
          <p class="text-2xl font-extrabold text-blue-700">{{ $h['value'] }}</p>
          <p class="text-xs uppercase tracking-wide text-gray-600 mt-1">{{ $h['label'] }}</p>
        </div>
        @endforeach
      </div>

      <div class="mt-8 p-6 rounded-2xl border bg-gradient-to-r from-blue-50 to-sky-50">
        <p class="text-sm text-gray-700">Catatan: Garis waktu di atas merupakan ringkasan. Silakan sesuaikan tahun dan peristiwa sesuai dokumen resmi (Perda/Perbup, SK, dan arsip lainnya).</p>
      </div>
    </div>
  </section>
</div>
@endsection