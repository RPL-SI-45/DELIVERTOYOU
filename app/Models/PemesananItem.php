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
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo(menu_warungs::class, 'menu_id');
    }
}