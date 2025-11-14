@extends('layouts.app')

@section('title', $pengumuman->judul)
@section('description', Str::limit(strip_tags($pengumuman->isi), 150))

@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Hero -->
    <section class="relative mt-20 mb-10">
        <div class="absolute inset-0 -z-10 h-48 bg-gradient-to-r from-amber-400 via-amber-300 to-yellow-300"></div>
        <div class="container mx-auto px-6">
            <div class="bg-white/90 backdrop-blur rounded-2xl shadow-sm border border-amber-100 p-6 md:p-8">
                <a href="{{ route('pengumuman') }}" class="inline-flex items-center gap-2 text-blue-700 hover:text-blue-80 hover:underline mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    Kembali ke daftar pengumuman
                </a>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">{{ $pengumuman->judul }}</h1>
                <div class="mt-3 flex flex-wrap items-center gap-3 text-sm">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-700 border border-gray-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ optional($pengumuman->published_at)->translatedFormat('d M Y, H:i') }}
                    </span>
                    @if ($pengumuman->penulis)
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-700 border border-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $pengumuman->penulis }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="mb-16">
        <div class="container mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8">
            <article class="lg:col-span-8 bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sm:p-6 md:p-10">
                <div class="prose max-w-none prose-headings:font-extrabold prose-p:leading-relaxed prose-a:text-amber-700">
                    {!! $pengumuman->isi !!}
                </div>
            </article>

            <aside class="lg:col-span-4 space-y-4 sm:space-y-6">
                @if ($pengumuman->lampiran)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-900 mb-4">Lampiran</h2>
                        <a href="{{ Storage::disk('public')->url($pengumuman->lampiran) }}"
                           download="{{ basename($pengumuman->lampiran) }}"
                           class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-amber-300 hover:bg-amber-50/50 transition">
                            <span class="flex items-center justify-center w-12 h-12 rounded-lg bg-amber-100 text-amber-700">
                                <!-- Document Icon -->
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"></path>
                                    <path class="text-amber-800" fill="currentColor" d="M14 3.5V8a1 1 0 001 1h4.5"></path>
                                </svg>
                            </span>
                            <div class="flex-1">
                                <p class="font-medium text-gray-900 group-hover:text-amber-800 truncate">{{ basename($pengumuman->lampiran) }}</p>
                                <p class="text-sm text-gray-500">Klik untuk mengunduh</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M7 10l5 5m0 0l5-5m-5 5V4" /></svg>
                        </a>
                    </div>
                @endif
            </aside>
        </div>
    </section>
</div>
@endsection