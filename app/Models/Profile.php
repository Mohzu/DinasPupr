<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile'; // Menentukan nama tabel yang sesuai

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
    ];
}