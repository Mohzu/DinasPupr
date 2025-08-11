@extends('layouts.app')

@section('title', 'Visi & Misi - Dinas PUPR Kabupaten Garut')
@section('description', 'Visi dan Misi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<section class="relative pt-28 pb-12 bg-gradient-to-b from-blue-50 to-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
      <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Visi & Misi</h1>
      <p class="mt-2 text-gray-600">Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
      <div class="p-6 rounded-2xl border bg-white shadow-sm">
        <h2 class="text-xl font-bold text-blue-700">Visi</h2>
        <p class="mt-3 text-gray-700 leading-relaxed">
          Terwujudnya infrastruktur pekerjaan umum dan penataan ruang yang andal, berkelanjutan, dan berkeadilan untuk mendukung pertumbuhan ekonomi serta kualitas hidup masyarakat Kabupaten Garut.
        </p>
      </div>

      <div class="p-6 rounded-2xl border bg-white shadow-sm">
        <h2 class="text-xl font-bold text-blue-700">Misi</h2>
        <ul class="mt-3 space-y-3 text-gray-700 list-disc list-inside">
          <li>Meningkatkan kualitas dan cakupan pelayanan infrastruktur dasar (jalan, jembatan, air minum, sanitasi, dan drainase).</li>
          <li>Mewujudkan penataan ruang yang tertib, aman, dan berkelanjutan berlandaskan RTRW/RDTR.</li>
          <li>Mendorong inovasi dan tata kelola pemerintahan yang profesional, transparan, dan akuntabel.</li>
          <li>Memperkuat ketahanan infrastruktur terhadap bencana dan perubahan iklim.</li>
          <li>Memfasilitasi partisipasi masyarakat dan pemangku kepentingan dalam pembangunan infrastruktur.</li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection