<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotKepribadian extends Model
{
    protected $table = 'bobot_kepribadian';

    protected $fillable = [
        'opsi_id',
        'kategori_id',
        'nilai'
    ];
}