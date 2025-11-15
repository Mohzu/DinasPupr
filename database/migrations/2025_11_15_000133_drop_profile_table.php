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
        Schema::dropIfExists('profile');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->default('sejarah');
            $table->longText('content');
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->timestamps();
        });
    }
};
