@extends('layouts.admin')

@section('title', 'Detail Kontak - Admin Panel')
@section('page-title', 'Detail Kontak')
@section('page-description', 'Lihat detail pesan kontak')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 lg:p-8 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between pb-6 border-b border-gray-200">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $kontak->subjek }}</h2>
                <p class="text-sm text-gray-600 mt-1">Diterima: {{ $kontak->created_at->format('d M Y, H:i') }}</p>
            </div>
            <span class="px-4 py-2 text-sm font-semibold rounded-full 
                {{ $kontak->status == 'baru' ? 'bg-blue-100 text-blue-700' : '' }}
                {{ $kontak->status == 'dibalas' ? 'bg-purple-100 text-purple-700' : '' }}
                {{ $kontak->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                {{ ucfirst($kontak->status) }}
            </span>
        </div>

        <!-- Informasi Pengirim -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Pengirim</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Nama</p>
                    <p class="font-semibold text-gray-800">{{ $kontak->nama }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-semibold text-gray-800">{{ $kontak->email }}</p>
                </div>
                @if($kontak->nomor_telepon)
                    <div>
                        <p class="text-sm text-gray-600">Nomor Telepon</p>
                        <p class="font-semibold text-gray-800">{{ $kontak->nomor_telepon }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Isi Pesan -->
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-4">Isi Pesan</h3>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <p class="text-gray-700 whitespace-pre-wrap">{{ $kontak->pesan }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.kontak.index') }}" 
               class="px-6 py-3 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition-all">
                Kembali
            </a>
            <a href="{{ route('admin.kontak.edit', $kontak) }}" 
               class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl">
                Ubah Status
            </a>
        </div>
    </div>
</div>
@endsection


