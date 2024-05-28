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
            $table->string('alamat');
            $table->string('status_pemesanan')->default('Menunggu konfirmasi');
            $table->integer('rating');
            $table->string('feedback');
            $table->unsignedBigInteger('seller_id'); 
            $table->string('seller');
            $table->timestamp('confirmation_at')->nullable();
            $table->unsignedBigInteger('customer_id'); 
            $table->timestamps();
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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