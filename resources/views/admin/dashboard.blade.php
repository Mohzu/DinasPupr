@extends('layouts.admin')

@section('title', 'Dashboard Admin - Dinas PUPR Kabupaten Garut')
@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan data dan statistik')

@section('content')
<div class="space-y-6" x-data="dashboardData()" x-init="loadData()">
    <!-- Loading State -->
    <div x-show="loading" class="text-center py-12">
        <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
        <p class="mt-4 text-gray-600">Memuat data...</p>
    </div>

    <!-- Content -->
    <div x-show="!loading" class="space-y-6">
        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Berita -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-lg border border-blue-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600 mb-1">Total Berita</p>
                        <p class="text-3xl font-bold text-blue-900" x-text="stats?.berita || 0"></p>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-blue-500 flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-lg border border-green-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-600 mb-1">Total Pengumuman</p>
                        <p class="text-3xl font-bold text-green-900" x-text="stats?.pengumuman || 0"></p>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-green-500 flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Dokumen -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 shadow-lg border border-purple-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-purple-600 mb-1">Total Dokumen</p>
                        <p class="text-3xl font-bold text-purple-900" x-text="stats?.dokumen || 0"></p>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-purple-500 flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pengaduan -->
            <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-6 shadow-lg border border-amber-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-amber-600 mb-1">Total Pengaduan</p>
                        <p class="text-3xl font-bold text-amber-900" x-text="stats?.pengaduan?.total || 0"></p>
                        <p class="text-xs text-amber-700 mt-1" x-text="`${stats?.pengaduan?.baru || 0} baru`"></p>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-amber-500 flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Pengaduan & Kontak -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Pengaduan Status -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Status Pengaduan</h2>
                    <a href="/admin/pengaduan" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua →</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-xl bg-amber-50 border border-amber-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-amber-500 flex items-center justify-center text-white font-bold" x-text="stats?.pengaduan?.baru || 0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Baru</p>
                                <p class="text-sm text-gray-600">Menunggu ditangani</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl bg-blue-50 border border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-blue-500 flex items-center justify-center text-white font-bold" x-text="stats?.pengaduan?.diproses || 0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Diproses</p>
                                <p class="text-sm text-gray-600">Sedang ditangani</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl bg-green-50 border border-green-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-green-500 flex items-center justify-center text-white font-bold" x-text="stats?.pengaduan?.selesai || 0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Selesai</p>
                                <p class="text-sm text-gray-600">Sudah ditangani</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak Status -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Status Kontak</h2>
                    <a href="/admin/kontak" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua →</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-xl bg-blue-50 border border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-blue-500 flex items-center justify-center text-white font-bold" x-text="stats?.kontak?.baru || 0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Baru</p>
                                <p class="text-sm text-gray-600">Menunggu dibalas</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl bg-purple-50 border border-purple-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-purple-500 flex items-center justify-center text-white font-bold" x-text="stats?.kontak?.dibalas || 0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Dibalas</p>
                                <p class="text-sm text-gray-600">Sudah dibalas</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl bg-green-50 border border-green-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-green-500 flex items-center justify-center text-white font-bold" x-text="stats?.kontak?.selesai || 0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Selesai</p>
                                <p class="text-sm text-gray-600">Sudah selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Terbaru -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Pengaduan Terbaru -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Pengaduan Terbaru</h2>
                    <a href="/admin/pengaduan" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua →</a>
                </div>
                <div class="space-y-3">
                    <template x-for="item in recentPengaduan" :key="item.id">
                        <div class="p-4 rounded-xl border border-gray-200 hover:border-amber-300 hover:bg-amber-50 transition-all duration-200">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800" x-text="item.subjek"></p>
                                    <p class="text-sm text-gray-600 mt-1" x-text="`${item.nama} • ${item.email}`"></p>
                                    <p class="text-xs text-gray-500 mt-2" x-text="new Date(item.created_at).toLocaleDateString('id-ID')"></p>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full" 
                                    :class="{
                                        'bg-amber-100 text-amber-700': item.status === 'baru',
                                        'bg-blue-100 text-blue-700': item.status === 'diproses',
                                        'bg-green-100 text-green-700': item.status === 'selesai'
                                    }"
                                    x-text="item.status.charAt(0).toUpperCase() + item.status.slice(1)">
                                </span>
                            </div>
                        </div>
                    </template>
                    <p x-show="recentPengaduan.length === 0" class="text-gray-500 text-center py-4">Tidak ada pengaduan</p>
                </div>
            </div>

            <!-- Kontak Terbaru -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Kontak Terbaru</h2>
                    <a href="/admin/kontak" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua →</a>
                </div>
                <div class="space-y-3">
                    <template x-for="item in recentKontak" :key="item.id">
                        <div class="p-4 rounded-xl border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition-all duration-200">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800" x-text="item.subjek"></p>
                                    <p class="text-sm text-gray-600 mt-1" x-text="`${item.nama} • ${item.email}`"></p>
                                    <p class="text-xs text-gray-500 mt-2" x-text="new Date(item.created_at).toLocaleDateString('id-ID')"></p>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full"
                                    :class="{
                                        'bg-blue-100 text-blue-700': item.status === 'baru',
                                        'bg-purple-100 text-purple-700': item.status === 'dibalas',
                                        'bg-green-100 text-green-700': item.status === 'selesai'
                                    }"
                                    x-text="item.status.charAt(0).toUpperCase() + item.status.slice(1)">
                                </span>
                            </div>
                        </div>
                    </template>
                    <p x-show="recentKontak.length === 0" class="text-gray-500 text-center py-4">Tidak ada kontak</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function dashboardData() {
    return {
        loading: true,
        stats: {},
        recentPengaduan: [],
        recentKontak: [],
        
        async loadData() {
            try {
                const response = await fetch('/api/admin/dashboard', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin'
                });
                
                if (!response.ok) {
                    throw new Error('Failed to load dashboard data');
                }
                
                const result = await response.json();
                
                if (result.success) {
                    this.stats = result.data.stats;
                    this.recentPengaduan = result.data.recent_pengaduan || [];
                    this.recentKontak = result.data.recent_kontak || [];
                }
            } catch (error) {
                console.error('Error loading dashboard:', error);
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>
@endsection


