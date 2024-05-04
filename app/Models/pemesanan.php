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

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function pesananmasuk() { 
        return $this->belongsTo(PesananMasuk::class, 'pesananmasuk_id'); 
    }
}
