<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200);
            $table->string('slug', 200)->unique()->nullable();
            $table->text('isi')->nullable();
            $table->string('gambar', 150)->nullable();
            $table->string('kategori', 50)->nullable();
            $table->string('penulis', 50)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
}