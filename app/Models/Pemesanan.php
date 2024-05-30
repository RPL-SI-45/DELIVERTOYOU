<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    public $table = "pemesanan";
    use HasFactory;

    protected $fillable = [
        'user_id', // Tambahkan user_id ke fillable
        'nama_pelanggan',
        'alamat',
        'status_pemesanan',
        'rating',
        'feedback',
        'confirmation_at',
    ];

    public function items()
    {
        return $this->hasMany(PemesananItem::class);
    }
}
