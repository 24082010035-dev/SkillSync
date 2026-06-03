<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class MahasiswaProfile extends Model
{
    protected $fillable = [
        'user_id',
        'jurusan_id',
        'angkatan',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}