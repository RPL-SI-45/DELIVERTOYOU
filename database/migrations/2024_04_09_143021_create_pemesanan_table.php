<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();; // Tambahkan kolom user_id
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->string('nama_pelanggan');
            $table->string('customer_id');
            $table->string('menu');
            $table->decimal('harga', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_harga', 10, 2);
            $table->string('alamat');
            $table->string('status_pemesanan')->default('Menunggu konfirmasi');
            $table->string('rating')->default('Customer belum memberikan rating')->nullable();
            $table->string('feedback')->default('Customer belum memberikan feedback')->nullable();
            $table->timestamp('confirmation_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};