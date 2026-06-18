<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ChatSession extends Model
{
    protected $table = 'chat_sessions';

    protected $fillable = [
        'session_token',
        'user_name',
        'user_email',
        'status',
        'admin_id',
        'transferred_at',
        'closed_at',
    ];

    protected $casts = [
        'transferred_at' => 'datetime',
        'closed_at'      => 'datetime',
    ];

    /**
     * Generate token unik untuk sesi baru
     */
    public static function generateToken(): string
    {
        return Str::random(48);
    }

    /**
     * Relasi ke pesan-pesan dalam sesi ini
     */
    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class)->orderBy('created_at');
    }

    /**
     * Relasi ke admin yang menangani sesi ini
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Scope: sesi yang masih aktif (bot atau human)
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['bot', 'human']);
    }

    /**
     * Scope: sesi yang perlu ditangani admin (status human)
     */
    public function scopeNeedsAdmin($query)
    {
        return $query->where('status', 'human');
    }

    /**
     * Cek apakah sesi masih aktif
     */
    public function isActive(): bool
    {
        return in_array($this->status, ['bot', 'human']);
    }

    /**
     * Transfer sesi ke admin manusia
     */
    public function transferToHuman(): void
    {
        $this->update([
            'status'         => 'human',
            'transferred_at' => now(),
        ]);
    }

    /**
     * Tutup sesi
     */
    public function close(): void
    {
        $this->update([
            'status'    => 'closed',
            'closed_at' => now(),
        ]);
    }

    /**
     * Hitung pesan yang belum dibaca oleh admin
     */
    public function unreadCount(): int
    {
        return $this->messages()->where('sender_type', 'user')->where('is_read', false)->count();
    }
}
