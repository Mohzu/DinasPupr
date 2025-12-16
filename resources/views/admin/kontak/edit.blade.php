@extends('layouts.admin')

@section('title', 'Edit Status Kontak - Admin Panel')
@section('page-title', 'Edit Status Kontak')
@section('page-description', 'Ubah status pesan kontak')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-sky-500 text-white rounded-3xl shadow-2xl p-6 sm:p-8 space-y-5">
        <div class="space-y-2">
            <p class="uppercase tracking-[0.25em] text-xs font-semibold text-white/80">Pesan Kontak</p>
            <h2 class="text-2xl sm:text-3xl font-bold leading-snug">{{ $kontak->subjek }}</h2>
        </div>
        <div class="flex flex-wrap gap-4 text-sm sm:text-base">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-white/15 flex items-center justify-center font-bold text-white text-lg">
                    {{ Str::upper(Str::substr($kontak->nama, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold">{{ $kontak->nama }}</p>
                    <p class="text-white/80">{{ $kontak->email }}</p>
                </div>
            </div>
            @if($kontak->nomor_telepon)
                <div class="flex items-center gap-2 text-white/90">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3l2 5-2.5 1a11 11 0 005 5l1-2.5 5 2v3a2 2 0 01-2 2h-1C9.82 19 5 14.18 5 8V7a2 2 0 00-2-2z"/>
                    </svg>
                    {{ $kontak->nomor_telepon }}
                </div>
            @endif
            <span class="ml-auto px-4 py-1.5 rounded-full bg-white/20 text-white font-semibold text-sm">
                {{ ucfirst($kontak->status) }}
            </span>
        </div>
        <div class="flex flex-wrap gap-4 text-white/80 text-sm">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7"/>
                </svg>
                Diterima: {{ $kontak->created_at->format('d M Y, H:i') }}
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
                </svg>
                Terakhir diperbarui: {{ $kontak->updated_at->format('d M Y, H:i') }}
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-8 space-y-8">
        <div class="grid sm:grid-cols-2 gap-4">
            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">
                <p class="text-sm text-gray-500 mb-1">Email</p>
                <p class="font-semibold text-gray-800 break-all">{{ $kontak->email }}</p>
            </div>
            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">
                <p class="text-sm text-gray-500 mb-1">Status Saat Ini</p>
                <p class="font-semibold text-gray-800">{{ ucfirst($kontak->status) }}</p>
            </div>
        </div>

        <div>
            <p class="text-sm text-gray-500 mb-2">Isi Pesan</p>
            <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 text-gray-700 leading-relaxed whitespace-pre-line">
                {{ $kontak->pesan }}
            </div>
        </div>

        <form action="{{ route('admin.kontak.update', $kontak) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Ubah Status <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-indigo-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span>
                    <select name="status" id="status" required
                            class="w-full pl-12 pr-4 py-3 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 bg-white text-gray-800 font-medium">
                        <option value="baru" {{ old('status', $kontak->status) == 'baru' ? 'selected' : '' }}>Baru</option>
                        <option value="dibalas" {{ old('status', $kontak->status) == 'dibalas' ? 'selected' : '' }}>Dibalas</option>
                        <option value="selesai" {{ old('status', $kontak->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap items-center justify-end gap-4 pt-4 border-t border-dashed border-gray-200">
                <a href="{{ route('admin.kontak.index') }}" 
                   class="px-6 py-3 rounded-2xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">
                    Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 rounded-2xl bg-gradient-to-r from-indigo-500 via-blue-500 to-sky-500 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-[1.01] transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


