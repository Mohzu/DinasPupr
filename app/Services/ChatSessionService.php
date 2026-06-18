<?php

namespace App\Services;

use App\Events\ChatTransferredToAdmin;
use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\ChatSession;

class ChatSessionService
{
    public function __construct(private GeminiAiService $gemini) {}

    /**
     * Buat sesi chat baru
     */
    public function createSession(?string $userName = null, ?string $userEmail = null): ChatSession
    {
        return ChatSession::create([
            'session_token' => ChatSession::generateToken(),
            'user_name'     => $userName,
            'user_email'    => $userEmail,
            'status'        => 'bot',
        ]);
    }

    /**
     * Proses pesan dari user dan generate respons AI
     */
    public function handleUserMessage(ChatSession $session, string $userMessage): ChatMessage
    {
        // Simpan pesan user
        $userMsg = $this->saveMessage($session, 'user', $userMessage);

        // Ambil riwayat percakapan untuk konteks AI (max 10 pesan terakhir)
        $history = $session->messages()
            ->whereIn('sender_type', ['user', 'bot'])
            ->latest()
            ->limit(10)
            ->get()
            ->reverse()
            ->map(fn($m) => ['sender_type' => $m->sender_type, 'message' => $m->message])
            ->toArray();

        // Generate respons AI
        $aiResponse = $this->gemini->generateResponse($userMessage, $history);

        // Simpan respons bot
        $botMsg = $this->saveMessage($session, 'bot', $aiResponse);

        // Broadcast pesan ke WebSocket (user tidak perlu polling)
        broadcast(new MessageSent($session, $botMsg))->toOthers();

        return $botMsg;
    }

    /**
     * Handle keputusan verifikasi user: [Ya] atau [Tidak]
     */
    public function handleVerification(ChatSession $session, bool $satisfied): ChatMessage
    {
        if ($satisfied) {
            // User puas → tutup sesi
            $session->close();

            $farewell = "Terima kasih atas konfirmasi Anda. Kami senang dapat membantu memberikan informasi yang Anda butuhkan. " .
                        "Sesi percakapan otomatis ini akan kami akhiri. Semoga hari Anda menyenangkan! 😊";

            return $this->saveMessage($session, 'bot', $farewell);
        }

        // User tidak puas → transfer ke admin manusia
        $session->transferToHuman();

        $transferMsg = "Mohon maaf jika informasi dari saya belum menyelesaikan kendala Anda. " .
                       "Saya akan langsung menyiarkan sesi chat ini melalui server real-time Laravel Reverb ke Dashboard Staf Admin Dinas PUPR Garut " .
                       "agar segera ditangani oleh petugas manusia. Mohon tunggu sebentar, petugas kami akan segera membalas pesan Anda di sini. 🔔";

        $msg = $this->saveMessage($session, 'bot', $transferMsg);

        // Broadcast ke admin dashboard secara real-time
        broadcast(new ChatTransferredToAdmin($session->fresh()));

        return $msg;
    }

    /**
     * Admin membalas pesan user
     */
    public function handleAdminReply(ChatSession $session, string $adminMessage): ChatMessage
    {
        $msg = $this->saveMessage($session, 'admin', $adminMessage);

        // Broadcast ke user secara real-time
        broadcast(new \App\Events\AdminReplied($session, $msg));

        return $msg;
    }

    /**
     * Helper: simpan pesan ke database
     */
    private function saveMessage(ChatSession $session, string $senderType, string $message): ChatMessage
    {
        return ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender_type'     => $senderType,
            'message'         => $message,
            'is_read'         => $senderType !== 'user', // pesan user belum dibaca by default
        ]);
    }
}
