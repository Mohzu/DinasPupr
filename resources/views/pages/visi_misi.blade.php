@extends('layouts.app')

@section('title', 'Visi & Misi - Dinas PUPR Kabupaten Garut')
@section('description', 'Visi dan Misi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<section class="relative overflow-hidden">
  <!-- Decorative background -->
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-blue-200/40 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-sky-200/50 blur-3xl"></div>
  </div>

  <!-- Hero -->
  <div class="pt-32 pb-10 bg-gradient-to-b from-blue-50/70 to-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
          <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Profil</span>
          <h1 class="mt-3 text-3xl md:text-5xl font-extrabold tracking-tight text-gray-900">Visi & Misi</h1>
          <p class="mt-2 text-gray-600 max-w-2xl">Arah pembangunan infrastruktur dan penataan ruang yang andal, berkelanjutan, dan berkeadilan.</p>
        </div>
        <div class="flex items-center gap-3 text-sm text-gray-500">
          <a href="{{ route('home') }}" class="hover:text-blue-700">Beranda</a>
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          <span class="text-gray-700 font-medium">Visi & Misi</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-8">

      <!-- Vision card -->
      <div class="relative p-6 md:p-8 rounded-2xl border bg-white/80 backdrop-blur shadow-md hover:shadow-lg transition-shadow">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 text-white grid place-content-center">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12l8.954-8.955c.44-.44 1.152-.44 1.591 0L21.75 12M4.5 9.75v9.75A1.5 1.5 0 006 21h12a1.5 1.5 0 001.5-1.5V9.75"/></svg>
          </div>
          <h2 class="text-xl md:text-2xl font-bold text-blue-800">Visi</h2>
        </div>
        <blockquote class="mt-5 text-lg md:text-xl leading-relaxed text-gray-800">
          “Terwujudnya infrastruktur pekerjaan umum dan penataan ruang yang andal, berkelanjutan, dan berkeadilan untuk mendukung pertumbuhan ekonomi serta kualitas hidup masyarakat Kabupaten Garut.”
        </blockquote>
      </div>

      <!-- Mission list -->
      <div class="relative p-6 md:p-8 rounded-2xl border bg-white/80 backdrop-blur shadow-md hover:shadow-lg transition-shadow">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 text-white grid place-content-center">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.5 12.75l6 6 9-13.5"/></svg>
          </div>
          <h2 class="text-xl md:text-2xl font-bold text-blue-800">Misi</h2>
        </div>
        <ol class="mt-5 space-y-4">
          @php $missions = [
            'Meningkatkan kualitas dan cakupan pelayanan infrastruktur dasar (jalan, jembatan, air minum, sanitasi, drainase).',
            'Mewujudkan penataan ruang yang tertib, aman, dan berkelanjutan berlandaskan RTRW/RDTR.',
            'Mendorong inovasi serta tata kelola yang profesional, transparan, dan akuntabel.',
            'Memperkuat ketahanan infrastruktur terhadap bencana dan perubahan iklim.',
            'Meningkatkan kolaborasi dan partisipasi masyarakat dalam pembangunan infrastruktur.',
          ]; @endphp
          @foreach ($missions as $index => $mission)
            <li class="group flex items-start gap-4">
              <span class="shrink-0 h-8 w-8 rounded-lg bg-blue-600/10 text-blue-700 grid place-content-center font-semibold">{{ $index + 1 }}</span>
              <p class="mt-0.5 text-gray-700 group-hover:text-gray-900 transition-colors">{{ $mission }}</p>
            </li>
          @endforeach
        </ol>
      </div>
    </div>

    <!-- Values -->
    <div class="mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="rounded-2xl border bg-white/70 backdrop-blur p-6 md:p-8 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900">Nilai-Nilai Layanan</h3>
        <div class="mt-5 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
          @php $values = [
            ['title' => 'Profesional', 'desc' => 'Berorientasi hasil, kompeten, dan bertanggung jawab.'],
            ['title' => 'Transparan', 'desc' => 'Informasi terbuka dan mudah diakses publik.'],
            ['title' => 'Kolaboratif', 'desc' => 'Bersinergi dengan pemangku kepentingan.'],
            ['title' => 'Berkelanjutan', 'desc' => 'Ramah lingkungan dan adaptif iklim.'],
          ]; @endphp
          @foreach ($values as $v)
          <div class="p-5 rounded-xl border hover:border-blue-200 hover:shadow-md transition-all bg-white">
            <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-blue-500 to-sky-600 text-white grid place-content-center">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/></svg>
            </div>
            <h4 class="mt-3 font-semibold text-gray-900">{{ $v['title'] }}</h4>
            <p class="mt-1.5 text-sm text-gray-600">{{ $v['desc'] }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Document CTA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-5 md:p-6 rounded-2xl border bg-gradient-to-r from-blue-50 to-sky-50">
        <div>
          <p class="font-semibold text-gray-900">Dokumen Resmi Visi & Misi</p>
          <p class="text-sm text-gray-600">Unduh dokumen lengkap untuk referensi.</p>
        </div>
        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16V4m0 12l-3-3m3 3l3-3M4 20h16"/></svg>
          Unduh PDF
        </a>
      </div>
    </div>
  </div>
</section>
@endsection