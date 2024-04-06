<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Menu extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    protected $fillable = [
        'kategori',
          ];
    protected $guarded= ['id'];
}
