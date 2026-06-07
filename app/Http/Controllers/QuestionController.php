<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\HasilTes;
use App\Models\HasilDetailSkill;


class QuestionController extends Controller
{
    public function start($skill)
    {
        $skill = \App\Models\Skill::findOrFail($skill);

        return view('mahasiswa.start_skill', compact('skill'));
    }
    public function show(Skill $skill, $nomor = 1)
{
        $questions = $skill->questions;

        $totalSoal = $questions->count();

        $question = $questions[$nomor - 1] ?? null;

        if (!$question) {
            abort(404);
        }

        $progress = ($nomor / $totalSoal) * 100;

        $jawabanTerpilih = session('jawaban.' . $question->id);

        return view(
            'mahasiswa.soal_skill',
            compact(
                'skill',
                'question',
                'nomor',
                'totalSoal',
                'progress',
                'jawabanTerpilih'
            )
        );
    }
    public function submit(Request $request, Skill $skill, $nomor)
    {
        $questions = $skill->questions;

        $question = $questions[$nomor - 1];

        $request->session()->put(
            'jawaban.' . $question->id,
            $request->input('question_' . $question->id)
        );

        $totalSoal = $questions->count();
        if ($nomor < $totalSoal) {

            return redirect()->route(
                'skill.soal',
                [$skill->id, $nomor + 1]
            );
        }
        $questions = $skill->questions;

        $benar = 0;

        foreach ($questions as $question) {

            $jawabanUser = session('jawaban.' . $question->id);

            if ($jawabanUser == $question->jawaban_benar) {
                $benar++;
            }
        }

        $totalSoal = $questions->count();

        $skor = ($benar / $totalSoal) * 100;

        DB::transaction(function () use ($skor, $skill, &$hasilTes) {

            $hasilTes = HasilTes::create([
                'user_id' => Auth::id(),
                'jenis_tes' => 'Skill',
                'skor_total' => $skor,
                'created_at' => now(),
            ]);

            if ($skor < 60) {
                $level = 'Beginner';
            } elseif ($skor < 80) {
                $level = 'Intermediate';
            } else {
                $level = 'Advanced';
            }

            HasilDetailSkill::create([
                'hasil_tes_id' => $hasilTes->id,
                'skill_id' => $skill->id,
                'skor' => $skor,
                'level_dicapai' => $level,
            ]);
        });
    $request->session()->forget('jawaban');
    return redirect()->route('hasil.tes', $hasilTes->id);
    }
}