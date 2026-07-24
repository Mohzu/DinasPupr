<?php

namespace App\Http\Controllers;

use App\Events\ChatTransferredToAdmin;
use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\ChatSession;
use App\Services\GeminiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    protected GeminiService $gemini;

    public function __construct(GeminiService $gemini)
    {
        $this->gemini = $gemini;
    }

    /**
     * Mulai sesi chat baru dari frontend
     * POST /chat/start
     */
    public function startSession(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_name'  => 'nullable|string|max:100',
            'user_email' => 'nullable|email|max:150',
            'message'    => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Buat sesi baru
        $session = $this->createSession(
            $request->user_name,
            $request->user_email
        );

        // Kirim pesan pembuka selamat datang dari bot
        $welcomeName = $request->user_name ?: 'Pengunjung';
        $welcomeMsg = "Selamat datang di layanan **SAPA PUPR Garut**, **{$welcomeName}**! 👋\n\n" .
                      "Saya siap membantu Anda dengan informasi seputar Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut. " .
                      "Silakan sampaikan pertanyaan atau kebutuhan Anda.";

        // Simpan pesan sambutan ke database
        $this->saveMessage($session, 'bot', $welcomeMsg);

        // Proses pesan pertama user langsung jika ada
        if ($request->filled('message')) {
            $this->handleUserMessage($session, $request->message);
        }

        // Ambil semua pesan yang sudah tersimpan
        $allMessages = $session->messages()->orderBy('created_at')->get()->map(fn($m) => [
            'id'          => $m->id,
            'sender_type' => $m->sender_type,
            'message'     => $m->message,
            'created_at'  => $m->created_at->format('H:i'),
            'timestamp'   => $m->created_at->timestamp * 1000,
        ]);

        return response()->json([
            'success'       => true,
            'session_token' => $session->session_token,
            'messages'      => $allMessages,
            'session_status' => $session->fresh()->status,
        ]);
    }

    /**
     * Kirim pesan user dalam sesi yang sudah ada
     * POST /chat/message
     */
    public function sendMessage(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'session_token' => 'required|string',
            'message'       => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $session = ChatSession::where('session_token', $request->session_token)->first();

        if (!$session) {
            return response()->json(['success' => false, 'message' => 'Sesi tidak ditemukan.'], 404);
        }

        if (!$session->isActive()) {
            return response()->json(['success' => false, 'message' => 'Sesi ini sudah ditutup.'], 400);
        }

        // Jika sudah di-handle admin, simpan pesan user dan broadcast
        if ($session->status === 'human') {
            $userMsg = ChatMessage::create([
                'chat_session_id' => $session->id,
                'sender_type'     => 'user',
                'message'         => $request->message,
                'is_read'         => false,
            ]);

            broadcast(new MessageSent($session, $userMsg))->toOthers();

            return response()->json([
                'success'        => true,
                'message'        => array_merge($userMsg->only(['id', 'sender_type', 'message']), [
                    'created_at' => $userMsg->created_at->format('H:i'),
                    'timestamp'  => $userMsg->created_at->timestamp * 1000,
                ]),
                'session_status' => 'human',
                'bot_reply'      => null,
            ]);
        }

        // Mode bot: proses via AI
        $botMsg = $this->handleUserMessage($session, $request->message);

        return response()->json([
            'success'        => true,
            'session_status' => $session->fresh()->status,
            'bot_reply'      => [
                'id'          => $botMsg->id,
                'sender_type' => $botMsg->sender_type,
                'message'     => $botMsg->message,
                'created_at'  => $botMsg->created_at->format('H:i'),
                'timestamp'   => $botMsg->created_at->timestamp * 1000,
            ],
        ]);
    }

    /**
     * Handle keputusan verifikasi user: [Ya] atau [Tidak]
     * POST /chat/verify
     */
    public function handleVerification(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'session_token' => 'required|string',
            'satisfied'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $session = ChatSession::where('session_token', $request->session_token)->first();

        if (!$session || !$session->isActive()) {
            return response()->json(['success' => false, 'message' => 'Sesi tidak valid.'], 404);
        }

        $msg = $this->processVerification($session, (bool) $request->satisfied);

        return response()->json([
            'success'        => true,
            'session_status' => $session->fresh()->status,
            'bot_reply'      => [
                'id'          => $msg->id,
                'sender_type' => $msg->sender_type,
                'message'     => $msg->message,
                'created_at'  => $msg->created_at->format('H:i'),
                'timestamp'   => $msg->created_at->timestamp * 1000,
            ],
        ]);
    }

    /**
     * Ambil riwayat pesan sesi (untuk resume sesi)
     * GET /chat/session/{token}
     */
    public function getSession(string $token): JsonResponse
    {
        $session = ChatSession::where('session_token', $token)->with('messages')->first();

        if (!$session) {
            return response()->json(['success' => false], 404);
        }

        return response()->json([
            'success'        => true,
            'session_status' => $session->status,
            'messages'       => $session->messages->map(fn($m) => [
                'id'          => $m->id,
                'sender_type' => $m->sender_type,
                'message'     => $m->message,
                'created_at'  => $m->created_at->format('H:i'),
                'timestamp'   => $m->created_at->timestamp * 1000,
            ]),
        ]);
    }

    // ==========================================================
    // LOGIKA BISNIS Session
    // ==========================================================

    /**
     * Buat sesi chat baru
     */
    private function createSession(?string $userName = null, ?string $userEmail = null): ChatSession
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
    private function handleUserMessage(ChatSession $session, string $userMessage): ChatMessage
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

        // Generate respons AI via GeminiService
        $aiResponse = $this->gemini->generateReply($userMessage, $history);

        // Simpan respons bot
        $botMsg = $this->saveMessage($session, 'bot', $aiResponse);

        // Broadcast pesan ke WebSocket (user tidak perlu polling)
        broadcast(new MessageSent($session, $botMsg))->toOthers();

        return $botMsg;
    }

    /**
     * Handle keputusan verifikasi user: [Ya] atau [Tidak]
     */
    private function processVerification(ChatSession $session, bool $satisfied): ChatMessage
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
                       "Saya akan menghubungkan Anda dengan petugas Dinas PUPR Garut yang sedang bertugas. " .
                       "Mohon tunggu sebentar, petugas kami akan segera membalas pesan Anda di sini. 🔔";

        $msg = $this->saveMessage($session, 'bot', $transferMsg);

        // Broadcast ke admin dashboard secara real-time
        broadcast(new ChatTransferredToAdmin($session->fresh()));

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

    // ==========================================================
    // [Logika AI telah dipindahkan ke App\Services\GeminiService]
    // ==========================================================
}

