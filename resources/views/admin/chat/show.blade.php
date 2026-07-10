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

{{-- Custom Confirmation Modal --}}
<div id="confirm-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm transition-opacity duration-300 opacity-0"></div>
    
    {{-- Modal Content --}}
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 max-w-md w-full mx-4 overflow-hidden transform scale-95 opacity-0 transition-all duration-300 relative z-10 p-6 space-y-6">
        <div class="flex items-start gap-4">
            <div class="p-3 bg-red-50 text-red-600 rounded-full flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div class="space-y-1.5">
                <h3 class="text-lg font-bold text-gray-900">Tutup Sesi Chat</h3>
                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menutup sesi percakapan ini? Tindakan ini akan mengakhiri obrolan dengan pengguna.</p>
            </div>
        </div>
        
        <div class="flex justify-end gap-3">
            <button id="btn-cancel-close" 
                    class="px-4 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-200">
                Batal
            </button>
            <button id="btn-confirm-close" 
                    class="px-5 py-2 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-xl shadow-sm hover:shadow-md transition-all duration-200">
                Ya, Tutup Sesi
            </button>
        </div>
    </div>
</div>
@endsection

@include('admin.chat.partials.message-bubble', ['msg' => null, 'template_only' => true])

@push('scripts')
<script>
const SESSION_ID     = '{{ $session->id }}';
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

// Tutup sesi dengan Custom Modal
const confirmModal = document.getElementById('confirm-modal');
const modalContent = confirmModal.querySelector('.bg-white');
const backdrop = confirmModal.querySelector('.absolute');
const closeBtn = document.getElementById('close-session-btn');
const cancelBtn = document.getElementById('btn-cancel-close');
const confirmBtn = document.getElementById('btn-confirm-close');

function openConfirmModal() {
    confirmModal.classList.remove('hidden');
    // Trigger transition
    setTimeout(() => {
        backdrop.classList.replace('opacity-0', 'opacity-100');
        modalContent.classList.replace('scale-95', 'scale-100');
        modalContent.classList.replace('opacity-0', 'opacity-100');
    }, 20);
}

function closeConfirmModal() {
    backdrop.classList.replace('opacity-100', 'opacity-0');
    modalContent.classList.replace('scale-100', 'scale-95');
    modalContent.classList.replace('opacity-100', 'opacity-0');
    setTimeout(() => {
        confirmModal.classList.add('hidden');
    }, 300);
}

closeBtn?.addEventListener('click', openConfirmModal);
cancelBtn?.addEventListener('click', closeConfirmModal);

confirmBtn?.addEventListener('click', async () => {
    confirmBtn.disabled = true;
    confirmBtn.innerText = 'Menutup...';
    try {
        const res = await fetch(`/admin/chat/${SESSION_ID}/close`, {
            method: 'PUT',
            headers: {'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
        });
        const data = await res.json();
        if (data.success) {
            window.location.href = '{{ route("admin.chat.index") }}';
        }
    } catch (e) {
        alert('Gagal menutup sesi. Silakan coba lagi.');
        confirmBtn.disabled = false;
        confirmBtn.innerText = 'Ya, Tutup Sesi';
        closeConfirmModal();
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
