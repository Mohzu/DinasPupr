<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori',
        'penulis',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($berita) {
            $berita->published_at = now();
        });
    }

    /**
     * Scope untuk berita yang dipublikasikan
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<=', now());
    }

    /**
     * Scope untuk berita terbaru dengan limit
     */
    public function scopeLatestWithLimit(Builder $query, int $limit = 5): Builder
    {
        return $query->published()
                    ->orderBy('published_at', 'desc')
                    ->limit($limit);
    }

    /**
     * Scope untuk berita berdasarkan kategori
     */
    public function scopeByCategory(Builder $query, string $kategori): Builder
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Accessor untuk URL gambar
     */
    public function getGambarUrlAttribute(): string
    {
        return asset('storage/' . $this->gambar);
    }

    /**
     * Accessor untuk excerpt berita
     */
    public function getExcerptAttribute(): string
    {
        return \Str::limit(strip_tags($this->isi), 150);
    }

    /**
     * Relasi ke User (penulis)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}