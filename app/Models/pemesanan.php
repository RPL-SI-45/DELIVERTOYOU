<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderHistoryController;

class Pemesanan extends Model
{
    public $table = "pemesanan";
    use HasFactory;


    protected $fillable = [
        'user_id', // Tambahkan user_id ke fillable
        'seller_id',
        'nama_pelanggan',
        'alamat',
        'status_pemesanan',
        'rating',
        'feedback',
        'confirmation_at',
    ];   
    
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
  
    public function pesananmasuk() { 
        return $this->belongsTo(PesananMasuk::class, 'pesananmasuk_id'); 
    }
  
    public function payment()
    {
        return $this->hasOne(Payment::class, 'pemesanan_id'); 
    }

    public function items()
    {
        return $this->hasMany(PemesananItem::class, 'pemesanan_id'); 
    }
}

