<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpsiKepribadian extends Model
{
    protected $table = 'opsi_kepribadian';

    protected $fillable = [
        'soal_id',
        'opsi',
        'skor'
    ];

    public function soal()
    {
        return $this->belongsTo(SoalKepribadian::class, 'soal_id');
    }
}