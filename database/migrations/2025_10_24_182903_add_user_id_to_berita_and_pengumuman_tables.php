<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambahkan user_id ke tabel berita
        Schema::table('berita', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('penulis')->constrained()->onDelete('set null');
        });

        // Tambahkan user_id ke tabel pengumuman
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('penulis')->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dan kolom user_id dari tabel berita
        Schema::table('berita', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Hapus foreign key dan kolom user_id dari tabel pengumuman
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
