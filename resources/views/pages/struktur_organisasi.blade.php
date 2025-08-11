@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dinas PUPR Kabupaten Garut')
@section('description', 'Struktur Organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

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
          Struktur
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Organisasi</span>
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
  <section class="container mx-auto px-6 pb-16 -mt-8 relative z-10">
    <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20">
      <!-- Chart preview / download -->
      <div class="rounded-2xl border bg-white/80 backdrop-blur p-6 md:p-8 shadow-sm">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
          <div class="flex-1 w-full">
            <div class="aspect-[16/9] w-full rounded-xl border overflow-hidden bg-white">
              <img src="{{ asset('img/struktur_organisasi.jpg') }}" alt="Struktur Organisasi" class="w-full h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';">
              <div class="w-full h-full place-content-center text-gray-400 hidden">
                <div class="text-center">
                  <svg class="mx-auto h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/></svg>
                  <p class="mt-2 text-sm">Gambar struktur belum tersedia</p>
                </div>
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

      <!-- Leaders Carousel -->
      @php $leaders = [
        ['role' => 'Kepala Dinas', 'name' => 'Nama Kepala Dinas', 'photo' => 'img/pejabat/kepala.jpg'],
        ['role' => 'Sekretaris Dinas', 'name' => 'Nama Sekretaris', 'photo' => 'img/pejabat/sekretaris.jpg'],
        ['role' => 'Kepala Bidang Bina Marga', 'name' => 'Nama Kabid Bina Marga', 'photo' => 'img/pejabat/kabid-bina-marga.jpg'],
        ['role' => 'Kepala Bidang Cipta Karya', 'name' => 'Nama Kabid Cipta Karya', 'photo' => 'img/pejabat/kabid-cipta-karya.jpg'],
        ['role' => 'Kepala Bidang Sumber Daya Air', 'name' => 'Nama Kabid SDA', 'photo' => 'img/pejabat/kabid-sda.jpg'],
        ['role' => 'Koordinator Fungsional', 'name' => 'Nama Koordinator', 'photo' => 'img/pejabat/koor-fungsional.jpg'],
      ]; @endphp

      <div class="mt-10">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-bold text-gray-900">Pejabat Struktural</h2>
          <div class="flex gap-2">
            <button id="leaders-prev" type="button" class="p-2 rounded-lg border bg-white hover:bg-gray-50">
              <svg class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button id="leaders-next" type="button" class="p-2 rounded-lg border bg-white hover:bg-gray-50">
              <svg class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>

        <div id="leaders-scroll" class="relative">
          <div class="flex gap-5 overflow-x-auto no-scrollbar snap-x snap-mandatory scroll-smooth pb-2">
            @foreach ($leaders as $person)
            <div class="shrink-0 w-64 snap-start">
              <div class="rounded-2xl border bg-white shadow-sm overflow-hidden">
                <div class="h-40 w-full bg-gray-100 relative">
                  <img src="{{ asset($person['photo']) }}" alt="{{ $person['name'] }}" class="absolute inset-0 w-full h-full object-cover" onerror="this.style.display='none'">
                  <div class="absolute inset-0 grid place-content-center text-gray-400">
                    <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-6 2.69-6 6h12c0-3.31-2.69-6-6-6z"/></svg>
                  </div>
                </div>
                <div class="p-4">
                  <p class="text-xs uppercase tracking-wide text-blue-700 font-semibold">{{ $person['role'] }}</p>
                  <p class="mt-1 font-semibold text-gray-900">{{ $person['name'] }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Divisions -->
      <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
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
  </section>
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
    const container = document.querySelector('#leaders-scroll > div');
    const prevBtn = document.getElementById('leaders-prev');
    const nextBtn = document.getElementById('leaders-next');
    if (!container || !prevBtn || !nextBtn) return;
    const step = 320;
    prevBtn.addEventListener('click', () => container.scrollBy({ left: -step, behavior: 'smooth' }));
    nextBtn.addEventListener('click', () => container.scrollBy({ left: step, behavior: 'smooth' }));
  });
</script>
@endpush