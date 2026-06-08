<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Skill;

class QuestionManagementController extends Controller
{
    public function index()
    {
        $questions = Question::with('skill')
            ->latest()
            ->get();

        return view(
            'admin.soal_skill.index',
            compact('questions')
        );
    }
    public function create()
    {
        $skills = Skill::all();

        return view(
            'admin.soal_skill.create',
            compact('skills')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required',
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'jawaban_benar' => 'required',
        ]);

        Question::create([
            'skill_id' => $request->skill_id,
            'pertanyaan' => $request->pertanyaan,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        return redirect()
            ->route('admin.soal.index')
            ->with('success', 'Soal berhasil ditambahkan');
    }
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        $skills = Skill::all();

        return view(
            'admin.soal_skill.edit',
            compact('question', 'skills')
        );
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'skill_id' => 'required',
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'jawaban_benar' => 'required',
        ]);

        $question->update([
            'skill_id' => $request->skill_id,
            'pertanyaan' => $request->pertanyaan,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        return redirect()
            ->route('admin.soal.index')
            ->with('success', 'Soal berhasil diperbarui');
    }
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        return redirect()
            ->route('admin.soal.index')
            ->with('success', 'Soal berhasil dihapus');
    }
}