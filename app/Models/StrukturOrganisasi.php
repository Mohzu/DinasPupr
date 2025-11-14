<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'gambar',
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
