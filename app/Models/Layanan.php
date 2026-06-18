<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';

    protected $guarded = ['id'];

    /**
     * Boot method untuk auto-generate slug dari nama_layanan
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($layanan) {
            if (empty($layanan->slug)) {
                $layanan->slug = Str::slug($layanan->nama_layanan);
            }
        });

        static::updating(function ($layanan) {
            if ($layanan->isDirty('nama_layanan') && !$layanan->isDirty('slug')) {
                $layanan->slug = Str::slug($layanan->nama_layanan);
            }
        });
    }
}
