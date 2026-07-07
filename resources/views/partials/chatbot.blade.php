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
         class="hidden flex-col w-[360px] max-w-[calc(100vw-2rem)] bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100"
         style="height: 520px; max-height: calc(100vh - 100px);">

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

        {{-- Messages Area --}}
        <div id="sapa-messages"
             class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50"
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
            scrollToBottom();
            inputEl.focus();
            // Resume session jika ada
            if (sessionToken) resumeSession();
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
                // Sesi baru
                response = await fetch('{{ route("chat.start") }}', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
                    body: JSON.stringify({ message: msg }),
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
                }
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
                    // Hapus token session dari sessionStorage
                    sessionStorage.removeItem('sapa_session_token');
                    sessionToken = null;
                    disableInput('Sesi telah selesai. Mulai percakapan baru?');
                    // Tombol mulai baru
                    showRestartButton();
                } else if (data.session_status === 'human') {
                    updateStatusUI();
                }
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
                if (data.session_status === 'closed') {
                    sessionStorage.removeItem('sapa_session_token');
                    sessionToken = null;
                    return;
                }
                sessionStatus = data.session_status;
                clearMessages();
                data.messages.forEach(m => appendBubble(m.sender_type, m.message, m.created_at));
                updateStatusUI();
                subscribeToChannel(sessionToken);
                
                // Jadwalkan verifikasi jika pesan terakhir dari bot dan status masih bot
                if (data.messages && data.messages.length > 0) {
                    const lastMsg = data.messages[data.messages.length - 1];
                    if (lastMsg.sender_type === 'bot' && sessionStatus === 'bot') {
                        scheduleVerification(lastMsg.timestamp);
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
        appendBubble('bot', 'Selamat datang kembali! Ada yang bisa saya bantu? 😊', formatTime(new Date()));
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
                if (!d.success || d.session_status === 'closed') {
                    sessionStorage.removeItem('sapa_session_token');
                    sessionToken = null;
                }
            }).catch(() => {});
    }
})();
</script>
@endpush
