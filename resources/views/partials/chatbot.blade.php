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
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white text-lg font-bold">
                    🤖
                </div>
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
                <div class="w-16 h-16 bg-gradient-to-tr from-blue-600 to-blue-500 rounded-3xl mx-auto flex items-center justify-center text-white text-3xl shadow-lg shadow-blue-500/20 mb-3 animate-bounce">
                    🤖
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
                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs flex-shrink-0">
                    <span>AI</span>
                </div>
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
                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs flex-shrink-0">
                    <span>AI</span>
                </div>
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
            class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 ring-4 ring-blue-500/30">
        <svg id="sapa-icon-chat" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
        </svg>
        <svg id="sapa-icon-close" class="w-7 h-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>

@push('scripts')
<script>
(function() {
    // =============================================
    // State & Config
    // =============================================
    const CSRF = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
    let sessionToken = sessionStorage.getItem('sapa_session_token') ?? null;
    let sessionStatus = 'bot';
    let isOpen = false;
    let echoInstance = null;
    // Flag: apakah user sudah pernah memulai sesi (dalam tab ini)
    // Jika true, chatbox tidak akan kembali ke form nama/email
    let sessionEverStarted = !!sessionToken || !!sessionStorage.getItem('sapa_guest_name');

    const isGuest = @json(auth()->guest());
    const authUserName = @json(auth()->user()?->name ?? null);
    const authUserEmail = @json(auth()->user()?->email ?? null);

    // Timer configs
    const VERIFICATION_DELAY = 30000; // 30 seconds (30000 ms)
    const AUTO_CLOSE_DELAY = 300000; // 5 minutes (300000 ms)
    let verificationTimer = null;
    let autoCloseTimer = null;

    // =============================================
    // DOM Refs
    // =============================================
    const chatbox       = document.getElementById('sapa-chatbox');
    const toggleBtn     = document.getElementById('sapa-toggle-btn');
    const closeBtn      = document.getElementById('sapa-close-btn');
    const messagesEl    = document.getElementById('sapa-messages');
    const inputEl       = document.getElementById('sapa-input');
    const sendBtn       = document.getElementById('sapa-send-btn');
    const typingEl      = document.getElementById('sapa-typing');
    const verifyBtns    = document.getElementById('sapa-verify-buttons');
    const btnYa         = document.getElementById('sapa-btn-ya');
    const btnTidak      = document.getElementById('sapa-btn-tidak');
    const statusText    = document.getElementById('sapa-status-text');
    const statusDot     = document.getElementById('sapa-status-dot');
    const newBadge      = document.getElementById('sapa-new-badge');
    const inputArea     = document.getElementById('sapa-input-area');
    const prechatForm   = document.getElementById('sapa-prechat-form');

    // =============================================
    // Timer Functions
    // =============================================
    function resetTimers() {
        if (verificationTimer) clearTimeout(verificationTimer);
        if (autoCloseTimer) clearTimeout(autoCloseTimer);
        verificationTimer = null;
        autoCloseTimer = null;
    }

    function scheduleVerification(lastMsgTimestamp) {
        resetTimers();
        
        // Hanya jadwalkan jika status sesi adalah 'bot'
        if (sessionStatus !== 'bot') return;

        let delay = VERIFICATION_DELAY;
        if (lastMsgTimestamp) {
            const elapsed = Date.now() - lastMsgTimestamp;
            delay = VERIFICATION_DELAY - elapsed;
        }

        if (delay <= 0) {
            showVerificationPrompt();
        } else {
            verificationTimer = setTimeout(() => {
                showVerificationPrompt();
            }, delay);
        }
    }

    function showVerificationPrompt() {
        if (sessionStatus !== 'bot') return;
        
        // Cegah double render
        if (document.getElementById('sapa-verification-bubble')) return;

        const time = formatTime(new Date());
        const promptText = "Apakah informasi ini sudah cukup membantu? Silakan tekan tombol [Ya] jika kendala Anda selesai, atau [Tidak] jika ingin terhubung ke Admin.";
        
        const html = `
            <div id="sapa-verification-bubble" class="flex items-end gap-2 animate-fade-in">
                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-white text-[10px] font-bold flex-shrink-0">
                    AI
                </div>
                <div class="bg-white text-gray-800 rounded-2xl rounded-bl-none px-4 py-3 shadow-sm max-w-[85%] border border-blue-100">
                    <div class="text-sm leading-relaxed prose-sm">${formatMarkdown(promptText)}</div>
                    <span class="text-[10px] block mt-1 text-gray-400 text-right">${time}</span>
                </div>
            </div>`;
        
        messagesEl.insertAdjacentHTML('beforeend', html);
        scrollToBottom();

        showVerifyButtons(true);

        // Mulai timer tutup otomatis
        autoCloseTimer = setTimeout(() => {
            handleVerify(true); // Tutup sesi secara otomatis jika tidak ada aksi
        }, AUTO_CLOSE_DELAY);
    }

    function showChatScreen(active) {
        if (active) {
            if (prechatForm) prechatForm.classList.add('hidden');
            messagesEl.classList.remove('hidden');
            inputArea.classList.remove('hidden');
        } else {
            if (prechatForm) {
                prechatForm.classList.remove('hidden');
                prechatForm.classList.add('flex');
            }
            messagesEl.classList.add('hidden');
            inputArea.classList.add('hidden');
            verifyBtns.classList.add('hidden');
            typingEl.classList.add('hidden');
        }
    }

    // =============================================
    // Toggle Chat
    // =============================================
    toggleBtn.addEventListener('click', () => {
        isOpen = !isOpen;
        chatbox.classList.toggle('hidden', !isOpen);
        chatbox.classList.toggle('flex', isOpen);
        document.getElementById('sapa-icon-chat').classList.toggle('hidden', isOpen);
        document.getElementById('sapa-icon-close').classList.toggle('hidden', !isOpen);
        newBadge.classList.add('hidden');
        if (isOpen) {
            // Tampilkan form HANYA jika user belum pernah memulai sesi sama sekali di tab ini
            if (sessionToken || !isGuest || sessionEverStarted) {
                showChatScreen(true);
                scrollToBottom();
                if (sessionToken) {
                    inputEl.focus();
                    resumeSession();
                }
            } else {
                showChatScreen(false);
            }
        }
    });

    closeBtn.addEventListener('click', () => {
        isOpen = false;
        chatbox.classList.add('hidden');
        chatbox.classList.remove('flex');
        document.getElementById('sapa-icon-chat').classList.remove('hidden');
        document.getElementById('sapa-icon-close').classList.add('hidden');
    });

    // =============================================
    // Input Handling
    // =============================================
    inputEl.addEventListener('input', () => {
        sendBtn.disabled = inputEl.value.trim().length === 0;
        // Auto resize textarea
        inputEl.style.height = 'auto';
        inputEl.style.height = Math.min(inputEl.scrollHeight, 80) + 'px';
    });

    inputEl.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            if (!sendBtn.disabled) sendMessage();
        }
    });

    sendBtn.addEventListener('click', sendMessage);

    // =============================================
    // Kirim Pesan
    // =============================================
    async function sendMessage() {
        const msg = inputEl.value.trim();
        if (!msg) return;

        resetTimers(); // Hentikan timer yang sedang berjalan saat user mengirim pesan baru
        inputEl.value = '';
        inputEl.style.height = 'auto';
        sendBtn.disabled = true;

        // Tampilkan bubble user
        appendBubble('user', msg, formatTime(new Date()));
        showTyping(true);

        try {
            let response;
            if (!sessionToken) {
                // Sesi baru (Hanya untuk user yang login, karena guest memakai form prechat)
                const bodyData = { message: msg };
                if (!isGuest) {
                    bodyData.user_name = authUserName;
                    bodyData.user_email = authUserEmail;
                }
                response = await fetch('{{ route("chat.start") }}', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
                    body: JSON.stringify(bodyData),
                });
            } else {
                // Sesi existing
                response = await fetch('{{ route("chat.message") }}', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
                    body: JSON.stringify({ session_token: sessionToken, message: msg }),
                });
            }

            const data = await response.json();
            showTyping(false);

            if (data.success) {
                if (data.session_token) {
                    sessionToken = data.session_token;
                    sessionStorage.setItem('sapa_session_token', sessionToken);
                    // Subscribe ke Reverb channel
                    subscribeToChannel(sessionToken);
                }

                sessionStatus = data.session_status;
                updateStatusUI();

                if (data.bot_reply) {
                    appendBubble('bot', data.bot_reply.message, data.bot_reply.created_at);
                    // Jadwalkan verifikasi setelah bot menjawab
                    scheduleVerification(data.bot_reply.timestamp);
                }

                // Jika dari start session, tampilkan semua messages
                if (data.messages) {
                    // Clear default welcome dan tampilkan dari server
                    clearMessages();
                    data.messages.forEach(m => appendBubble(m.sender_type, m.message, m.created_at));
                    
                    if (data.messages.length > 0) {
                        const lastMsg = data.messages[data.messages.length - 1];
                        if (lastMsg.sender_type === 'bot' && sessionStatus === 'bot') {
                            scheduleVerification(lastMsg.timestamp);
                        }
                    }
            } else {
                alert(data.message || 'Gagal mengirim pesan.');
            }
        } catch (err) {
            showTyping(false);
            appendBubble('bot', 'Mohon maaf, terjadi gangguan koneksi. Silakan coba lagi.', formatTime(new Date()));
        }
    }

    // =============================================
    // Tombol Verifikasi [Ya] / [Tidak]
    // =============================================
    btnYa.addEventListener('click', () => handleVerify(true));
    btnTidak.addEventListener('click', () => handleVerify(false));

    async function handleVerify(satisfied) {
        resetTimers(); // Bersihkan semua timer
        showVerifyButtons(false);
        showTyping(true);

        try {
            const response = await fetch('{{ route("chat.verify") }}', {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
                body: JSON.stringify({ session_token: sessionToken, satisfied }),
            });
            const data = await response.json();
            showTyping(false);

            if (data.success) {
                sessionStatus = data.session_status;
                updateStatusUI();
                appendBubble('bot', data.bot_reply.message, data.bot_reply.created_at);

                if (data.session_status === 'closed') {
                    // Jangan hapus token dari sessionStorage agar user masih bisa membaca riwayat
                    disableInput('Sesi telah selesai. Mulai percakapan baru?');
                    // Tombol mulai baru
                    showRestartButton();
                } else if (data.session_status === 'human') {
                    updateStatusUI();
                }
            } else {
                alert(data.message || 'Sesi tidak valid dan permintaan tidak diproses.');
            }
        } catch (err) {
            showTyping(false);
        }
    }

    // =============================================
    // Resume Sesi
    // =============================================
    async function resumeSession() {
        try {
            const response = await fetch(`/chat/session/${sessionToken}`, {
                headers: {'Accept': 'application/json'},
            });
            const data = await response.json();
            if (data.success) {
                sessionStatus = data.session_status;
                clearMessages();
                data.messages.forEach(m => appendBubble(m.sender_type, m.message, m.created_at));
                updateStatusUI();

                if (data.session_status === 'closed') {
                    disableInput('Sesi telah selesai. Mulai percakapan baru?');
                    showRestartButton();
                } else {
                    subscribeToChannel(sessionToken);
                    
                    // Jadwalkan verifikasi jika pesan terakhir dari bot dan status masih bot
                    if (data.messages && data.messages.length > 0) {
                        const lastMsg = data.messages[data.messages.length - 1];
                        if (lastMsg.sender_type === 'bot' && sessionStatus === 'bot') {
                            scheduleVerification(lastMsg.timestamp);
                        }
                    }
                }
            } else {
                sessionStorage.removeItem('sapa_session_token');
                sessionToken = null;
            }
        } catch (e) {}
    }

    // =============================================
    // Laravel Echo / Reverb WebSocket
    // =============================================
    function subscribeToChannel(token) {
        if (echoInstance || !window.Echo) return;
        echoInstance = window.Echo.channel(`chat.${token}`)
            .listen('.message.sent', (e) => {
                if (!isOpen) {
                    newBadge.classList.remove('hidden');
                }
                if (e.message.sender_type !== 'user') {
                    showTyping(false);
                    appendBubble(e.message.sender_type, e.message.message, e.message.created_at);
                    
                    // Jadwalkan ulang verifikasi jika bot mengirim pesan via ws
                    if (e.message.sender_type === 'bot' && sessionStatus === 'bot') {
                        scheduleVerification(Date.now());
                    }
                }
                sessionStatus = e.session_status;
                updateStatusUI();
            })
            .listen('.admin.replied', (e) => {
                if (!isOpen) newBadge.classList.remove('hidden');
                appendBubble('admin', e.message.message, e.message.created_at);
            });
    }

    // =============================================
    // UI Helpers
    // =============================================
    function appendBubble(senderType, message, time) {
        const isUser   = senderType === 'user';
        const isAdmin  = senderType === 'admin';
        const label    = isUser ? null : (isAdmin ? 'ADM' : 'AI');
        const bubbleColor = isUser ? 'bg-blue-600 text-white' : 'bg-white text-gray-800';
        const bubbleRound = isUser ? 'rounded-2xl rounded-br-none' : 'rounded-2xl rounded-bl-none';
        const wrapAlign   = isUser ? 'justify-end' : 'items-end';

        const avatarHtml = !isUser ? `
            <div class="w-7 h-7 rounded-full ${isAdmin ? 'bg-orange-500' : 'bg-blue-600'} flex items-center justify-center text-white text-[10px] font-bold flex-shrink-0">
                ${label}
            </div>` : '';

        const formattedMsg = formatMarkdown(message);

        const html = `
            <div class="flex ${wrapAlign} gap-2 animate-fade-in">
                ${!isUser ? avatarHtml : ''}
                <div class="${bubbleColor} ${bubbleRound} px-4 py-3 shadow-sm max-w-[85%]">
                    <div class="text-sm leading-relaxed prose-sm">${formattedMsg}</div>
                    <span class="text-[10px] block mt-1 ${isUser ? 'text-blue-100' : 'text-gray-400'} text-right">${time}</span>
                </div>
                ${isUser ? `<div class="w-7 h-7 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-[10px] font-bold flex-shrink-0">U</div>` : ''}
            </div>`;

        messagesEl.insertAdjacentHTML('beforeend', html);
        scrollToBottom();
    }

    function formatMarkdown(text) {
        return text
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<em>$1</em>')
            .replace(/\n/g, '<br>')
            .replace(/\[Ya\]/g, '<span class="font-bold text-green-600">[Ya]</span>')
            .replace(/\[Tidak\]/g, '<span class="font-bold text-red-600">[Tidak]</span>');
    }

    function showTyping(show) {
        typingEl.classList.toggle('hidden', !show);
        typingEl.classList.toggle('flex', show);
        if (show) scrollToBottom();
    }

    function showVerifyButtons(show) {
        verifyBtns.classList.toggle('hidden', !show);
        verifyBtns.classList.toggle('flex', show);
        // Non-aktifkan input saat tombol verifikasi tampil
        inputEl.disabled = show;
        sendBtn.disabled = show;
        if (!show) {
            inputEl.disabled = false;
            inputEl.focus();
        }
    }

    function updateStatusUI() {
        if (sessionStatus === 'human') {
            statusText.textContent = 'Admin • Terhubung ke petugas';
            statusDot.classList.remove('bg-green-400');
            statusDot.classList.add('bg-orange-400');
        } else if (sessionStatus === 'closed') {
            statusText.textContent = 'Sesi selesai';
            statusDot.classList.remove('bg-green-400');
            statusDot.classList.add('bg-gray-400');
        } else {
            statusText.textContent = 'AI • Siap membantu';
            statusDot.classList.add('bg-green-400');
        }
    }

    function disableInput(placeholder) {
        inputEl.disabled = true;
        inputEl.placeholder = placeholder;
        sendBtn.disabled = true;
    }

    function showRestartButton() {
        const restartHtml = `
            <div class="text-center py-2">
                <button id="sapa-restart-btn" class="text-sm text-blue-600 hover:underline font-medium">
                    + Mulai Percakapan Baru
                </button>
            </div>`;
        messagesEl.insertAdjacentHTML('beforeend', restartHtml);
        document.getElementById('sapa-restart-btn')?.addEventListener('click', restartSession);
    }

    function restartSession() {
        sessionStorage.removeItem('sapa_session_token');
        sessionToken = null;
        sessionStatus = 'bot';
        echoInstance = null;
        clearMessages();
        inputEl.disabled = false;
        inputEl.placeholder = 'Tulis pertanyaan Anda...';
        sendBtn.disabled = true;
        showVerifyButtons(false);
        updateStatusUI();

        if (isGuest) {
            // Jika nama & email masih tersimpan, langsung mulai sesi baru tanpa tanya lagi
            const savedName  = sessionStorage.getItem('sapa_guest_name');
            const savedEmail = sessionStorage.getItem('sapa_guest_email');
            if (savedName && savedEmail) {
                showChatScreen(true);
                autoStartGuestSession(savedName, savedEmail);
            } else {
                showChatScreen(false);
            }
        } else {
            showChatScreen(true);
            appendBubble('bot', 'Selamat datang kembali! Ada yang bisa saya bantu? 😊', formatTime(new Date()));
        }
    }

    // Auto-start sesi baru untuk guest yang sudah pernah isi form
    async function autoStartGuestSession(name, email) {
        showTyping(true);
        try {
            const response = await fetch('{{ route("chat.start") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
                body: JSON.stringify({ user_name: name, user_email: email }),
            });
            const data = await response.json();
            showTyping(false);
            if (data.success) {
                sessionToken = data.session_token;
                sessionStorage.setItem('sapa_session_token', sessionToken);
                sessionStatus = data.session_status;
                echoInstance = null;
                subscribeToChannel(sessionToken);
                clearMessages();
                if (data.messages) {
                    data.messages.forEach(m => appendBubble(m.sender_type, m.message, m.created_at));
                    const lastMsg = data.messages[data.messages.length - 1];
                    if (lastMsg && lastMsg.sender_type === 'bot' && sessionStatus === 'bot') {
                        scheduleVerification(lastMsg.timestamp);
                    }
                }
                inputEl.disabled = false;
                inputEl.placeholder = 'Tulis pertanyaan Anda...';
                sendBtn.disabled = true;
                updateStatusUI();
            } else {
                // Jika gagal, fallback ke form
                showChatScreen(false);
            }
        } catch (e) {
            showTyping(false);
            showChatScreen(false);
        }
    }

    // Submit handler untuk Pre-chat form (Guest saja)
    const startForm = document.getElementById('sapa-form-start');
    if (startForm) {
        startForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const nameInput = document.getElementById('sapa-form-name');
            const emailInput = document.getElementById('sapa-form-email');
            const submitBtn = document.getElementById('sapa-form-submit');

            const name = nameInput.value.trim();
            const email = emailInput.value.trim();

            if (!name || !email) return;

            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Menghubungkan...</span>
            `;

            try {
                const response = await fetch('{{ route("chat.start") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        user_name: name,
                        user_email: email
                    }),
                });

                const data = await response.json();

                if (data.success) {
                    sessionToken = data.session_token;
                    sessionStorage.setItem('sapa_session_token', sessionToken);
                    sessionStatus = data.session_status;

                    // Simpan nama & email agar tidak ditanya lagi saat mulai percakapan baru
                    sessionStorage.setItem('sapa_guest_name', name);
                    sessionStorage.setItem('sapa_guest_email', email);

                    // Tandai bahwa user sudah pernah mulai sesi — jangan tampilkan form lagi
                    sessionEverStarted = true;

                    // Reset sesi lama jika ada
                    echoInstance = null;
                    subscribeToChannel(sessionToken);

                    // Bersihkan form
                    nameInput.value = '';
                    emailInput.value = '';

                    // Pastikan input chat aktif kembali (bisa terdisable dari sesi sebelumnya)
                    inputEl.disabled = false;
                    inputEl.placeholder = 'Tulis pertanyaan Anda...';
                    sendBtn.disabled = true;
                    verifyBtns.classList.add('hidden');
                    typingEl.classList.add('hidden');

                    // Transisi ke chat screen
                    showChatScreen(true);
                    clearMessages();

                    // Render semua pesan (termasuk welcome message dari server)
                    if (data.messages) {
                        data.messages.forEach(m => appendBubble(m.sender_type, m.message, m.created_at));
                        if (data.messages.length > 0) {
                            const lastMsg = data.messages[data.messages.length - 1];
                            if (lastMsg.sender_type === 'bot' && sessionStatus === 'bot') {
                                scheduleVerification(lastMsg.timestamp);
                            }
                        }
                    }
                    updateStatusUI();
                } else {
                    alert('Gagal memulai sesi chat. Silakan coba lagi.');
                }
            } catch (err) {
                alert('Terjadi kesalahan koneksi. Silakan coba lagi.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `
                    <span>Mulai Chat</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                `;
            }
        });
    }

    function clearMessages() {
        messagesEl.innerHTML = '';
        resetTimers();
    }

    function scrollToBottom() {
        setTimeout(() => { messagesEl.scrollTop = messagesEl.scrollHeight; }, 50);
    }

    function formatTime(date) {
        return date.toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'});
    }

    // Auto-resume jika ada session tersimpan
    if (sessionToken) {
        // Cek validitas sesi di background
        fetch(`/chat/session/${sessionToken}`, {headers: {'Accept': 'application/json'}})
            .then(r => r.json())
            .then(d => {
                if (!d.success) {
                    sessionStorage.removeItem('sapa_session_token');
                    sessionToken = null;
                    if (isGuest) showChatScreen(false);
                }
            }).catch(() => {});
    }
    // =============================================
    // Mobile Fullscreen
    // =============================================
    function applyMobileFullscreen(open) {
        const isMobile = window.innerWidth < 1024;
        if (isMobile) {
            if (open) {
                chatbox.style.cssText = [
                    'position: fixed',
                    'inset: 0',
                    'width: 100vw',
                    'height: 100dvh',
                    'max-width: 100vw',
                    'max-height: 100dvh',
                    'border-radius: 0',
                    'z-index: 9999',
                    'bottom: 0',
                    'right: 0',
                ].join(';');
                document.body.style.overflow = 'hidden';
            } else {
                chatbox.style.cssText = [
                    'width: 360px',
                    'max-width: calc(100vw - 2rem)',
                    'height: 520px',
                    'max-height: calc(100vh - 100px)',
                    'border-radius: 1rem',
                ].join(';');
                document.body.style.overflow = '';
            }
        } else {
            chatbox.style.cssText = [
                'width: 360px',
                'max-width: calc(100vw - 2rem)',
                'height: 520px',
                'max-height: calc(100vh - 100px)',
                'border-radius: 1rem',
            ].join(';');
            document.body.style.overflow = '';
        }
    }

    // Patch toggleBtn and closeBtn to trigger mobile fullscreen
    const _origToggle = toggleBtn.onclick;
    toggleBtn.addEventListener('click', () => applyMobileFullscreen(isOpen));
    closeBtn.addEventListener('click', () => applyMobileFullscreen(false));
    window.addEventListener('resize', () => applyMobileFullscreen(isOpen));

})();
</script>
@endpush
