@extends('layouts.admin')

@section('title', 'Pengumuman - Admin Panel')
@section('page-title', 'Pengumuman')
@section('page-description', 'Kelola pengumuman')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Daftar Pengumuman</h2>
            <p class="text-gray-500 mt-1 text-sm">Total: <span class="font-semibold text-gray-700">{{ $pengumumans->total() }}</span> pengumuman</p>
        </div>
        <a href="{{ route('admin.pengumuman.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Pengumuman</span>
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
        <form method="GET" action="{{ route('admin.pengumuman.index') }}" class="flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="flex-1 px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all outline-none" 
                   placeholder="Cari judul atau isi...">
            <button type="submit" class="px-5 py-2.5 rounded-lg bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold hover:from-green-700 hover:to-emerald-700 transition-all shadow-sm">
                Cari
            </button>
            <a href="{{ route('admin.pengumuman.index') }}" class="px-5 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">
                Reset
            </a>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-green-50 via-emerald-50 to-green-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal Publikasi</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pengumumans as $pengumuman)
                        <tr class="table-row-hover transition-all">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-900 mb-1">{{ Str::limit($pengumuman->judul, 60) }}</p>
                                <p class="text-sm text-gray-500">{{ Str::limit(strip_tags($pengumuman->isi), 80) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center text-white text-xs font-bold">
                                        {{ strtoupper(substr($pengumuman->penulis, 0, 1)) }}
                                    </div>
                                    <span class="text-sm text-gray-700 font-medium">{{ $pengumuman->penulis }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 font-medium">
                                    {{ $pengumuman->published_at ? $pengumuman->published_at->format('d M Y, H:i') : '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}" 
                                       class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50 text-green-600 hover:from-green-100 hover:to-emerald-100 transition-all shadow-sm hover:shadow">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" onclick="openDeleteModal('{{ route('admin.pengumuman.destroy', $pengumuman) }}', 'Apakah Anda yakin ingin menghapus pengumuman &quot;{{ Str::limit($pengumuman->judul, 50) }}&quot;? Tindakan ini tidak dapat dibatalkan.')"
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
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <div class="h-20 w-20 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center mb-4">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                        </svg>
                                    </div>
                                    <p class="text-lg font-semibold text-gray-600">Tidak ada pengumuman</p>
                                    <p class="text-sm mt-1 text-gray-500">Mulai dengan menambahkan pengumuman baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pengumumans->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                {{ $pengumumans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection


