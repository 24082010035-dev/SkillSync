<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalKepribadian extends Model
{
    protected $table = 'soal_kepribadian';

    protected $fillable = [
        'kategori_id',
        'pertanyaan'
    ];
    public function opsi()
    {
        return $this->hasMany(OpsiKepribadian::class, 'soal_id');
    }
}