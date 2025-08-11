@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<section class="relative pt-28 pb-12 bg-gradient-to-b from-blue-50 to-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
      <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Sejarah</h1>
      <p class="mt-2 text-gray-600">Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut</p>
    </div>

    <div class="bg-white border rounded-2xl shadow-sm p-6">
      <ol class="relative border-s border-gray-200 ms-4">
        <li class="mb-10 ms-6">
          <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 ring-8 ring-white"></span>
          <h3 class="font-semibold text-gray-900">Pembentukan Dinas</h3>
          <time class="mb-1 text-sm font-normal leading-none text-gray-500">Tahun ...</time>
          <p class="text-gray-700">Dinas PUPR Kabupaten Garut dibentuk untuk melaksanakan urusan pemerintahan bidang pekerjaan umum dan penataan ruang.</p>
        </li>
        <li class="mb-10 ms-6">
          <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 ring-8 ring-white"></span>
          <h3 class="font-semibold text-gray-900">Penguatan Kelembagaan</h3>
          <time class="mb-1 text-sm font-normal leading-none text-gray-500">Tahun ...</time>
          <p class="text-gray-700">Penyesuaian struktur dan nomenklatur sesuai regulasi nasional dan daerah untuk meningkatkan kualitas layanan.</p>
        </li>
        <li class="ms-6">
          <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 ring-8 ring-white"></span>
          <h3 class="font-semibold text-gray-900">Transformasi Layanan</h3>
          <time class="mb-1 text-sm font-normal leading-none text-gray-500">Tahun ...</time>
          <p class="text-gray-700">Penerapan inovasi, digitalisasi layanan, serta penguatan kolaborasi dengan pemangku kepentingan.</p>
        </li>
      </ol>
      <p class="mt-6 text-sm text-gray-500">Catatan: Garis waktu di atas merupakan ringkasan. Silakan sesuaikan tahun dan peristiwa sesuai dokumen resmi.</p>
    </div>
  </div>
</section>
@endsection