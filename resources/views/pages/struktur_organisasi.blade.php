@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dinas PUPR Kabupaten Garut')
@section('description', 'Struktur Organisasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<section class="relative pt-28 pb-12 bg-gradient-to-b from-blue-50 to-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
      <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Struktur Organisasi</h1>
      <p class="mt-2 text-gray-600">Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut</p>
    </div>

    <div class="bg-white border rounded-2xl shadow-sm p-6">
      <div class="grid md:grid-cols-3 gap-6">
        <div class="md:col-span-3">
          <div class="p-4 rounded-xl border bg-blue-50">
            <p class="text-center text-sm text-blue-700">Kepala Dinas</p>
            <p class="text-center font-semibold text-blue-900">Nama Kepala Dinas</p>
          </div>
        </div>

        <div class="md:col-span-3 grid md:grid-cols-2 gap-6">
          <div class="p-4 rounded-xl border">
            <p class="text-center text-sm text-gray-500">Sekretariat</p>
            <p class="text-center font-semibold text-gray-900">Sekretaris Dinas</p>
            <ul class="mt-3 text-sm text-gray-700 space-y-1">
              <li>- Subbagian Umum dan Kepegawaian</li>
              <li>- Subbagian Keuangan</li>
              <li>- Subbagian Perencanaan</li>
            </ul>
          </div>
          <div class="p-4 rounded-xl border">
            <p class="text-center text-sm text-gray-500">Kelompok Jabatan Fungsional</p>
            <p class="text-center font-semibold text-gray-900">Koordinator Fungsional</p>
          </div>
        </div>

        <div class="md:col-span-3 grid md:grid-cols-3 gap-6">
          <div class="p-4 rounded-xl border">
            <p class="text-center text-sm text-gray-500">Bidang Bina Marga</p>
            <ul class="mt-3 text-sm text-gray-700 space-y-1">
              <li>- Seksi Perencanaan Jalan dan Jembatan</li>
              <li>- Seksi Pembangunan Jalan dan Jembatan</li>
              <li>- Seksi Pemeliharaan Jalan dan Jembatan</li>
            </ul>
          </div>
          <div class="p-4 rounded-xl border">
            <p class="text-center text-sm text-gray-500">Bidang Cipta Karya</p>
            <ul class="mt-3 text-sm text-gray-700 space-y-1">
              <li>- Seksi Permukiman</li>
              <li>- Seksi Bangunan Gedung</li>
              <li>- Seksi Penyehatan Lingkungan</li>
            </ul>
          </div>
          <div class="p-4 rounded-xl border">
            <p class="text-center text-sm text-gray-500">Bidang Sumber Daya Air</p>
            <ul class="mt-3 text-sm text-gray-700 space-y-1">
              <li>- Seksi Irigasi</li>
              <li>- Seksi Sungai dan Pantai</li>
              <li>- Seksi Operasi dan Pemeliharaan</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="mt-6 text-sm text-gray-500">Catatan: Susunan dan nomenklatur menyesuaikan peraturan yang berlaku (Perda/Perbup). Data nama pejabat dapat diperbarui sewaktu-waktu.</p>
    </div>
  </div>
</section>
@endsection