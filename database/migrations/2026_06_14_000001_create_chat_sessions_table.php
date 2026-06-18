<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_token', 64)->unique(); // token unik tiap sesi
            $table->string('user_name')->nullable();       // nama pengunjung (opsional)
            $table->string('user_email')->nullable();      // email pengunjung (opsional)
            $table->enum('status', ['bot', 'human', 'closed'])->default('bot');
            // bot    = ditangani AI otomatis
            // human  = ditransfer ke admin manusia
            // closed = sesi selesai
            $table->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete(); // admin yang handle
            $table->timestamp('transferred_at')->nullable(); // waktu transfer ke admin
            $table->timestamp('closed_at')->nullable();      // waktu sesi ditutup
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_sessions');
    }
};
