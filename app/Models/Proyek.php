<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';

    protected $fillable = [
    'user_id',
    'nama_proyek',
    'deskripsi',
    'file_proyek',
    'tipe_project',
    'status',
    'mentor_id',
    'skor',
    'feedback_mentor'
];
}