<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\UploadProyekMentor;
use App\Models\Proyek;

class MentorDashboardController extends Controller
{
    public function index()
    {
        // Materi / proyek yang diupload mentor
        $proyekMentor = UploadProyekMentor::where(
            'mentor_id',
            auth()->id()
        )
        ->latest()
        ->get();

        // Antrian project mahasiswa untuk dinilai
        $antrianProject = Proyek::where(
            'status',
            'pending'
        )
        ->latest()
        ->get();

        return view('mentor.dashboard', [
            'proyekMentor' => $proyekMentor,
            'antrianProject' => $antrianProject
        ]);
        
    }
    
}