<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadProyekMentor extends Model
{
    use HasFactory;

    protected $table = 'proyek_mentors';

    protected $fillable = [
        'mentor_id',
        'judul_proyek',
        'deskripsi',
        'file_proyek'
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
}