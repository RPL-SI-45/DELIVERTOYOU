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
        Schema::create('menu_warungs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->string('kategori');
            $table->string('nama');
            $table->string('harga');
            $table->string('deskripsi');
            $table->string('gambar');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_warungs');
    }
};