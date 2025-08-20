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


  </section>

  <!-- Main Content (Description-focused) -->
  <section class="container mx-auto px-6 pb-16 -mt-8 relative z-10">
    <div class="relative overflow-hidden bg-white/90 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20">
      <div class="pointer-events-none absolute -top-16 -right-24 h-64 w-64 rounded-full bg-gradient-to-br from-blue-200/60 to-sky-200/40 blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-gradient-to-tr from-amber-200/50 to-orange-200/40 blur-3xl"></div>

      <style>
        .dropcap:first-letter{float:left;font-weight:800;font-size:3rem;line-height:1;color:#1d4ed8;margin-right:.4rem}
      </style>

      <div class="grid lg:grid-cols-12 gap-10">
        <div class="lg:col-span-8 xl:col-span-8">
          <div class="flex items-center gap-2 mb-6">
            <span class="inline-flex h-2 w-2 rounded-full bg-blue-600"></span>
            <span class="text-xs font-semibold tracking-wider text-blue-700 uppercase">Sejarah Singkat</span>
          </div>

          <article class="text-gray-700 leading-relaxed text-[15px] md:text-base">
            <h2 class="text-lg md:text-xl font-bold text-gray-900">Gambaran Umum</h2>
            <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-sky-400 rounded-full mt-2 mb-4"></div>
            <p class="dropcap">
              Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut dibentuk untuk memastikan terselenggaranya pelayanan publik di bidang pekerjaan umum serta penataan ruang yang berdaya guna, berhasil guna, tertib, dan berkelanjutan. Seiring perkembangan kebijakan nasional dan daerah, peran kelembagaan ini terus diperkuat melalui penyesuaian struktur, peningkatan kompetensi, serta penerapan standar layanan yang adaptif.
            </p>

            <h2 class="mt-8 text-lg md:text-xl font-bold text-gray-900">Perkembangan</h2>
            <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-sky-400 rounded-full mt-2 mb-4"></div>
            <p>
              Dalam perjalanannya, pengelolaan infrastruktur dasar—meliputi jalan, jembatan, irigasi, dan bangunan gedung—dilakukan dengan menekankan prinsip keselamatan, ketahanan, dan keberlanjutan. Pada penataan ruang, pengendalian pemanfaatan ruang diarahkan untuk menumbuhkan wilayah secara seimbang dengan memperhatikan daya dukung lingkungan serta mendorong investasi yang inklusif.
            </p>

            <figure class="mt-6 rounded-2xl border bg-gradient-to-br from-blue-50/60 to-sky-50/60 p-6">
              <div class="flex items-start gap-3">
                <svg class="w-6 h-6 text-blue-600 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M7 7h6v6H7z" opacity=".2"/><path d="M7 3a4 4 0 0 0-4 4v10h8V7a4 4 0 0 0-4-4Zm10 0a4 4 0 0 0-4 4v10h8V7a4 4 0 0 0-4-4Z"/></svg>
                <blockquote class="text-sm md:text-base italic text-gray-700">
                  Mengedepankan keselamatan, keberlanjutan, dan keteraturan tata ruang sebagai pilar pembangunan infrastruktur yang melayani masyarakat.
                </blockquote>
              </div>
            </figure>

            <h2 class="mt-8 text-lg md:text-xl font-bold text-gray-900">Arah ke Depan</h2>
            <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-sky-400 rounded-full mt-2 mb-4"></div>
            <p>
              Transformasi layanan diwujudkan melalui digitalisasi proses, penyederhanaan prosedur, dan kolaborasi multipihak. Dinas PUPR Kabupaten Garut berkomitmen menghadirkan layanan yang transparan, partisipatif, dan berorientasi hasil guna mendukung visi pembangunan daerah.
            </p>
          </article>
        </div>

        <aside class="lg:col-span-4 xl:col-span-4">
          <div class="lg:sticky lg:top-24 space-y-4">
            <div class="p-5 rounded-2xl border bg-white/80 backdrop-blur shadow-sm">
              <p class="text-xs font-semibold tracking-wider text-blue-700 uppercase">Fakta Singkat</p>
              <div class="mt-4 grid grid-cols-2 gap-3">
                <div class="p-3 rounded-xl border bg-white/70">
                  <p class="text-[11px] text-gray-500">Fokus</p>
                  <p class="text-sm font-semibold text-gray-900 mt-0.5">PU & Tata Ruang</p>
                </div>
                <div class="p-3 rounded-xl border bg-white/70">
                  <p class="text-[11px] text-gray-500">Pendekatan</p>
                  <p class="text-sm font-semibold text-gray-900 mt-0.5">Transparan</p>
                </div>
                <div class="p-3 rounded-xl border bg-white/70">
                  <p class="text-[11px] text-gray-500">Kolaborasi</p>
                  <p class="text-sm font-semibold text-gray-900 mt-0.5">Multipihak</p>
                </div>
                <div class="p-3 rounded-xl border bg-white/70">
                  <p class="text-[11px] text-gray-500">Arah</p>
                  <p class="text-sm font-semibold text-gray-900 mt-0.5">Berkelanjutan</p>
                </div>
              </div>
            </div>

            <div class="p-5 rounded-2xl border bg-gradient-to-br from-blue-50 to-sky-50">
              <p class="text-xs font-semibold tracking-wider text-blue-700 uppercase">Nilai Utama</p>
              <div class="mt-3 flex flex-wrap gap-2">
                <span class="px-3 py-1 rounded-full bg-white border text-xs text-gray-700">Keselamatan</span>
                <span class="px-3 py-1 rounded-full bg-white border text-xs text-gray-700">Keberlanjutan</span>
                <span class="px-3 py-1 rounded-full bg-white border text-xs text-gray-700">Keteraturan</span>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
</div>
@endsection