{{-- ============================================================
     SAPA PUPR Garut — Widget Chatbot Floating (Frontend)
     Disematkan di layouts/app.blade.php via @include
     ============================================================ --}}

{{-- Floating Chat Button --}}
<div id="sapa-chat-wrapper" class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">

    {{-- Notification Badge --}}
    <div id="sapa-new-badge"
         class="hidden bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg animate-bounce">
        1 pesan baru
    </div>

    {{-- Chat Window --}}
    <div id="sapa-chatbox"
         class="hidden flex-col bg-white shadow-2xl overflow-hidden border border-gray-100"
         style="width: 360px; max-width: calc(100vw - 2rem); height: 520px; max-height: calc(100vh - 100px); border-radius: 1rem;">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-4 py-3 flex items-center gap-3 flex-shrink-0">
            <div class="relative">
                <img src="{{ asset('img/sapa_pupr.png') }}" alt="SAPA PUPR Garut" class="w-10 h-10 rounded-full object-cover border-2 border-white/20 bg-white">
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full" id="sapa-status-dot"></span>
            </div>
            <div class="flex-1">
                <p class="text-white font-bold text-sm leading-tight">SAPA PUPR Garut</p>
                <p class="text-blue-100 text-xs" id="sapa-status-text">AI • Siap membantu</p>
            </div>
            <button id="sapa-close-btn" class="text-white/70 hover:text-white transition-colors p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        @guest
        {{-- Pre-chat Form --}}
        <div id="sapa-prechat-form" class="hidden flex-col justify-center p-6 bg-gradient-to-b from-blue-50/70 to-white flex-1 overflow-y-auto">
            <div class="text-center mb-5">
                <div class="w-16 h-16 mx-auto mb-3 animate-bounce shadow-lg shadow-blue-500/20 rounded-2xl overflow-hidden bg-white">
                    <img src="{{ asset('img/sapa_pupr.png') }}" alt="SAPA PUPR Garut" class="w-full h-full object-cover">
                </div>
                <h3 class="text-lg font-bold text-gray-800">Mulai Percakapan</h3>
                <p class="text-xs text-gray-500 mt-1 leading-relaxed px-4">
                    Silakan isi Nama dan Email Anda untuk terhubung dengan asisten virtual <strong>SAPA PUPR Garut</strong>.
                </p>
            </div>
            <form id="sapa-form-start" class="space-y-4">
                <div>
                    <label for="sapa-form-name" class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="sapa-form-name" required placeholder="Contoh: Budi Santoso"
                           class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50/50 transition-all">
                </div>
                <div>
                    <label for="sapa-form-email" class="block text-xs font-semibold text-gray-600 mb-1.5">Alamat Email <span class="text-red-500">*</span></label>
                    <input type="email" id="sapa-form-email" required placeholder="Contoh: budi@gmail.com"
                           class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50/50 transition-all">
                </div>
                <button type="submit" id="sapa-form-submit"
                        class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-md hover:shadow-lg mt-2 flex items-center justify-center gap-2">
                    <span>Mulai Chat</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>
        @endguest

        {{-- Messages Area --}}
        <div id="sapa-messages"
             class="flex flex-col flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50"
             style="scroll-behavior: smooth;">

            {{-- Welcome bubble (static) --}}
            <div class="flex items-end gap-2">
                <img src="{{ asset('img/sapa_pupr.png') }}" alt="AI" class="w-7 h-7 rounded-full object-cover flex-shrink-0 bg-white border border-gray-200">
                <div class="bg-white rounded-2xl rounded-bl-none px-4 py-3 shadow-sm max-w-[85%]">
                    <p class="text-gray-800 text-sm leading-relaxed">
                        Selamat datang di <strong>SAPA PUPR Garut</strong>! 👋<br>
                        Saya siap membantu informasi seputar Dinas PUPR Kabupaten Garut.<br>
                        Silakan ketik pertanyaan Anda.
                    </p>
                    <span class="text-gray-400 text-[10px] block mt-1 text-right">
                        {{ now()->format('H:i') }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Verification Buttons (hidden by default) --}}
        <div id="sapa-verify-buttons" class="hidden px-4 py-2 flex gap-2 bg-white border-t border-gray-100 flex-shrink-0">
            <button id="sapa-btn-ya"
                    class="flex-1 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-sm">
                ✅ Ya, Selesai
            </button>
            <button id="sapa-btn-tidak"
                    class="flex-1 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-sm">
                ❌ Tidak, ke Admin
            </button>
        </div>

        {{-- Typing Indicator --}}
        <div id="sapa-typing" class="hidden px-4 pb-2 flex-shrink-0">
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/sapa_pupr.png') }}" alt="AI" class="w-7 h-7 rounded-full object-cover flex-shrink-0 bg-white border border-gray-200">
                <div class="bg-white rounded-2xl rounded-bl-none px-4 py-3 shadow-sm">
                    <div class="flex gap-1 items-center">
                        <span class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay:0ms"></span>
                        <span class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay:150ms"></span>
                        <span class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay:300ms"></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Input Area --}}
        <div class="px-3 py-3 bg-white border-t border-gray-100 flex-shrink-0" id="sapa-input-area">
            <div class="flex gap-2 items-end">
                <textarea id="sapa-input"
                          rows="1"
                          placeholder="Tulis pertanyaan Anda..."
                          class="flex-1 px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none bg-gray-50"
                          style="max-height: 80px;"
                          maxlength="1000"></textarea>
                <button id="sapa-send-btn"
                        class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm flex-shrink-0 disabled:opacity-50"
                        disabled>
                    <svg class="w-4 h-4 rotate-90" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Floating Button --}}
    <button id="sapa-toggle-btn"
            class="w-16 h-16 bg-white hover:bg-gray-50 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 ring-4 ring-blue-500/30 overflow-hidden">
        <img id="sapa-icon-chat" src="{{ asset('img/sapa_pupr.png') }}" alt="SAPA PUPR Garut" class="w-full h-full object-cover">
        <svg id="sapa-icon-close" class="w-7 h-7 hidden text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>

@push('scripts')
<script>
    window.SapaChatConfig = {
        routes: {
            start: @json(route('chat.start')),
            message: @json(route('chat.message')),
            verify: @json(route('chat.verify')),
            session: function(token) { return `/chat/session/${token}`; }
        },
        auth: {
            isGuest: @json(auth()->guest()),
            userName: @json(auth()->user()?->name ?? null),
            userEmail: @json(auth()->user()?->email ?? null)
        },
        assets: {
            avatar: @json(asset('img/sapa_pupr.png'))
        }
    };
</script>
@vite('resources/js/chatbot.js')
@endpush
