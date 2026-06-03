<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'nama_jurusan'
    ];
     public function mahasiswaProfiles()
    {
        return $this->hasMany(MahasiswaProfile::class);
    }
    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'jurusan_skill',
            'jurusan_id',
            'skill_id'
        );
    }
}