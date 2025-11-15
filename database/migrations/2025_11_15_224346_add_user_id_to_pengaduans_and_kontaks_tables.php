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
        // Tambahkan user_id ke tabel pengaduans
        if (!Schema::hasColumn('pengaduans', 'user_id')) {
            Schema::table('pengaduans', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('status')->constrained()->onDelete('set null');
            });
        }

        // Tambahkan user_id ke tabel kontaks
        if (!Schema::hasColumn('kontaks', 'user_id')) {
            Schema::table('kontaks', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('status')->constrained()->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dan kolom user_id dari tabel pengaduans
        if (Schema::hasColumn('pengaduans', 'user_id')) {
            Schema::table('pengaduans', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }

        // Hapus foreign key dan kolom user_id dari tabel kontaks
        if (Schema::hasColumn('kontaks', 'user_id')) {
            Schema::table('kontaks', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
