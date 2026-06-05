<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilDetailKepribadian extends Model
{
    protected $table = 'hasil_detail_kepribadian';

    protected $fillable = [
        'hasil_tes_id',
        'kategori_id',
        'skor',
    ];
}