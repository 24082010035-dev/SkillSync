<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
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
}