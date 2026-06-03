<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilDetailSkill extends Model
{
    protected $table = 'hasil_detail_skill';

    protected $fillable = [
        'hasil_tes_id',
        'skill_id',
        'skor',
        'level_dicapai',
    ];
    public function hasilTes()
    {
        return $this->belongsTo(HasilTes::class, 'hasil_tes_id');
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}