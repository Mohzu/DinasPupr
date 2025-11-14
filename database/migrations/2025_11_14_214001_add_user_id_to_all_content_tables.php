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
        // Tambahkan user_id ke tabel dokumens jika belum ada
        if (!Schema::hasColumn('dokumens', 'user_id')) {
            Schema::table('dokumens', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('published_at')->constrained()->onDelete('set null');
            });
        }

        // Tambahkan user_id ke tabel sejarahs jika belum ada
        if (!Schema::hasColumn('sejarahs', 'user_id')) {
            Schema::table('sejarahs', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('status')->constrained()->onDelete('set null');
            });
        }

        // Tambahkan user_id ke tabel visi_misis jika belum ada
        if (!Schema::hasColumn('visi_misis', 'user_id')) {
            Schema::table('visi_misis', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('status')->constrained()->onDelete('set null');
            });
        }

        // Tambahkan user_id ke tabel struktur_organisasis jika belum ada
        if (!Schema::hasColumn('struktur_organisasis', 'user_id')) {
            Schema::table('struktur_organisasis', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('status')->constrained()->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key dan kolom user_id dari tabel dokumens
        if (Schema::hasColumn('dokumens', 'user_id')) {
            Schema::table('dokumens', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }

        // Hapus foreign key dan kolom user_id dari tabel sejarahs
        if (Schema::hasColumn('sejarahs', 'user_id')) {
            Schema::table('sejarahs', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }

        // Hapus foreign key dan kolom user_id dari tabel visi_misis
        if (Schema::hasColumn('visi_misis', 'user_id')) {
            Schema::table('visi_misis', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }

        // Hapus foreign key dan kolom user_id dari tabel struktur_organisasis
        if (Schema::hasColumn('struktur_organisasis', 'user_id')) {
            Schema::table('struktur_organisasis', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
