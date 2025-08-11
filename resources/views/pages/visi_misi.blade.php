@extends('layouts.app')

@section('title', 'Visi & Misi - Dinas PUPR Kabupaten Garut')
@section('description', 'Visi dan Misi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

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

  <!-- Main Content: 3 columns (Visi | Logo | Misi) -->
  <section class="container mx-auto px-6 pb-16 -mt-8 relative z-10">
    <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
        <!-- Visi (left) -->
        <div class="p-6 rounded-2xl border bg-white shadow-sm h-full flex flex-col">
          <h2 class="text-xl md:text-2xl font-bold text-blue-800">Visi</h2>
          <p class="mt-4 text-gray-700 leading-relaxed text-lg">
            Terwujudnya infrastruktur pekerjaan umum dan penataan ruang yang andal, berkelanjutan, dan berkeadilan untuk mendukung pertumbuhan ekonomi serta kualitas hidup masyarakat Kabupaten Garut.
          </p>
        </div>

        <!-- Logo (center) -->
        <div class="flex items-center justify-center h-full">
          <div class="relative">
            <div class="absolute -inset-4 rounded-full bg-blue-200/40 blur-2xl"></div>
            <div class="relative h-40 w-40 rounded-3xl bg-white border shadow-xl grid place-content-center overflow-hidden">
              <img src="{{ asset('img/logoPU.png') }}" alt="Logo Dinas PUPR Garut" class="h-24 w-24 object-contain" onerror="this.style.display='none'">
              <span class="text-blue-700 font-extrabold" style="display:none;">PUPR</span>
            </div>
          </div>
        </div>

        <!-- Misi (right) -->
        <div class="p-6 rounded-2xl border bg-white shadow-sm h-full flex flex-col">
          <h2 class="text-xl md:text-2xl font-bold text-blue-800">Misi</h2>
          <ol class="mt-4 space-y-3">
            @php $missions = [
              'Meningkatkan kualitas dan cakupan pelayanan infrastruktur dasar (jalan, jembatan, air minum, sanitasi, drainase).',
              'Mewujudkan penataan ruang yang tertib, aman, dan berkelanjutan berlandaskan RTRW/RDTR.',
              'Mendorong inovasi serta tata kelola yang profesional, transparan, dan akuntabel.',
              'Memperkuat ketahanan infrastruktur terhadap bencana dan perubahan iklim.',
              'Meningkatkan kolaborasi dan partisipasi masyarakat dalam pembangunan infrastruktur.',
            ]; @endphp
            @foreach ($missions as $index => $mission)
              <li class="flex items-start gap-3">
                <span class="mt-0.5 inline-flex h-7 w-7 items-center justify-center rounded-lg bg-blue-600/10 text-blue-700 font-semibold">{{ $index + 1 }}</span>
                <p class="text-gray-700">{{ $mission }}</p>
              </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection