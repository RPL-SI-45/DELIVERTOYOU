<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanan_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('menu_id');
            $table->decimal('harga', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_harga', 10, 2)->default(0); // Set default value
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu_warungs')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan_items');
    }
};