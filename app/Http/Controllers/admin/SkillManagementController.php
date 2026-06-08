<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillManagementController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return view(
            'admin.skill.index',
            compact('skills')
        );
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {
        Skill::create([
            'nama_skill' => $request->nama_skill,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('skill.index')
            ->with('success', 'Skill berhasil ditambahkan');
    }

        public function edit($id)
    {
        $skill = Skill::findOrFail($id);

        return view(
            'admin.skill.edit',
            compact('skill')
        );
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->update([
            'nama_skill' => $request->nama_skill,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('skill.index')
            ->with('success', 'Skill berhasil diupdate');
    }

        public function destroy($id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();

        return redirect()
            ->route('skill.index')
            ->with('success', 'Skill berhasil dihapus');
    }
}