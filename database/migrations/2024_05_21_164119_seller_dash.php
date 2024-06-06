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
        Schema::create('SellerDash', function (Blueprint $table) {
            $table->id();
            $table->string('Total_pemesanan');
            $table->string('Total_harga');
            $table->string('Total_rating')->nullable();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
