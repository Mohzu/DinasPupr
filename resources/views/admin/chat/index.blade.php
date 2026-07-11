@extends('layouts.admin')

@section('title', 'Chat Dashboard - SAPA PUPR Garut')

@section('content')
<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">💬 SAPA Chat Dashboard</h1>
            <p class="text-gray-500 text-sm mt-1">Monitor & tangani sesi Live Chat Hybrid secara real-time</p>
        </div>
        {{-- Real-time indicator --}}
        <div class="flex items-center gap-2 bg-green-50 border border-green-200 rounded-lg px-4 py-2">
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
            <span class="text-green-700 text-sm font-medium">Real-time aktif</span>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <p class="text-gray-500 text-xs font-medium">Total Sesi</p>
            <p class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow-sm border border-blue-100">
            <p class="text-blue-600 text-xs font-medium">Mode Bot</p>
            <p class="text-2xl font-bold text-blue-700 mt-1">{{ $stats['bot'] }}</p>
        </div>
        <div class="bg-orange-50 rounded-xl p-4 shadow-sm border border-orange-100">
            <p class="text-orange-600 text-xs font-medium flex items-center gap-1">
                Butuh Admin
                @if($stats['human'] > 0)
                    <span class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                @endif
            </p>
            <p class="text-2xl font-bold text-orange-700 mt-1">{{ $stats['human'] }}</p>
        </div>
        <div class="bg-green-50 rounded-xl p-4 shadow-sm border border-green-100">
            <p class="text-green-600 text-xs font-medium">Selesai</p>
            <p class="text-2xl font-bold text-green-700 mt-1">{{ $stats['closed'] }}</p>
        </div>
        <div class="bg-red-50 rounded-xl p-4 shadow-sm border border-red-100 col-span-2 sm:col-span-1">
            <p class="text-red-600 text-xs font-medium">Belum Dibaca</p>
            <p class="text-2xl font-bold text-red-700 mt-1">{{ $stats['unread'] }}</p>
        </div>
    </div>

    {{-- Filter Tabs --}}
    <div class="flex gap-2 flex-wrap">
        @foreach(['all' => 'Semua', 'human' => '🔴 Butuh Admin', 'bot' => '🤖 Mode Bot', 'closed' => '✅ Selesai'] as $val => $label)
            <a href="{{ request()->fullUrlWithQuery(['status' => $val]) }}"
               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
               {{ request('status', 'all') === $val
                   ? 'bg-blue-600 text-white shadow-sm'
                   : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    {{-- Sessions Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($sessions->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <div class="text-5xl mb-3">💬</div>
                <p class="font-medium">Belum ada sesi chat</p>
                <p class="text-sm mt-1">Sesi dari masyarakat akan muncul di sini</p>
            </div>
        @else
            <div class="admin-table-wrapper">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengguna</th>
                            <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesan Terakhir</th>
                            <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Waktu</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($sessions as $session)
                            <tr class="hover:bg-gray-50 transition-colors duration-150 {{ $session->status === 'human' ? 'bg-orange-50/50' : '' }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                            {{ strtoupper(substr($session->user_name ?? 'A', 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800 text-sm">{{ $session->user_name ?? 'Anonim' }}</p>
                                            @if($session->user_email)
                                                <p class="text-gray-400 text-xs">{{ $session->user_email }}</p>
                                            @endif
                                        </div>
                                        @if($session->unread_count > 0)
                                            <span class="px-2 py-0.5 text-xs bg-red-500 text-white rounded-full font-bold">
                                                {{ $session->unread_count }} baru
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($session->status === 'bot')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span> Bot AI
                                        </span>
                                    @elseif($session->status === 'human')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700 animate-pulse">
                                            <span class="w-1.5 h-1.5 bg-orange-500 rounded-full"></span> Butuh Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Selesai
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-gray-600 text-sm truncate max-w-xs">
                                        {{ Str::limit($session->messages->first()?->message ?? '-', 60) }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-gray-400 text-xs">{{ $session->created_at->diffForHumans() }}</p>
                                    @if($session->transferred_at)
                                        <p class="text-orange-400 text-xs">Transfer: {{ $session->transferred_at->format('H:i') }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.chat.show', $session->id) }}"
                                       class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg transition-colors duration-200">
                                        {{ $session->status === 'human' ? '💬 Balas' : 'Lihat' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $sessions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
// Real-time notifikasi sesi baru masuk via Reverb
if (window.Echo) {
    window.Echo.channel('admin-chat-notifications')
        .listen('.chat.transferred', (e) => {
            // Tampilkan toast notifikasi
            showAdminToast(e.session);
            // Update counter
            const badge = document.querySelector('.text-red-700');
            if (badge) badge.textContent = parseInt(badge.textContent || 0) + 1;
        });
}

function showAdminToast(session) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 z-50 bg-orange-500 text-white px-5 py-4 rounded-xl shadow-2xl flex items-start gap-3 max-w-sm animate-bounce';
    toast.innerHTML = `
        <div class="text-2xl">🔔</div>
        <div class="flex-1">
            <p class="font-bold text-sm">Sesi chat baru butuh admin!</p>
            <p class="text-orange-100 text-xs mt-0.5">${session.user_name}: ${(session.last_message || '').substring(0, 60)}...</p>
            <a href="${session.admin_url}" class="mt-2 inline-block text-xs bg-white text-orange-600 font-bold px-3 py-1 rounded-lg">Tangani Sekarang →</a>
        </div>
        <button onclick="this.parentElement.remove()" class="text-orange-100 hover:text-white text-lg">×</button>
    `;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 10000);
}
</script>
@endpush
