<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosisiMagang extends Model
{
    protected $table = 'posisi_magang';

    protected $fillable = [
        'kategori_syncpath_id',
        'nama_posisi',
        'deskripsi'
    ];
}