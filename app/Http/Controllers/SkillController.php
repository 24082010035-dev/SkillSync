<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswaProfile;

        $skills = $mahasiswa->jurusan->skills;

         return view('mahasiswa.pilih_tes_skill', compact('skills', 'mahasiswa'));
    }
}