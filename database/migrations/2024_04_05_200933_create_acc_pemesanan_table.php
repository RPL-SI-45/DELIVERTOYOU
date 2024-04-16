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
        Schema::create('acc_pemesanan', function (Blueprint $table) {
            $table->id();
<<<<<<< Updated upstream
            $table->string('nama_pelanggan');
            $table->string('menu');
            $table->decimal('harga', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_harga', 10, 2);
            $table->string('alamat');
=======
            $table->string('menu');
            $table->integer('harga');
            $table->integer('quantity');
            $table->integer('total_harga');
            $table->string('alamat');
            $table->string('bukti_pembayaran');
>>>>>>> Stashed changes
            $table->string('status_pemesanan');
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
