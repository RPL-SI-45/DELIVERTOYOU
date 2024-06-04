<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderHistoryController;


class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    


    protected $guarded =[];
    protected $fillable = [
        'nama_pelanggan',
        'status_pemesanan',
        'total_harga',
        'confirmation_at',
        'menu',
        'quantity',
        'total_harga',
        'alamat',
        'rating',
        'feedback',
        'customer_id',];
    public $timestamps = false;


    public function payment()
    {
        return $this->hasOne(Payment::class);

    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    
    public function pesananmasuk() { 
        return $this->belongsTo(PesananMasuk::class, 'pesananmasuk_id'); 
    }

    public function data()
    {
        return $this->hasMany(Data::class); 
    }

}

