<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumens';

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'year',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'year' => 'integer',
    ];
}

