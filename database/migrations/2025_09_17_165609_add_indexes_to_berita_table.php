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
        Schema::table('berita', function (Blueprint $table) {
            // Add indexes for better query performance
            $table->index('published_at');
            $table->index('kategori');
            $table->index('created_at');
            $table->index(['published_at', 'created_at']);
            $table->index(['kategori', 'published_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            // Drop indexes
            $table->dropIndex(['published_at']);
            $table->dropIndex(['kategori']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['published_at', 'created_at']);
            $table->dropIndex(['kategori', 'published_at']);
        });
    }
};