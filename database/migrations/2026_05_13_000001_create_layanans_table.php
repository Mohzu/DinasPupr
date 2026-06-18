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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->string('slug')->unique();
            $table->string('deskripsi_singkat');
            $table->text('penjelasan_detail')->nullable();
            $table->text('alur')->nullable();
            $table->text('persyaratan')->nullable();
            $table->string('file_dokumen')->nullable();
            $table->text('ikon')->nullable();
            $table->string('warna')->default('#3b82f6');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
