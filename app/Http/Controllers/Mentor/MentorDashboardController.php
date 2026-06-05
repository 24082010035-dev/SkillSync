<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\UploadProyekMentor;

class MentorDashboardController extends Controller
{
    public function index()
    {
        $proyekMentor = UploadProyekMentor::where(
            'mentor_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view('mentor.dashboard', [
            'proyekMentor' => $proyekMentor
        ]);
    }
    
}