<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    // Tipe data yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];
}
