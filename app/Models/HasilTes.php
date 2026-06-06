<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    protected $table = 'hasil_tes';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'jenis_tes',
        'skor_total',
        'created_at',
    ];
    public function detailSkills()
    {
        return $this->hasMany(HasilDetailSkill::class, 'hasil_tes_id');
    }
    public function detailSyncpath()
    {
        return $this->hasMany(HasilDetailSyncpath::class, 'hasil_tes_id');
    }
}