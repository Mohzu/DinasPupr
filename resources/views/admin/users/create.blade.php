@extends('layouts.admin')

@section('title', 'Tambah Admin Baru - Admin Panel')
@section('page-title', 'Tambah Admin Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-3 bg-white rounded-xl p-4 sm:p-6 shadow-sm border border-gray-100">
        <a href="{{ route('admin.users.index') }}" class="p-2 text-gray-500 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-lg font-bold text-gray-900">Tambah Akun Administrator</h1>
            <p class="text-xs text-gray-500 mt-0.5">Daftarkan akun admin baru untuk staf atau pimpinan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-250 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm @error('name') border-red-500 @enderror"
                       placeholder="Masukkan nama lengkap admin...">
                @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-250 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm @error('email') border-red-500 @enderror"
                       placeholder="Masukkan alamat email resmi...">
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div class="space-y-2">
                <label for="role" class="block text-sm font-semibold text-gray-700">Tingkat Akses (Role)</label>
                <select name="role" id="role" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-250 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm bg-white @error('role') border-red-500 @enderror">
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Staf Operator)</option>
                    <option value="kepala_dinas" {{ old('role') === 'kepala_dinas' ? 'selected' : '' }}>Kepala Dinas (Super Admin)</option>
                </select>
                @error('role')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi (Password)</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-250 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm @error('password') border-red-500 @enderror"
                       placeholder="Minimal 8 karakter...">
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-250 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm"
                       placeholder="Ulangi kata sandi...">
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-sm transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition-all shadow-sm hover:shadow">
                    Simpan Admin
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
