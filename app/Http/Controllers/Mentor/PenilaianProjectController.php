<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyek;

class PenilaianProjectController extends Controller
{
    public function show($id)
    {
        $project = Proyek::findOrFail($id);

        return view(
            'mentor.penilaian_project',
            compact('project')
        );
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100',
            'feedback' => 'required'
        ]);

        $project = Proyek::findOrFail($id);

        $project->nilai = $request->nilai;
        $project->feedback = $request->feedback;
        $project->status = 'selesai';

        $project->save();

        return redirect('/mentor/dashboard')
            ->with('success', 'Penilaian berhasil disimpan');
    }
}