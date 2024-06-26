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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->string('email')->unique();
            $table->string('nomor_telepon');
            $table->string('alamat');
            $table->string('role')->default('customer');
            $table->string('password');
            $table->string('nama_toko')->nullable();
            $table->string('alamat_toko')->nullable();
            $table->string('qrcode')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

