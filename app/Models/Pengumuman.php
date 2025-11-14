<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengumuman extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari default (yaitu 'pengumumen')
    protected $table = 'pengumuman';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'judul',
        'isi',
        'lampiran',
        'penulis',
        'published_at',
        'user_id',
    ];

    // Casts untuk tipe data
    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke User (penulis)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
