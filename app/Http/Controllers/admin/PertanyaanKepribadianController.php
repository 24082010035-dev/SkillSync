<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoalKepribadian;
use Illuminate\Http\Request;

class PertanyaanKepribadianController extends Controller
{
    public function index()
    {
        $soals = SoalKepribadian::all();

        return view(
            'admin.pertanyaan.index',
            compact('soals')
        );
    }

    public function store(Request $request)
    {
        SoalKepribadian::create([
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()
            ->route('pertanyaan.index')
            ->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    public function create()
    {
        return view('admin.pertanyaan.create');
    }


        public function edit($id)
    {
        $soal = SoalKepribadian::findOrFail($id);

        return view(
            'admin.pertanyaan.edit',
            compact('soal')
        );
    }

    public function update(Request $request, $id)
    {
        $soal = SoalKepribadian::findOrFail($id);

        $soal->update([
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()
            ->route('pertanyaan.index')
            ->with('success', 'Pertanyaan berhasil diupdate');
    }

    public function destroy($id)
    {
        $soal = SoalKepribadian::findOrFail($id);
        $soal->delete();

        return redirect()
            ->route('pertanyaan.index')
            ->with('success', 'Pertanyaan berhasil dihapus');
    }
}