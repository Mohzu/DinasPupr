<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PejabatStruktural extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'urutan',
        'aktif',
        'user_id',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Relasi ke User (pembuat/edit konten)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}