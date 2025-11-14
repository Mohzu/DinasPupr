<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisiMisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'visi',
        'misi',
        'content',
        'status',
        'user_id',
    ];

    /**
     * Scope untuk konten yang published
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Relasi ke User (pembuat/edit konten)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
