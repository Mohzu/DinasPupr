<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Dokumen extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dokumens';

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'year',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'year' => 'integer',
    ];

    /**
     * Relasi ke User (pembuat/uploader dokumen)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

