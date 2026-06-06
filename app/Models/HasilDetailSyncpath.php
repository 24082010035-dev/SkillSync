<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilDetailSyncpath extends Model
{
    protected $table = 'hasil_detail_syncpath';

    protected $fillable = [
        'hasil_tes_id',
        'kategori_id',
        'skor'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSyncpath::class, 'kategori_id');
    }
}