@extends('layouts.admin')

@section('title', 'Tambah Visi & Misi - Admin Panel')
@section('page-title', 'Tambah Visi & Misi')
@section('page-description', 'Buat konten visi & misi baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Tambah Visi & Misi</h2>
        <p class="text-gray-500 mt-1 text-sm">Buat konten visi & misi baru untuk ditampilkan di website</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ route('admin.visimisi.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all outline-none"
                       placeholder="Masukkan judul">
                @error('title')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Visi -->
            <div>
                <label for="visi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Visi <span class="text-red-500">*</span>
                </label>
                <textarea name="visi" id="visi" rows="6" required
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all outline-none resize-y"
                          placeholder="Tulis visi di sini...">{{ old('visi') }}</textarea>
                @error('visi')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Misi -->
            <div>
                <label for="misi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Misi <span class="text-red-500">*</span>
                </label>
                <textarea name="misi" id="misi" rows="6" required
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all outline-none resize-y"
                          placeholder="Tulis misi di sini...">{{ old('misi') }}</textarea>
                @error('misi')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Konten Tambahan</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all outline-none resize-y"
                          placeholder="Konten tambahan (opsional)">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select name="status" id="status" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all outline-none bg-white">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.visimisi.index') }}" 
                   class="px-5 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 rounded-lg bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-semibold hover:from-teal-700 hover:to-cyan-700 transition-all shadow-md hover:shadow-lg">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Visi & Misi
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

