@extends('layouts.app')

@section('title', $pengumuman->judul)
@section('description', Str::limit(strip_tags($pengumuman->isi), 150))

@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen bg-gray-50">
    <section class="mt-24 mb-12">
        <div class="container mx-auto px-6 max-w-4xl">
            <a href="{{ route('pengumuman') }}" class="inline-flex items-center gap-2 text-blue-600 hover:underline mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                Kembali ke daftar pengumuman
            </a>

            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $pengumuman->judul }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-8">
                    <span>{{ optional($pengumuman->published_at)->format('d M Y, H:i') }}</span>
                    @if ($pengumuman->penulis)
                        <span>• Penulis: {{ $pengumuman->penulis }}</span>
                    @endif
                    @if ($pengumuman->lampiran)
                        <a class="inline-flex items-center gap-1 text-blue-600 hover:underline" href="{{ Storage::disk('public')->url($pengumuman->lampiran) }}" target="_blank" rel="noopener">Lihat Lampiran</a>
                    @endif
                </div>
                <div class="prose max-w-none">
                    {!! $pengumuman->isi !!}
                </div>
            </article>
        </div>
    </section>
</div>
@endsection