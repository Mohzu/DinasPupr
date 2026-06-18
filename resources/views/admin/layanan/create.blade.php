@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin Panel')
@section('page-title', 'Tambah Layanan')
@section('page-description', 'Buat layanan baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Tambah Layanan</h2>
        <p class="text-gray-500 mt-1 text-sm">Tambahkan layanan publik baru untuk ditampilkan di website</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama Layanan -->
            <div>
                <label for="nama_layanan" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Layanan <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_layanan" id="nama_layanan" value="{{ old('nama_layanan') }}" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none"
                       placeholder="Contoh: KRK, PKKPR, Peil Banjir">
                @error('nama_layanan')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Deskripsi Singkat -->
            <div>
                <label for="deskripsi_singkat" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Singkat <span class="text-red-500">*</span>
                </label>
                <input type="text" name="deskripsi_singkat" id="deskripsi_singkat" value="{{ old('deskripsi_singkat') }}" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none"
                       placeholder="Deskripsi singkat untuk card di halaman depan">
                @error('deskripsi_singkat')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Penjelasan Detail -->
            <div>
                <label for="penjelasan_detail" class="block text-sm font-semibold text-gray-700 mb-2">Penjelasan Detail</label>
                <textarea name="penjelasan_detail" id="penjelasan_detail" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y"
                          placeholder="Penjelasan lengkap tentang layanan ini">{{ old('penjelasan_detail') }}</textarea>
                @error('penjelasan_detail')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Alur Pelayanan -->
            <div>
                <label for="alur" class="block text-sm font-semibold text-gray-700 mb-2">Alur Pelayanan</label>
                <textarea name="alur" id="alur" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y"
                          placeholder="Tulis setiap langkah alur di baris baru. Contoh:&#10;1. Pemohon mengajukan permohonan&#10;2. Verifikasi berkas&#10;3. Survey lapangan">{{ old('alur') }}</textarea>
                @error('alur')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Persyaratan -->
            <div>
                <label for="persyaratan" class="block text-sm font-semibold text-gray-700 mb-2">Persyaratan</label>
                <textarea name="persyaratan" id="persyaratan" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y"
                          placeholder="Tulis setiap persyaratan di baris baru. Contoh:&#10;- Fotokopi KTP&#10;- Surat permohonan&#10;- Gambar denah">{{ old('persyaratan') }}</textarea>
                @error('persyaratan')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Warna -->
                <div>
                    <label for="warna" class="block text-sm font-semibold text-gray-700 mb-2">
                        Warna Tema <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center gap-3">
                        <input type="color" name="warna" id="warna" value="{{ old('warna', '#3b82f6') }}"
                               class="w-12 h-10 rounded-lg border border-gray-200 cursor-pointer">
                        <input type="text" id="warna_text" value="{{ old('warna', '#3b82f6') }}" readonly
                               class="flex-1 px-4 py-2.5 rounded-lg border border-gray-200 bg-gray-50 text-gray-600 font-mono text-sm outline-none">
                    </div>
                    @error('warna')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Urutan -->
                <div>
                    <label for="urutan" class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" min="0"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none">
                </div>
            </div>

            <!-- Ikon SVG -->
            <div>
                <label for="ikon" class="block text-sm font-semibold text-gray-700 mb-2">Ikon (SVG Tag)</label>
                <textarea name="ikon" id="ikon" rows="3"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none resize-y font-mono text-sm"
                          placeholder='<svg xmlns="http://www.w3.org/2000/svg" ...>...</svg>'>{{ old('ikon') }}</textarea>
                <p class="mt-1 text-xs text-gray-400">Paste kode SVG untuk ikon layanan. Kosongkan untuk menggunakan ikon default.</p>
            </div>

            <!-- File Dokumen -->
            <div>
                <label for="file_dokumen" class="block text-sm font-semibold text-gray-700 mb-2">File Dokumen (Opsional)</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file_dokumen" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                <span>Upload file</span>
                                <input type="file" name="file_dokumen" id="file_dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx" class="sr-only">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX, XLS, XLSX hingga 10MB</p>
                    </div>
                </div>
                @error('file_dokumen')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.layanan.index') }}" class="px-5 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all shadow-md hover:shadow-lg">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Simpan Layanan
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('warna').addEventListener('input', function() {
        document.getElementById('warna_text').value = this.value;
    });
</script>
@endpush
@endsection
