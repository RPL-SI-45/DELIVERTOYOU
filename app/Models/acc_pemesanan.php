<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acc_pemesanan extends Model
{
    use HasFactory;
    protected $table = 'acc_pemesanan';
    protected $guarded= ['id'];
}
