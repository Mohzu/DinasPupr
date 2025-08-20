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
    <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-8 shadow-2xl border border-white/20">
      <style>
        .dropcap:first-letter{float:left;font-weight:800;font-size:3rem;line-height:1;color:#1d4ed8;margin-right:.4rem}
      </style>

      <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-2 mb-6">
          <span class="inline-flex h-2 w-2 rounded-full bg-blue-600"></span>
          <span class="text-xs font-semibold tracking-wider text-blue-700 uppercase">Sejarah Singkat</span>
        </div>

        <article class="text-gray-700 leading-relaxed text-[15px] md:text-base">
          <p class="dropcap">
            Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut dibentuk untuk memastikan terselenggaranya pelayanan publik di bidang pekerjaan umum serta penataan ruang yang berdaya guna, berhasil guna, tertib, dan berkelanjutan. Seiring perkembangan kebijakan nasional dan daerah, peran kelembagaan ini terus diperkuat melalui penyesuaian struktur, peningkatan kompetensi, serta penerapan standar layanan yang adaptif.
          </p>
          <p class="mt-4">
            Dalam perjalanannya, pengelolaan infrastruktur dasar—meliputi jalan, jembatan, irigasi, dan bangunan gedung—dilakukan dengan menekankan prinsip keselamatan, ketahanan, dan keberlanjutan. Sementara pada penataan ruang, upaya pengendalian pemanfaatan ruang dilakukan untuk mendorong tumbuh-kembang wilayah secara seimbang, memperhatikan daya dukung lingkungan, serta mendorong investasi yang inklusif.
          </p>
          <p class="mt-4">
            Transformasi layanan diwujudkan melalui digitalisasi proses, penyederhanaan prosedur, dan kolaborasi multipihak. Dengan demikian, Dinas PUPR Kabupaten Garut terus berkomitmen menghadirkan layanan yang transparan, partisipatif, dan berorientasi pada hasil guna mendukung visi pembangunan daerah.
          </p>
        </article>

        <figure class="mt-8 rounded-2xl border bg-gradient-to-br from-blue-50/60 to-sky-50/60 p-6">
          <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M7 7h6v6H7z" opacity=".2"/><path d="M7 3a4 4 0 0 0-4 4v10h8V7a4 4 0 0 0-4-4Zm10 0a4 4 0 0 0-4 4v10h8V7a4 4 0 0 0-4-4Z"/></svg>
            <blockquote class="text-sm md:text-base italic text-gray-700">
              Mengedepankan keselamatan, keberlanjutan, dan keteraturan tata ruang sebagai pilar pembangunan infrastruktur yang melayani masyarakat.
            </blockquote>
          </div>
        </figure>

        <div class="mt-8 grid sm:grid-cols-3 gap-4">
          <div class="p-4 rounded-xl border bg-white/80 backdrop-blur">
            <p class="text-xs text-gray-500">Fokus Layanan</p>
            <p class="mt-1 font-semibold text-gray-900">PU & Penataan Ruang</p>
          </div>
          <div class="p-4 rounded-xl border bg-white/80 backdrop-blur">
            <p class="text-xs text-gray-500">Pendekatan</p>
            <p class="mt-1 font-semibold text-gray-900">Transparan & Partisipatif</p>
          </div>
          <div class="p-4 rounded-xl border bg-white/80 backdrop-blur">
            <p class="text-xs text-gray-500">Arah</p>
            <p class="mt-1 font-semibold text-gray-900">Berkelanjutan</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection