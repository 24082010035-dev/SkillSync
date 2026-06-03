<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class QuestionController extends Controller
{
    public function show(Skill $skill)
    {
        $questions = $skill->questions;

        return view(
            'mahasiswa.soal_skill',
            compact('skill', 'questions')
        );
    }
}