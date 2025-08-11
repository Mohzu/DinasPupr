@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<section class="relative overflow-hidden">
  <!-- Decorative background -->
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-blue-200/40 blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 h-72 w-72 rounded-full bg-sky-200/50 blur-3xl"></div>
  </div>

  <!-- Hero -->
  <div class="pt-32 pb-10 bg-gradient-to-b from-blue-50/70 to-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
          <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Profil</span>
          <h1 class="mt-3 text-3xl md:text-5xl font-extrabold tracking-tight text-gray-900">Sejarah</h1>
          <p class="mt-2 text-gray-600 max-w-2xl">Jejak perjalanan Dinas PUPR Kabupaten Garut dalam membangun infrastruktur dan tata ruang bagi masyarakat.</p>
        </div>
        <div class="flex items-center gap-3 text-sm text-gray-500">
          <a href="{{ route('home') }}" class="hover:text-blue-700">Beranda</a>
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          <span class="text-gray-700 font-medium">Sejarah</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Timeline -->
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
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

    <!-- Highlights -->
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

    <!-- Closing note -->
    <div class="mt-8 p-6 rounded-2xl border bg-gradient-to-r from-blue-50 to-sky-50">
      <p class="text-sm text-gray-700">Catatan: Garis waktu di atas merupakan ringkasan. Silakan sesuaikan tahun dan peristiwa sesuai dokumen resmi (Perda/Perbup, SK, dan arsip lainnya).</p>
    </div>
  </div>

  <div class="h-12"></div>
</section>
@endsection