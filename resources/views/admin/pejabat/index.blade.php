@extends('layouts.admin')

@section('title', 'Pejabat Struktural - Admin Panel')
@section('page-title', 'Pejabat Struktural')
@section('page-description', 'Kelola pejabat struktural')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Daftar Pejabat Struktural</h2>
            <p class="text-gray-500 mt-1 text-sm">
                Total: <span class="font-semibold text-gray-700">{{ $pejabatStrukturals->total() }}</span> pejabat
            </p>
        </div>

        <a href="{{ route('admin.pejabat.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Pejabat</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
        <form method="GET" action="{{ route('admin.pejabat.index') }}" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="flex-1 px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500" 
                   placeholder="Cari nama atau jabatan...">
            <select name="aktif" class="px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                <option value="">Semua Status</option>
                <option value="1" {{ request('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ request('aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            <button type="submit" class="px-6 py-2 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition-all">Cari</button>
            <a href="{{ route('admin.pejabat.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition-all">Reset</a>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-cyan-50 to-cyan-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Urutan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($pejabatStrukturals as $pejabat)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                @if($pejabat->foto)
                                    <img src="{{ asset('storage/' . $pejabat->foto) }}" alt="{{ $pejabat->nama }}" 
                                         class="w-16 h-16 object-cover rounded-full">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-full"></div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">{{ $pejabat->nama }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($pejabat->jabatan, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $pejabat->urutan }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $pejabat->aktif ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $pejabat->aktif ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.pejabat.edit', $pejabat) }}" 
                                       class="p-2 rounded-lg bg-cyan-50 text-cyan-600 hover:bg-cyan-100 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" onclick="openDeleteModal('{{ route('admin.pejabat.destroy', $pejabat) }}', 'Apakah Anda yakin ingin menghapus pejabat &quot;{{ $pejabat->nama }}&quot;? Tindakan ini tidak dapat dibatalkan.')"
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($pejabatStrukturals->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">{{ $pejabatStrukturals->links() }}</div>
        @endif
    </div>
</div>
@endsection


