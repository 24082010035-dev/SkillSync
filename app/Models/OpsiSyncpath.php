<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpsiSyncpath extends Model
{
    protected $table = 'opsi_syncpath';

    protected $fillable = [
        'soal_id',
        'teks_opsi',
        'skor'
    ];

    public function soal()
    {
        return $this->belongsTo(SoalSyncpath::class, 'soal_id');
    }
}