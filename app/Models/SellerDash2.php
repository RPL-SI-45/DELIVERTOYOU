<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDash2 extends Model
{
    use HasFactory;

    protected $table = 'SellerDash2s';
    protected $fillable = ['Total_pemesanan2', 'Total_harga2'];
    protected $guarded = [];
    public $timestamps = false;
}
