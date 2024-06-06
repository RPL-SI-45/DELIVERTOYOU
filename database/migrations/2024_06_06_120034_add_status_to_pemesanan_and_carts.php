<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Menambahkan kolom status dengan default 'pending'
        });
    
        Schema::table('carts', function (Blueprint $table) {
            $table->string('status')->default('active'); // Menambahkan kolom status dengan default 'active'
        });
    }
    
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
