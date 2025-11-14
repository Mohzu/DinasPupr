@extends('layouts.app')

@section('title', $berita->judul)
@section('description', Str::limit(strip_tags($berita->isi), 150))

@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-6 py-4">
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
                <a href="{{ route('berita') }}" class="hover:text-blue-600 transition-colors">Berita</a>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-gray-900">{{ Str::limit($berita->judul, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 py-6 sm:py-8 mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 sm:gap-8">
            <!-- Main Article -->
            <div class="lg:col-span-3">
                <article class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Article Header -->
                    <div class="p-4 sm:p-6 border-b border-gray-100">
                        @if ($berita->kategori)
                            <div class="mb-3">
                                <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                    {{ strtoupper($berita->kategori) }}
                                </span>
                            </div>
                        @endif
                        
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                            {{ $berita->judul }}
                        </h1>
                    </div>

                    <!-- Featured Image -->
                    @if ($berita->gambar)
                    <div class="p-4 sm:p-6 pb-0">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="{{ Storage::disk('public')->url($berita->gambar) }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="w-full h-auto object-contain bg-gray-50">
                        </div>
                        <p class="text-center text-sm text-gray-600 mt-2 italic">{{ $berita->judul }}</p>
                    </div>
                    @endif

                    <!-- Article Content -->
                    <div class="p-4 sm:p-6">
                        <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700">
                            {!! $berita->isi !!}
                        </div>
                    </div>

                    <!-- Article Footer -->
                    <div class="px-4 sm:px-6 py-4 border-t border-gray-100 bg-gray-50">
                        <div class="flex flex-col sm:flex-row flex-wrap items-start sm:items-center justify-between gap-4">
                            <div class="text-sm text-gray-600">
                                <strong>Sumber:</strong> {{ $berita->penulis ?? 'PUPR Garut' }}
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">Bagikan:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                   target="_blank"
                                   class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M20 10C20 4.477 15.523 0 10 0S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z"/>
                                    </svg>
                                </a>
                                
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}" 
                                   target="_blank"
                                   class="inline-flex items-center justify-center w-8 h-8 bg-sky-500 text-white rounded hover:bg-sky-600 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"/>
                                    </svg>
                                </a>
                                
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul.' '.request()->fullUrl()) }}" 
                                   target="_blank"
                                   class="inline-flex items-center justify-center w-8 h-8 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Navigation -->
                <div class="mt-8">
                    <a href="{{ route('berita') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Berita
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="sticky top-8 space-y-4 sm:space-y-6">
                    <!-- Berita Info -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Berita</h3>
                        <div class="space-y-3 text-sm">
                            @if ($berita->kategori)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Kategori:</span>
                                <span class="text-gray-900 font-medium">{{ $berita->kategori }}</span>
                            </div>
                            @endif
                            
                            <div class="flex justify-between">
                                <span class="text-gray-600">Penulis:</span>
                                <span class="text-gray-900 font-medium">{{ $berita->penulis ?? 'PUPR Garut' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tanggal:</span>
                                <span class="text-gray-900 font-medium">{{ optional($berita->published_at ?? $berita->created_at)->locale('id')->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Waktu:</span>
                                <span class="text-gray-900 font-medium">{{ optional($berita->published_at ?? $berita->created_at)->locale('id')->translatedFormat('H:i') }} WIB</span>
                            </div>

                        </div>
                    </div>

                    <!-- Related News or Recent News -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Berita Terkait</h3>
                        <div class="space-y-4">
                            <!-- Placeholder for related news - you can add this logic in controller -->
                            <div class="text-center py-8 text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3v6m0 0l-3-3m3 3l3-3"/>
                                </svg>
                                <p class="text-sm">Belum ada berita terkait</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection