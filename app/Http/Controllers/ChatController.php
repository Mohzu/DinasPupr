<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Services\ChatSessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function __construct(private ChatSessionService $chatService) {}

    /**
     * Mulai sesi chat baru dari frontend
     * POST /chat/start
     */
    public function startSession(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_name'  => 'nullable|string|max:100',
            'user_email' => 'nullable|email|max:150',
            'message'    => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Buat sesi baru
        $session = $this->chatService->createSession(
            $request->user_name,
            $request->user_email
        );

        // Kirim pesan pembuka selamat datang dari bot
        $welcomeMsg = "Selamat datang di layanan **SAPA PUPR Garut**! 👋\n\n" .
                      "Saya siap membantu Anda dengan informasi seputar Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut. " .
                      "Silakan sampaikan pertanyaan atau kebutuhan Anda.";

        // Proses pesan pertama user langsung
        $botMsg = $this->chatService->handleUserMessage($session, $request->message);

        // Ambil pesan sambutan yang sudah tersimpan
        $allMessages = $session->messages()->orderBy('created_at')->get()->map(fn($m) => [
            'id'          => $m->id,
            'sender_type' => $m->sender_type,
            'message'     => $m->message,
            'created_at'  => $m->created_at->format('H:i'),
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
            $userMsg = \App\Models\ChatMessage::create([
                'chat_session_id' => $session->id,
                'sender_type'     => 'user',
                'message'         => $request->message,
                'is_read'         => false,
            ]);

            broadcast(new \App\Events\MessageSent($session, $userMsg))->toOthers();

            return response()->json([
                'success'        => true,
                'message'        => $userMsg->only(['id', 'sender_type', 'message']),
                'session_status' => 'human',
                'bot_reply'      => null,
            ]);
        }

        // Mode bot: proses via AI
        $botMsg = $this->chatService->handleUserMessage($session, $request->message);

        return response()->json([
            'success'        => true,
            'session_status' => $session->fresh()->status,
            'bot_reply'      => [
                'id'          => $botMsg->id,
                'sender_type' => $botMsg->sender_type,
                'message'     => $botMsg->message,
                'created_at'  => $botMsg->created_at->format('H:i'),
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

        $msg = $this->chatService->handleVerification($session, (bool) $request->satisfied);

        return response()->json([
            'success'        => true,
            'session_status' => $session->fresh()->status,
            'bot_reply'      => [
                'id'          => $msg->id,
                'sender_type' => $msg->sender_type,
                'message'     => $msg->message,
                'created_at'  => $msg->created_at->format('H:i'),
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
            ]),
        ]);
    }
}
