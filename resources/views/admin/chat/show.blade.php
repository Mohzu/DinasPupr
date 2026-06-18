@extends('layouts.admin')

@section('title', 'Detail Sesi Chat #' . $session->id)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.chat.index') }}"
           class="p-2 text-gray-500 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div class="flex-1">
            <h1 class="text-xl font-bold text-gray-900">
                Sesi Chat #{{ $session->id }}
                <span class="text-base font-normal text-gray-500">— {{ $session->user_name ?? 'Anonim' }}</span>
            </h1>
            <div class="flex items-center gap-3 mt-1">
                @if($session->status === 'bot')
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">🤖 Bot AI</span>
                @elseif($session->status === 'human')
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-700">👤 Dengan Admin</span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">✅ Selesai</span>
                @endif
                <span class="text-gray-400 text-xs">Dimulai {{ $session->created_at->format('d M Y, H:i') }}</span>
                @if($session->transferred_at)
                    <span class="text-orange-400 text-xs">Transfer: {{ $session->transferred_at->format('H:i') }}</span>
                @endif
            </div>
        </div>
        @if($session->status !== 'closed')
            <button id="close-session-btn"
                    data-session-id="{{ $session->id }}"
                    class="px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 text-sm font-medium rounded-lg transition-colors">
                Tutup Sesi
            </button>
        @endif
    </div>

    {{-- Chat Window --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col"
         style="height: 520px;">

        {{-- Chat Header --}}
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-5 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center text-white font-bold">
                {{ strtoupper(substr($session->user_name ?? 'A', 0, 1)) }}
            </div>
            <div>
                <p class="text-white font-semibold text-sm">{{ $session->user_name ?? 'Anonim' }}</p>
                <p class="text-blue-100 text-xs">{{ $session->user_email ?? 'Email tidak disebutkan' }}</p>
            </div>
            <div class="ml-auto flex items-center gap-1.5" id="session-live-indicator">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-blue-100 text-xs">Live</span>
            </div>
        </div>

        {{-- Messages --}}
        <div id="admin-chat-messages" class="flex-1 overflow-y-auto p-5 space-y-4 bg-gray-50">
            @foreach($session->messages as $msg)
                @include('admin.chat.partials.message-bubble', ['msg' => $msg])
            @endforeach
        </div>

        {{-- Reply Form (only if not closed) --}}
        @if($session->status !== 'closed')
            <div class="px-4 py-3 bg-white border-t border-gray-100">
                <div class="flex gap-3 items-end">
                    <textarea id="admin-reply-input"
                              rows="2"
                              placeholder="Tulis balasan Anda sebagai admin PUPR..."
                              class="flex-1 px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none bg-gray-50"
                              style="max-height: 100px;"
                              maxlength="2000"></textarea>
                    <button id="admin-reply-btn"
                            class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-sm whitespace-nowrap flex-shrink-0 disabled:opacity-50"
                            disabled>
                        Kirim Balasan
                    </button>
                </div>
                <p class="text-gray-400 text-xs mt-2 px-1">Tekan Enter untuk baris baru. Balasan akan dikirim secara real-time ke pengguna.</p>
            </div>
        @else
            <div class="px-4 py-4 bg-gray-50 border-t border-gray-100 text-center">
                <p class="text-gray-400 text-sm">Sesi ini sudah ditutup pada {{ $session->closed_at?->format('d M Y, H:i') }}</p>
            </div>
        @endif
    </div>
</div>
@endsection

@include('admin.chat.partials.message-bubble', ['msg' => null, 'template_only' => true])

@push('scripts')
<script>
const SESSION_ID     = {{ $session->id }};
const SESSION_TOKEN  = '{{ $session->session_token }}';
const SESSION_STATUS = '{{ $session->status }}';
const CSRF           = document.querySelector('meta[name="csrf-token"]').content;

const messagesEl  = document.getElementById('admin-chat-messages');
const replyInput  = document.getElementById('admin-reply-input');
const replyBtn    = document.getElementById('admin-reply-btn');

// Scroll ke bawah on load
setTimeout(() => { messagesEl.scrollTop = messagesEl.scrollHeight; }, 100);

// Enable/disable kirim button
replyInput?.addEventListener('input', () => {
    replyBtn.disabled = replyInput.value.trim().length === 0;
});

// Kirim balasan admin
replyBtn?.addEventListener('click', sendAdminReply);
replyInput?.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && e.ctrlKey) sendAdminReply();
});

async function sendAdminReply() {
    const msg = replyInput.value.trim();
    if (!msg) return;

    replyBtn.disabled = true;
    replyInput.disabled = true;

    try {
        const response = await fetch(`/admin/chat/${SESSION_ID}/reply`, {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
            body: JSON.stringify({ message: msg }),
        });
        const data = await response.json();

        if (data.success) {
            replyInput.value = '';
            appendAdminBubble(data.message);
        }
    } catch (e) {
        alert('Gagal mengirim balasan. Silakan coba lagi.');
    } finally {
        replyInput.disabled = false;
        replyBtn.disabled = true;
        replyInput.focus();
    }
}

// Tutup sesi
document.getElementById('close-session-btn')?.addEventListener('click', async () => {
    if (!confirm('Tutup sesi chat ini?')) return;

    const res = await fetch(`/admin/chat/${SESSION_ID}/close`, {
        method: 'PUT',
        headers: {'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
    });
    const data = await res.json();
    if (data.success) {
        window.location.href = '{{ route("admin.chat.index") }}';
    }
});

// Real-time: terima pesan user via Reverb
if (window.Echo) {
    window.Echo.channel(`chat.${SESSION_TOKEN}`)
        .listen('.message.sent', (e) => {
            if (e.message.sender_type === 'user') {
                appendUserBubble(e.message);
            }
        });
}

function appendAdminBubble(msg) {
    const html = `
        <div class="flex justify-end gap-2">
            <div class="bg-blue-600 text-white rounded-2xl rounded-br-none px-4 py-3 shadow-sm max-w-lg">
                <p class="text-sm leading-relaxed">${escapeHtml(msg.message)}</p>
                <span class="text-blue-100 text-[10px] block mt-1 text-right">${msg.created_at} · Admin</span>
            </div>
            <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                ADM
            </div>
        </div>`;
    messagesEl.insertAdjacentHTML('beforeend', html);
    messagesEl.scrollTop = messagesEl.scrollHeight;
}

function appendUserBubble(msg) {
    const html = `
        <div class="flex items-end gap-2">
            <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-xs font-bold flex-shrink-0">U</div>
            <div class="bg-white text-gray-800 rounded-2xl rounded-bl-none px-4 py-3 shadow-sm max-w-lg border border-gray-100">
                <p class="text-sm leading-relaxed">${escapeHtml(msg.message)}</p>
                <span class="text-gray-400 text-[10px] block mt-1">${msg.created_at}</span>
            </div>
        </div>`;
    messagesEl.insertAdjacentHTML('beforeend', html);
    messagesEl.scrollTop = messagesEl.scrollHeight;
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.appendChild(document.createTextNode(text));
    return div.innerHTML.replace(/\n/g, '<br>');
}
</script>
@endpush
