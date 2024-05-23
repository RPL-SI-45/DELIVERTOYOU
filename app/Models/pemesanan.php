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
    
}

    protected $guarded =[];
    protected $fillable = [
        'nama_pelanggan',
        'status_pemesanan',
        'total_harga',
        'confirmation_at',
        'menu',
        'quantity',
        'total_harga',
        'alamat',];
    public $timestamps = false;


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
  
    public function pesananmasuk() { 
        return $this->belongsTo(PesananMasuk::class, 'pesananmasuk_id'); 
    }


    // public function payment()
    // {
    //     return $this->hasOne(Payment::class);
    // }
    // public function pesananmasuk() { 
    //     return $this->belongsTo(PesananMasuk::class, 'pesananmasuk_id'); 
    // }

}

