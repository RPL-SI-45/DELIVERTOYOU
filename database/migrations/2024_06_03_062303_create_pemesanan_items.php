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
            $table->unsignedBigInteger('pemesanan_id')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->decimal('total_semua_menu', 10, 2)->default(0);
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