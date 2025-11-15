@extends('layouts.admin')

@section('title', 'Detail Pengaduan - Admin Panel')
@section('page-title', 'Detail Pengaduan')
@section('page-description', 'Lihat detail pengaduan')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 lg:p-8 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between pb-6 border-b border-gray-200">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $pengaduan->subjek }}</h2>
                <p class="text-sm text-gray-600 mt-1">Diterima: {{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
            </div>
            <span class="px-4 py-2 text-sm font-semibold rounded-full 
                {{ $pengaduan->status == 'baru' ? 'bg-amber-100 text-amber-700' : '' }}
                {{ $pengaduan->status == 'diproses' ? 'bg-blue-100 text-blue-700' : '' }}
                {{ $pengaduan->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                {{ ucfirst($pengaduan->status) }}
            </span>
        </div>

        <!-- Informasi Pengadu -->
        <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-6 border border-amber-200">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Pengadu</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Nama</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->nama }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->email }}</p>
                </div>
                @if($pengaduan->telepon)
                    <div>
                        <p class="text-sm text-gray-600">Telepon</p>
                        <p class="font-semibold text-gray-800">{{ $pengaduan->telepon }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Isi Pengaduan -->
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-4">Isi Pengaduan</h3>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <p class="text-gray-700 whitespace-pre-wrap">{{ $pengaduan->pesan }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.pengaduan.index') }}" 
               class="px-6 py-3 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition-all">
                Kembali
            </a>
            <a href="{{ route('admin.pengaduan.edit', $pengaduan) }}" 
               class="px-6 py-3 rounded-xl bg-amber-600 text-white font-semibold hover:bg-amber-700 transition-all shadow-lg hover:shadow-xl">
                Ubah Status
            </a>
        </div>
    </div>
</div>
@endsection


