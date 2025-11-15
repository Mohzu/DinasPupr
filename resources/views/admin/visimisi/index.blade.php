@extends('layouts.admin')

@section('title', 'Visi & Misi - Admin Panel')
@section('page-title', 'Visi & Misi')
@section('page-description', 'Kelola konten visi & misi')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Daftar Visi & Misi</h2>
            <p class="text-gray-500 mt-1 text-sm">
                Total: <span class="font-semibold text-gray-700">{{ $visiMisis->total() }}</span> konten
            </p>
        </div>
        <a href="{{ route('admin.visimisi.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Visi & Misi</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
        <form method="GET" action="{{ route('admin.visimisi.index') }}" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="flex-1 px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" 
                   placeholder="Cari judul...">
            <select name="status" class="px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                <option value="">Semua Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            <button type="submit" class="px-6 py-2 rounded-xl bg-teal-600 text-white font-semibold hover:bg-teal-700 transition-all">Cari</button>
            <a href="{{ route('admin.visimisi.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition-all">Reset</a>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($visiMisis as $visiMisi)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">{{ Str::limit($visiMisi->title, 60) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $visiMisi->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ ucfirst($visiMisi->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $visiMisi->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.visimisi.edit', $visiMisi) }}" 
                                       class="p-2 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-100 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" onclick="openDeleteModal('{{ route('admin.visimisi.destroy', $visiMisi) }}', 'Apakah Anda yakin ingin menghapus visi & misi ini? Tindakan ini tidak dapat dibatalkan.')"
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
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($visiMisis->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">{{ $visiMisis->links() }}</div>
        @endif
    </div>
</div>
@endsection


