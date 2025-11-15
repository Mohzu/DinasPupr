@extends('layouts.admin')

@section('title', 'Kontak - Admin Panel')
@section('page-title', 'Kontak')
@section('page-description', 'Kelola pesan kontak')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-900">Daftar Kontak</h2>
        <p class="text-gray-500 mt-1 text-sm">Total: <span class="font-semibold text-gray-700">{{ $stats['total'] }}</span> pesan</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 shadow-sm border border-blue-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-blue-600 mb-1">Baru</p>
                    <p class="text-3xl font-bold text-blue-900">{{ $stats['baru'] }}</p>
                </div>
                <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl p-5 shadow-sm border border-purple-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-purple-600 mb-1">Dibalas</p>
                    <p class="text-3xl font-bold text-purple-900">{{ $stats['dibalas'] }}</p>
                </div>
                <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-purple-500 to-violet-500 flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 shadow-sm border border-green-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-green-600 mb-1">Selesai</p>
                    <p class="text-3xl font-bold text-green-900">{{ $stats['selesai'] }}</p>
                </div>
                <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">Total</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                </div>
                <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-gray-500 to-slate-500 flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
        <form method="GET" action="{{ route('admin.kontak.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" 
                       placeholder="Cari nama, email, subjek...">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none bg-white">
                    <option value="">Semua Status</option>
                    <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="dibalas" {{ request('status') == 'dibalas' ? 'selected' : '' }}>Dibalas</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 px-4 py-2.5 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all shadow-sm">
                    Filter
                </button>
                <a href="{{ route('admin.kontak.index') }}" class="px-4 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Subjek</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kontaks as $kontak)
                        <tr class="table-row-hover transition-all">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-900">{{ $kontak->nama }}</p>
                                @if($kontak->nomor_telepon)
                                    <p class="text-sm text-gray-500 mt-0.5">{{ $kontak->nomor_telepon }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-600">{{ $kontak->email }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-900">{{ Str::limit($kontak->subjek, 40) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $kontak->status == 'baru' ? 'bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-700 border border-blue-200' : '' }}
                                    {{ $kontak->status == 'dibalas' ? 'bg-gradient-to-r from-purple-100 to-violet-100 text-purple-700 border border-purple-200' : '' }}
                                    {{ $kontak->status == 'selesai' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 border border-green-200' : '' }}">
                                    {{ ucfirst($kontak->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 font-medium">
                                    {{ $kontak->created_at->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.kontak.show', $kontak) }}" 
                                       class="p-2 rounded-lg bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-600 hover:from-blue-100 hover:to-indigo-100 transition-all shadow-sm hover:shadow">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.kontak.edit', $kontak) }}" 
                                       class="p-2 rounded-lg bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-600 hover:from-blue-100 hover:to-indigo-100 transition-all shadow-sm hover:shadow">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" onclick="openDeleteModal('{{ route('admin.kontak.destroy', $kontak) }}', 'Apakah Anda yakin ingin menghapus pesan kontak dari &quot;{{ $kontak->nama }}&quot;? Tindakan ini tidak dapat dibatalkan.')"
                                            class="p-2 rounded-lg bg-gradient-to-r from-red-50 to-rose-50 text-red-600 hover:from-red-100 hover:to-rose-100 transition-all shadow-sm hover:shadow">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <div class="h-20 w-20 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center mb-4">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-lg font-semibold text-gray-600">Tidak ada kontak</p>
                                    <p class="text-sm mt-1 text-gray-500">Belum ada pesan kontak yang masuk</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($kontaks->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                {{ $kontaks->links() }}
            </div>
        @endif
    </div>
</div>
@endsection


