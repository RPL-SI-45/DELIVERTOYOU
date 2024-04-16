<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\OrderController;

class PesananMasuk extends Model
{
    use HasFactory;
    protected $table = 'pesananmasuk';
    protected $guarded =[];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'pesananmasuk_id');
    }
}
