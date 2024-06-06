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
        'seller_id', ];
        
    protected $guarded= ['id'];
    
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}