<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'soal_skill';

    protected $fillable = [
        'skill_id',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban_benar',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}