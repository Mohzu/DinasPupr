<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ChatMessage extends Model
{
    use HasUuids;
    protected $table = 'chat_messages';

    protected $fillable = [
        'chat_session_id',
        'sender_type',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Relasi ke sesi chat
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(ChatSession::class, 'chat_session_id');
    }

    /**
     * Scope: pesan dari user (belum dibaca admin)
     */
    public function scopeUnread($query)
    {
        return $query->where('sender_type', 'user')->where('is_read', false);
    }

    /**
     * Tandai pesan sebagai sudah dibaca
     */
    public function markAsRead(): void
    {
        $this->update(['is_read' => true]);
    }
}
