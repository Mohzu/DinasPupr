@extends('layouts.admin')

@section('title', 'Edit Layanan - Admin Panel')
@section('page-title', 'Edit Layanan')
@section('page-description', 'Ubah data layanan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Edit Layanan</h2>
        <p class="text-gray-500 mt-1 text-sm">Ubah data layanan "{{ $layanan->nama_layanan }}"</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.layanan.update', $layanan) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Layanan -->
            <div>
                <label for="nama_layanan" class="block text-sm font-semibold text-gray-700 mb-2">Nama Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="nama_layanan" id="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none"
                       placeholder="Contoh: KRK, PKKPR, Peil Banjir">
                @error('nama_layanan')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi Singkat -->
            <div>
                <label for="deskripsi_singkat" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                <input type="text" name="deskripsi_singkat" id="deskripsi_singkat" value="{{ old('deskripsi_singkat', $layanan->deskripsi_singkat) }}" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none"
                       placeholder="Deskripsi singkat untuk card di halaman depan">
                @error('deskripsi_singkat')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                @enderror
            </div>

            <!-- Penjelasan Detail -->
            <div>
                <label for="penjelasan_detail" class="block text-sm font-semibold text-gray-700 mb-2">Penjelasan Detail</label>
                <textarea name="penjelasan_detail" id="penjelasan_detail" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y"
                          placeholder="Penjelasan lengkap tentang layanan ini">{{ old('penjelasan_detail', $layanan->penjelasan_detail) }}</textarea>
            </div>

            <!-- Alur Pelayanan -->
            <div>
                <label for="alur" class="block text-sm font-semibold text-gray-700 mb-2">Alur Pelayanan</label>
                <textarea name="alur" id="alur" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y"
                          placeholder="Tulis setiap langkah alur di baris baru">{{ old('alur', $layanan->alur) }}</textarea>
            </div>

            <!-- Persyaratan -->
            <div>
                <label for="persyaratan" class="block text-sm font-semibold text-gray-700 mb-2">Persyaratan</label>
                <textarea name="persyaratan" id="persyaratan" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y"
                          placeholder="Tulis setiap persyaratan di baris baru">{{ old('persyaratan', $layanan->persyaratan) }}</textarea>
            </div>

            <!-- Urutan Tampil -->
            <div>
                <label for="urutan" class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $layanan->urutan) }}" min="0"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none">
            </div>

            <!-- File Dokumen -->
            <div>
                <label for="file_dokumen" class="block text-sm font-semibold text-gray-700 mb-2">File Dokumen</label>
                @if($layanan->file_dokumen)
                    <div class="mb-3 flex items-center gap-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>
                        <span class="text-sm text-blue-700 font-medium flex-1">{{ basename($layanan->file_dokumen) }}</span>
                        <a href="{{ asset('storage/' . $layanan->file_dokumen) }}" target="_blank" class="text-xs text-blue-600 hover:underline">Lihat</a>
                        <label class="flex items-center gap-1 text-xs text-red-600 cursor-pointer">
                            <input type="checkbox" name="remove_file" value="1" class="rounded"> Hapus
                        </label>
                    </div>
                @endif
                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file_dokumen" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500"><span>Upload file baru</span><input type="file" name="file_dokumen" id="file_dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx" class="sr-only"></label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX, XLS, XLSX hingga 10MB</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.layanan.index') }}" class="px-5 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all shadow-md hover:shadow-lg">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Perbarui Layanan
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
