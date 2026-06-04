<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKepribadian extends Model
{
    protected $table = 'kategori_kepribadian';

    protected $fillable = [
        'nama_kategori'
    ];
}