<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalSyncpath extends Model
{
    protected $table = 'soal_syncpath';

    protected $fillable = [
        'kategori_id',
        'pertanyaan'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSyncpath::class, 'kategori_id');
    }

    public function opsi()
    {
        return $this->hasMany(OpsiSyncpath::class, 'soal_id');
    }
}