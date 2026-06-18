<?php

namespace App\Events;

use App\Models\ChatSession;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatTransferredToAdmin implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public ChatSession $session
    ) {}

    /**
     * Broadcast ke channel admin global — semua admin yang online menerima notifikasi ini
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('admin-chat-notifications'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'chat.transferred';
    }

    public function broadcastWith(): array
    {
        $lastMessage = $this->session->messages()->latest()->first();

        return [
            'session' => [
                'id'            => $this->session->id,
                'session_token' => $this->session->session_token,
                'user_name'     => $this->session->user_name ?? 'Anonim',
                'transferred_at' => $this->session->transferred_at?->format('H:i'),
                'last_message'  => $lastMessage?->message,
            ],
        ];
    }
}
