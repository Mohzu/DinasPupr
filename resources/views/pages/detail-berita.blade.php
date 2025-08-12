@extends('layouts.app')

@section('title', $berita->judul)
@section('description', Str::limit(strip_tags($berita->isi), 150))

@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
    <!-- Breadcrumb -->
    <nav class="container mx-auto px-6 pt-24 text-sm" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-gray-500">
            <li><a href="{{ route('home') }}" class="hover:text-blue-700">Beranda</a></li>
            <li>/</li>
            <li><a href="{{ route('berita') }}" class="hover:text-blue-700">Berita</a></li>
            <li>/</li>
            <li class="text-gray-700 line-clamp-1">{{ $berita->judul }}</li>
        </ol>
    </nav>

    <!-- Hero Title & Meta -->
    <section class="relative pb-6 overflow-hidden">
        <div class="absolute -top-12 -right-12 w-72 h-72 bg-blue-200/40 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-12 w-96 h-96 bg-indigo-200/40 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-6">
            <div class="bg-white/90 backdrop-blur rounded-3xl shadow-sm border border-blue-100 p-6 md:p-8">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        @if ($berita->kategori)
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100 text-xs font-semibold">
                                {{ strtoupper($berita->kategori) }}
                            </span>
                        @endif
                        <span class="inline-flex items-center gap-2 text-gray-600 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ optional($berita->published_at ?? $berita->created_at)->translatedFormat('d M Y, H:i') }}
                        </span>
                    </div>
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-blue-700 hover:text-blue-800 hover:underline">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                        Kembali
                    </a>
                </div>
                <h1 class="mt-3 text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">{{ $berita->judul }}</h1>
                <div class="mt-3 flex flex-wrap items-center gap-4 text-sm">
                    @if ($berita->penulis)
                        <div class="flex items-center gap-2 text-gray-700">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-blue-400 text-white grid place-items-center font-bold">{{ strtoupper(Str::substr($berita->penulis, 0, 1)) }}</div>
                            <span>{{ $berita->penulis }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image + Content -->
    <section>
        <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-8">
            <article class="lg:col-span-8">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    @if ($berita->gambar)
                        <img src="{{ Storage::disk('public')->url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto object-cover max-h-[520px]">
                    @endif
                    <div class="p-6 md:p-10">
                        <div class="prose prose-lg max-w-none prose-headings:font-extrabold prose-p:leading-relaxed prose-a:text-blue-700 prose-img:rounded-xl prose-blockquote:border-blue-500">
                            {!! $berita->isi !!}
                        </div>
                    </div>
                </div>

                <!-- Prev / Next Navigation -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if(isset($previous))
                    <a href="{{ route('berita.show', $previous->slug ?? $previous->id) }}" class="group block p-4 rounded-2xl border border-gray-100 bg-white hover:shadow-md transition">
                        <p class="text-xs text-gray-500 mb-1">Artikel Sebelumnya</p>
                        <p class="font-semibold text-gray-900 group-hover:text-blue-700 line-clamp-2">{{ $previous->judul }}</p>
                    </a>
                    @endif
                    @if(isset($next))
                    <a href="{{ route('berita.show', $next->slug ?? $next->id) }}" class="group block p-4 rounded-2xl border border-gray-100 bg-white hover:shadow-md transition md:text-right">
                        <p class="text-xs text-gray-500 mb-1">Artikel Selanjutnya</p>
                        <p class="font-semibold text-gray-900 group-hover:text-blue-700 line-clamp-2">{{ $next->judul }}</p>
                    </a>
                    @endif
                </div>

                <!-- Related -->
                @if(isset($related) && $related->isNotEmpty())
                <div class="mt-10">
                    <h2 class="text-xl font-extrabold text-gray-900 mb-4">Berita Terkait</h2>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($related as $item)
                        <a href="{{ route('berita.show', $item->slug ?? $item->id) }}" class="group block bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-36 object-cover">
                            @endif
                            <div class="p-4">
                                <p class="text-xs text-gray-500 mb-1">{{ optional($item->published_at ?? $item->created_at)->translatedFormat('d M Y') }}</p>
                                <h3 class="text-sm font-semibold text-gray-900 group-hover:text-blue-700 line-clamp-2">{{ $item->judul }}</h3>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </article>

            <aside class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-base font-semibold text-gray-900 mb-4">Informasi</h2>
                    <ul class="space-y-2 text-sm text-gray-700">
                        @if ($berita->kategori)
                        <li><span class="font-medium">Kategori:</span> {{ $berita->kategori }}</li>
                        @endif
                        <li><span class="font-medium">Penulis:</span> {{ $berita->penulis ?? 'PUPR Garut' }}</li>
                        <li><span class="font-medium">Dipublikasikan:</span> {{ optional($berita->published_at ?? $berita->created_at)->translatedFormat('d M Y, H:i') }}</li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-base font-semibold text-gray-900 mb-4">Bagikan</h3>
                    <div class="flex gap-2">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="px-3 py-2 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Facebook</a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}" class="px-3 py-2 rounded-xl bg-sky-500 text-white text-sm font-semibold hover:bg-sky-600">Twitter/X</a>
                        <a target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul.' '.request()->fullUrl()) }}" class="px-3 py-2 rounded-xl bg-emerald-500 text-white text-sm font-semibold hover:bg-emerald-600">WhatsApp</a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</div>
@endsection