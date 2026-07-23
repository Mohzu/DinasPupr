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

    // Ambil konfigurasi dinamis yang disuntikkan dari Blade
    const config = window.SapaChatConfig || {
        routes: {
            start: '/chat/start',
            message: '/chat/message',
            verify: '/chat/verify',
            session: function(token) { return `/chat/session/${token}`; }
        },
        auth: {
            isGuest: true,
            userName: null,
            userEmail: null
        },
        assets: {
            avatar: '/img/sapa_pupr.png'
        }
    };

    const isGuest = config.auth.isGuest;
    const authUserName = config.auth.userName;
    const authUserEmail = config.auth.userEmail;
    const botAvatarUrl = config.assets?.avatar ?? '/img/sapa_pupr.png';

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
                <img src="${botAvatarUrl}" alt="AI" class="w-7 h-7 rounded-full object-cover flex-shrink-0 bg-white border border-gray-200">
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
                response = await fetch(config.routes.start, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'},
                    body: JSON.stringify(bodyData),
                });
            } else {
                // Sesi existing
                response = await fetch(config.routes.message, {
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
            const response = await fetch(config.routes.verify, {
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
            const response = await fetch(config.routes.session(sessionToken), {
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

        const avatarHtml = !isUser ? (
            isAdmin ? `
            <div class="w-7 h-7 rounded-full bg-orange-500 flex items-center justify-center text-white text-[10px] font-bold flex-shrink-0">
                ADM
            </div>` : `
            <img src="${botAvatarUrl}" alt="AI" class="w-7 h-7 rounded-full object-cover flex-shrink-0 bg-white border border-gray-200">`
        ) : '';

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
        if (!text) return "";
        
        let html = text;
        
        // 1. Links: [text](url) -> <a href="url" target="_blank">text</a>
        html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" target="_blank" class="text-blue-600 hover:underline font-semibold">$1</a>');
        
        // 2. Bold: **text** -> <strong>text</strong>
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        
        // 3. Italics: *text* -> <em>text</em>
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
        
        // 4. Custom buttons/spans: [Ya] and [Tidak]
        html = html.replace(/\[Ya\]/g, '<span class="font-bold text-green-600">[Ya]</span>')
                   .replace(/\[Tidak\]/g, '<span class="font-bold text-red-600">[Tidak]</span>');

        // 5. Lists (ul/ol)
        const lines = html.split('\n');
        let inList = false; // can be 'ul', 'ol', or false
        let resultLines = [];
        
        for (let i = 0; i < lines.length; i++) {
            let line = lines[i].trim();
            
            const matchUnordered = line.match(/^[\*\-]\s+(.*)/);
            const matchOrdered = line.match(/^(\d+)\.\s+(.*)/);
            
            if (matchUnordered) {
                if (inList !== 'ul') {
                    if (inList) resultLines.push(`</${inList}>`);
                    inList = 'ul';
                    resultLines.push('<ul class="list-disc pl-5 space-y-1 my-2">');
                }
                resultLines.push(`<li>${matchUnordered[1]}</li>`);
            } else if (matchOrdered) {
                if (inList !== 'ol') {
                    if (inList) resultLines.push(`</${inList}>`);
                    inList = 'ol';
                    resultLines.push('<ol class="list-decimal pl-5 space-y-1 my-2">');
                }
                resultLines.push(`<li>${matchOrdered[2]}</li>`);
            } else {
                if (inList) {
                    resultLines.push(`</${inList}>`);
                    inList = false;
                }
                resultLines.push(lines[i]);
            }
        }
        if (inList) {
            resultLines.push(`</${inList}>`);
        }
        
        html = resultLines.join('\n');
        
        // 6. Convert newlines to <br>
        html = html.replace(/\n/g, '<br>');
        
        // 7. Clean up extra <br> tags around list tags
        html = html.replace(/<(ul|ol)([^>]*)><br>/gi, '<$1$2>')
                   .replace(/<\/(ul|ol)><br>/gi, '</$1>')
                   .replace(/<li><br>/gi, '<li>')
                   .replace(/<\/li><br>/gi, '</li>');
        
        return html;
    }

    function showTyping(show) {
        typingEl.classList.toggle('hidden', !show);
        typingEl.classList.toggle('flex', show);
        if (show) scrollToBottom();
    }

    // Menampilkan tombol kepuasan/verifikasi
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
            const response = await fetch(config.routes.start, {
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
                const response = await fetch(config.routes.start, {
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
        fetch(config.routes.session(sessionToken), {headers: {'Accept': 'application/json'}})
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
    toggleBtn.addEventListener('click', () => applyMobileFullscreen(isOpen));
    closeBtn.addEventListener('click', () => applyMobileFullscreen(false));
    window.addEventListener('resize', () => applyMobileFullscreen(isOpen));

})();
