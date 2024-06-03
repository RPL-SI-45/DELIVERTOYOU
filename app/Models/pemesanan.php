<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'seller_id', 'nama_pelanggan', 'alamat', 'status_pemesanan', 'rating', 'feedback', 'confirmation_at'];
    protected $table = 'pemesanan';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function items()
    {
        return $this->hasMany(PemesananItem::class);
    }
}