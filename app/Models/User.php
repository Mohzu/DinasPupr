<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Mengganti 'role' dengan 'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean', // Menambahkan casting untuk 'is_admin'
        ];
    }

    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class, 'user_id');
    }

    public function pengumuman(): HasMany
    {
        return $this->hasMany(Pengumuman::class, 'user_id');
    }

    public function dokumen(): HasMany
    {
        return $this->hasMany(Dokumen::class, 'user_id');
    }

    public function sejarah(): HasMany
    {
        return $this->hasMany(Sejarah::class, 'user_id');
    }

    public function visiMisi(): HasMany
    {
        return $this->hasMany(VisiMisi::class, 'user_id');
    }

    public function strukturOrganisasi(): HasMany
    {
        return $this->hasMany(StrukturOrganisasi::class, 'user_id');
    }
}