<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'nama_skill',
        'deskripsi',
    ];

    public function jurusan()
    {
        return $this->belongsToMany(
            Jurusan::class,
            'jurusan_skill',
            'skill_id',
            'jurusan_id'
        );
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'skill_id');
    }
}