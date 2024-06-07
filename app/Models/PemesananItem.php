<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id',
        'menu_id',
        'harga',
        'quantity',
        'total_harga',
        'total_semua_menu',
        'seller_id',
        'user_id',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo(menu_warungs::class, 'menu_id');
    }

    public function save(array $options = [])
    {
        $this->total_harga = $this->harga * $this->quantity;
        parent::save($options);
    }

    public function menu_warungs() {
        return $this->belongsTo(menu_warungs::class, 'menu_id');
    }
    
}