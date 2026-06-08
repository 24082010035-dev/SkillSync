<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSyncpath extends Model
{
    protected $table = 'kategori_syncpath';

    protected $fillable = [
        'nama_kategori'
    ];

    public function soals()
    {
        return $this->hasMany(SoalSyncpath::class, 'kategori_id');
    }
}