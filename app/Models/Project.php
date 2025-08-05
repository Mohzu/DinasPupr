<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'budget',
        'start_date',
        'end_date',
        'status',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}