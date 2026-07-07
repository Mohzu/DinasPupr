<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Events\AdminReplied;
use App\Events\MessageSent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatDashboardController extends Controller
{
    /**
     * Dashboard daftar sesi chat
     * GET /admin/chat
     */
    public function index(Request $request)
    {
        $query = ChatSession::with(['messages' => fn($q) => $q->latest()->limit(1)])
            ->withCount(['messages as unread_count' => fn($q) => $q->where('sender_type', 'user')->where('is_read', false)]);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $sessions = $query->latest()->paginate(20);

        $stats = [
            'total'     => ChatSession::count(),
            'bot'       => ChatSession::where('status', 'bot')->count(),
            'human'     => ChatSession::where('status', 'human')->count(),
            'closed'    => ChatSession::where('status', 'closed')->count(),
            'unread'    => ChatSession::needsAdmin()->count(),
        ];

        return view('admin.chat.index', compact('sessions', 'stats'));
    }

    /**
     * Detail sesi chat + form reply admin
     * GET /admin/chat/{id}
     */
    public function show(int $id)
    {
        $session = ChatSession::with('messages', 'admin')->findOrFail($id);

        // Tandai semua pesan user sebagai sudah dibaca
        $session->messages()->where('sender_type', 'user')->where('is_read', false)
            ->update(['is_read' => true]);

        return view('admin.chat.show', compact('session'));
    }

    /**
     * Admin membalas pesan user
     * POST /admin/chat/{id}/reply
     */
    public function reply(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $session = ChatSession::findOrFail($id);

        if ($session->status === 'closed') {
            return response()->json(['success' => false, 'message' => 'Sesi sudah ditutup.'], 400);
        }

        // Assign admin ke sesi ini jika belum
        if (!$session->admin_id) {
            $session->update(['admin_id' => auth()->id()]);
        }

        // Simpan pesan admin ke database
        $msg = $this->saveMessage($session, 'admin', $request->message);

        // Broadcast ke user secara real-time
        broadcast(new AdminReplied($session, $msg));

        return response()->json([
            'success' => true,
            'message' => [
                'id'          => $msg->id,
                'sender_type' => 'admin',
                'message'     => $msg->message,
                'created_at'  => $msg->created_at->format('H:i'),
            ],
        ]);
    }

    /**
     * Tutup sesi dari sisi admin
     * PUT /admin/chat/{id}/close
     */
    public function close(int $id): JsonResponse
    {
        $session = ChatSession::findOrFail($id);
        $session->close();

        // Broadcast session closed ke user
        broadcast(new MessageSent($session, ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender_type'     => 'admin',
            'message'         => 'Sesi percakapan ini telah ditutup oleh admin. Terima kasih telah menghubungi Dinas PUPR Garut.',
            'is_read'         => true,
        ])));

        return response()->json(['success' => true, 'message' => 'Sesi berhasil ditutup.']);
    }

    /**
     * API: ambil sesi aktif untuk polling/notifikasi admin
     * GET /api/admin/chat/active
     */
    public function activeSessionsApi(): JsonResponse
    {
        $sessions = ChatSession::needsAdmin()
            ->with(['messages' => fn($q) => $q->latest()->limit(1)])
            ->withCount(['messages as unread_count' => fn($q) => $q->where('sender_type', 'user')->where('is_read', false)])
            ->latest('transferred_at')
            ->get()
            ->map(fn($s) => [
                'id'             => $s->id,
                'user_name'      => $s->user_name ?? 'Anonim',
                'status'         => $s->status,
                'unread_count'   => $s->unread_count,
                'transferred_at' => $s->transferred_at?->diffForHumans(),
                'last_message'   => $s->messages->first()?->message,
                'admin_url'      => route('admin.chat.show', $s->id),
            ]);

        return response()->json(['success' => true, 'sessions' => $sessions]);
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
            'is_read'         => $senderType !== 'user',
        ]);
    }
}
