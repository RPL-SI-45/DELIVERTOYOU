<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $guarded =[];
}
