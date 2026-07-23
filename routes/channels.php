<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Channel sesi chat publik (user & admin mendengarkan)
// Menggunakan public channel karena user tidak perlu login
Broadcast::channel('chat.{token}', function () {
    return true; // Public channel — siapa pun dengan token bisa bergabung
});

// Channel notifikasi admin (hanya admin yang login)
Broadcast::channel('admin-chat-notifications', function ($user) {
    return $user && $user->isAdmin(); // Hanya admin terautentikasi
});
