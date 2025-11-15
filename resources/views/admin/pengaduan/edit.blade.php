@extends('layouts.admin')

@section('title', 'Edit Status Pengaduan - Admin Panel')
@section('page-title', 'Edit Status Pengaduan')
@section('page-description', 'Ubah status pengaduan')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 lg:p-8">
        <form action="{{ route('admin.pengaduan.update', $pengaduan) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Info Pengaduan -->
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="font-semibold text-gray-800 mb-2">{{ $pengaduan->subjek }}</h3>
                <p class="text-sm text-gray-600">Dari: {{ $pengaduan->nama }} ({{ $pengaduan->email }})</p>
                <p class="text-sm text-gray-600 mt-1">Diterima: {{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                <select name="status" id="status" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    <option value="baru" {{ old('status', $pengaduan->status) == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ old('status', $pengaduan->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ old('status', $pengaduan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.pengaduan.index') }}" 
                   class="px-6 py-3 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition-all">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 rounded-xl bg-amber-600 text-white font-semibold hover:bg-amber-700 transition-all shadow-lg hover:shadow-xl">
                    Update Status
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


