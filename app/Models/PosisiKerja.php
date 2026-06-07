<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosisiKerja extends Model
{
    protected $table = 'posisi_kerja';

    protected $fillable = [
        'nama_posisi',
        'deskripsi',
        'kategori_syncpath_id',
        'kategori_kepribadian_id'
    ];

    public function kategoriSyncpath()
    {
        return $this->belongsTo(
            KategoriSyncpath::class,
            'kategori_syncpath_id'
        );
    }

    public function kategoriKepribadian()
    {
        return $this->belongsTo(
            KategoriKepribadian::class,
            'kategori_kepribadian_id'
        );
    }
}