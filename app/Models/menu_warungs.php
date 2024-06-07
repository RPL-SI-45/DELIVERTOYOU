<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class menu_warungs extends Model
{
    use HasFactory;
    protected $table = 'menu_warungs';

    protected $fillable = [
        'kategori',
        'nama',
        'harga',
        'deskripsi',
        'gambar',  
        'seller_id',];
    protected $guarded= ['id'];

    public function pemesananItems() {
        return $this->hasMany(Pemesananitem::class, 'menu_id');
    }
}
