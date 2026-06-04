<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadProyekMentor;

class UploadProyekMentorController extends Controller
{
    public function create()
    {
        return view('mentor.upload_proyek');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_proyek' => 'required',
        ]);

        $filePath = null;

        if ($request->hasFile('file_proyek')) {
            $filePath = $request->file('file_proyek')
                ->store('proyek_mentor', 'public');
        }

        UploadProyekMentor::create([
            'mentor_id' => auth()->id(),
            'judul_proyek' => $request->judul_proyek,
            'deskripsi' => $request->deskripsi,
            'file_proyek' => $filePath,
        ]);

        return redirect('/mentor/dashboard')
            ->with('success', 'Proyek berhasil diupload!');
    }
}