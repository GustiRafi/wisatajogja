<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('categori_id')->references('id')->on('categoris')->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('addres');
            $table->text("maps");
            $table->text('deskripsi');
            $table->text('fasilitas');
            $table->text('tiket_price');
            $table->text('jam_buka');
            $table->text('rute');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisatas');
    }
};