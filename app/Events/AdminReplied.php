<?php

namespace App\Events;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminReplied implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public ChatSession $session,
        public ChatMessage $message
    ) {}

    /**
     * Broadcast ke channel sesi spesifik agar user menerima balasan admin secara real-time
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat.' . $this->session->session_token),
        ];
    }

    public function broadcastAs(): string
    {
        return 'admin.replied';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => [
                'id'          => $this->message->id,
                'sender_type' => 'admin',
                'message'     => $this->message->message,
                'created_at'  => $this->message->created_at->format('H:i'),
            ],
        ];
    }
}
