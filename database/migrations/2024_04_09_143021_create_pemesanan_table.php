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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Tambahkan kolom user_id
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_pelanggan');
            $table->string('alamat')->nullable();
            $table->string('status_pemesanan')->default('Menunggu konfirmasi');
            $table->integer('rating')->nullable();
            $table->string('feedback')->nullable();
            $table->timestamp('confirmation_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};