<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;

class ProjectController extends Controller
{
    public function create()
    {
        return view('mahasiswa.upload_project');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_proyek' => 'required|mimes:pdf,zip,rar|max:20480',
            'tipe_project' => 'required'
        ]);

        $file = $request->file('file_proyek')
            ->store('projects', 'public');

        Proyek::create([
            'user_id' => auth()->id(),
            'nama_proyek' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_proyek' => $file,
            'tipe_project' => $request->tipe_project,
            'status' => $request->tipe_project == 'penilaian'
                ? 'pending'
                : 'repository'
        ]);

        return back()->with('success', 'Project berhasil diupload');
    }
    public function repository()
{
    $proyek = Proyek::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('mahasiswa.repository', compact('proyek'));
}
}