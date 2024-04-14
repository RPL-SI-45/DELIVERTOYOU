<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PaymentController;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payment";
    protected $fillable = [
        'pemesanan_id',
        'metode',
        'bukti',
        'total_bayar',
    ];
}
