<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'subjek',
        'pesan',
        'status',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke User (admin yang menangani kontak)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
