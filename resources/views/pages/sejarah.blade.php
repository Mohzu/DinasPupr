@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gray-50">
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

    <section class="container mx-auto px-4 sm:px-6 pb-16 -mt-32 relative z-20 max-w-6xl">
        
        @if($sejarah)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-700 px-6 sm:px-8 py-6 text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-white">{{ $sejarah->title }}</h2>
            </div>

            <div class="p-6 sm:p-8 space-y-6 sm:space-y-8">
                <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700">
                    {!! $sejarah->content !!}
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-700 px-6 sm:px-8 py-6 text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-white">Sejarah Perkembangan</h2>
                <p class="text-blue-100 mt-1 text-sm sm:text-base">Konten sedang dalam proses persiapan</p>
            </div>
            <div class="p-6 sm:p-8 text-center">
                <p class="text-gray-600">Data sejarah belum tersedia. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
            </div>
        </div>
        @endif

    </section>
</div>
@php
    use Illuminate\Support\Str;
@endphp
@endsection