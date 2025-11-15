@extends('layouts.admin')

@section('title', 'Struktur Organisasi - Admin Panel')
@section('page-title', 'Struktur Organisasi')
@section('page-description', 'Kelola struktur organisasi')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Daftar Struktur Organisasi</h2>
            <p class="text-gray-500 mt-1 text-sm">
                Total: <span class="font-semibold text-gray-700">{{ $strukturOrganisasis->total() }}</span> konten
            </p>
        </div>

        <a href="{{ route('admin.struktur.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-rose-600 text-white font-semibold hover:bg-rose-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Struktur</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
        <form method="GET" action="{{ route('admin.struktur.index') }}" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="flex-1 px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500" 
                   placeholder="Cari judul...">
            <select name="status" class="px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <option value="">Semua Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            <button type="submit" class="px-6 py-2 rounded-xl bg-rose-600 text-white font-semibold hover:bg-rose-700 transition-all">Cari</button>
            <a href="{{ route('admin.struktur.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition-all">Reset</a>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-rose-50 to-rose-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($strukturOrganisasis as $struktur)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">{{ Str::limit($struktur->title, 50) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($struktur->gambar)
                                    <img src="{{ asset('storage/' . $struktur->gambar) }}" alt="{{ $struktur->title }}" 
                                         class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-lg"></div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $struktur->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ ucfirst($struktur->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $struktur->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.struktur.edit', $struktur) }}" 
                                       class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" onclick="openDeleteModal('{{ route('admin.struktur.destroy', $struktur) }}', 'Apakah Anda yakin ingin menghapus struktur organisasi ini? Tindakan ini tidak dapat dibatalkan.')"
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
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($strukturOrganisasis->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">{{ $strukturOrganisasis->links() }}</div>
        @endif
    </div>
</div>
@endsection


