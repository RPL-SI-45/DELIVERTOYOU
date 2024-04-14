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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('menu');
            $table->decimal('harga', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_harga', 10, 2);
            $table->string('alamat_pelanggan'); // Kolom baru untuk alamat pelanggan
            $table->enum('jenis_pembayaran', ['QRIS','CASH']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
