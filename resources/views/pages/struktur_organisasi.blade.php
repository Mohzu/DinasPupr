@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dinas PUPR Kabupaten Garut')
@section('description', 'Struktur Organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<section class="relative overflow-hidden">
  <!-- Decorative background -->
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 left-1/3 h-72 w-72 rounded-full bg-blue-200/40 blur-3xl"></div>
    <div class="absolute -bottom-24 right-1/3 h-72 w-72 rounded-full bg-sky-200/50 blur-3xl"></div>
  </div>

  <!-- Hero -->
  <div class="pt-32 pb-10 bg-gradient-to-b from-blue-50/70 to-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
          <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Profil</span>
          <h1 class="mt-3 text-3xl md:text-5xl font-extrabold tracking-tight text-gray-900">Struktur Organisasi</h1>
          <p class="mt-2 text-gray-600 max-w-2xl">Susunan kelembagaan untuk mendukung layanan pekerjaan umum dan penataan ruang yang efektif.</p>
        </div>
        <div class="flex items-center gap-3 text-sm text-gray-500">
          <a href="{{ route('home') }}" class="hover:text-blue-700">Beranda</a>
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          <span class="text-gray-700 font-medium">Struktur Organisasi</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart preview / download -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-2xl border bg-white/80 backdrop-blur p-6 md:p-8 shadow-sm">
      <div class="flex flex-col lg:flex-row gap-8 items-start">
        <div class="flex-1 w-full">
          <div class="aspect-[16/9] w-full rounded-xl border bg-gradient-to-br from-slate-50 to-blue-50 grid place-content-center text-gray-500">
            <div class="text-center">
              <svg class="mx-auto h-10 w-10 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/></svg>
              <p class="mt-2 text-sm">Pratinjau Struktur (opsional: ganti dengan gambar resmi)</p>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-80">
          <div class="p-5 rounded-xl border bg-gradient-to-br from-blue-50 to-sky-50">
            <p class="font-semibold text-gray-900">Dokumen Struktur</p>
            <p class="text-sm text-gray-600">Unduh bagan organisasi versi resmi dalam format PDF.</p>
            <a href="#" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16V4m0 12l-3-3m3 3l3-3M4 20h16"/></svg>
              Unduh PDF
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Divisions -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @php $divisions = [
        ['name' => 'Sekretariat', 'items' => ['Subbagian Umum & Kepegawaian', 'Subbagian Keuangan', 'Subbagian Perencanaan']],
        ['name' => 'Kelompok Jabatan Fungsional', 'items' => ['Koordinator Fungsional']],
        ['name' => 'Bidang Bina Marga', 'items' => ['Seksi Perencanaan Jalan & Jembatan', 'Seksi Pembangunan Jalan & Jembatan', 'Seksi Pemeliharaan Jalan & Jembatan']],
        ['name' => 'Bidang Cipta Karya', 'items' => ['Seksi Permukiman', 'Seksi Bangunan Gedung', 'Seksi Penyehatan Lingkungan']],
        ['name' => 'Bidang Sumber Daya Air', 'items' => ['Seksi Irigasi', 'Seksi Sungai & Pantai', 'Seksi Operasi & Pemeliharaan']],
      ]; @endphp

      @foreach ($divisions as $division)
      <div class="group p-5 rounded-2xl border bg-white/80 hover:border-blue-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-3">
          <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-blue-500 to-sky-600 text-white grid place-content-center">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h7"/></svg>
          </div>
          <h3 class="font-semibold text-gray-900">{{ $division['name'] }}</h3>
        </div>
        <ul class="mt-3 text-sm text-gray-700 space-y-1.5">
          @foreach ($division['items'] as $item)
          <li class="flex items-start gap-2">
            <span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-500"></span>
            <span>{{ $item }}</span>
          </li>
          @endforeach
        </ul>
      </div>
      @endforeach
    </div>

    <p class="mt-6 text-sm text-gray-500">Catatan: Nomenklatur menyesuaikan peraturan yang berlaku (Perda/Perbup). Nama pejabat dapat diperbarui sewaktu-waktu.</p>
  </div>

  <div class="h-10"></div>
</section>
@endsection