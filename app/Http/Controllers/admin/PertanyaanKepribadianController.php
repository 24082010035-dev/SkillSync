<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoalKepribadian;
use Illuminate\Http\Request;
use App\Models\KategoriKepribadian;

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
        $request->validate([
            'kategori_id' => 'required|exists:kategori_kepribadian,id',
            'pertanyaan' => 'required'
        ]);

        SoalKepribadian::create([
            'kategori_id' => $request->kategori_id,
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()
            ->route('pertanyaan.index')
            ->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    public function create()
    {
        $kategori = KategoriKepribadian::all();

        return view(
            'admin.pertanyaan.create',
            compact('kategori')
        );
    }


       public function edit($id)
{
    $soal = SoalKepribadian::findOrFail($id);
    $kategori = KategoriKepribadian::all();

    return view(
        'admin.pertanyaan.edit',
        compact('soal', 'kategori')
    );
}

    public function update(Request $request, $id)
{
    $request->validate([
        'kategori_id' => 'required|exists:kategori_kepribadian,id',
        'pertanyaan' => 'required'
    ]);

    $soal = SoalKepribadian::findOrFail($id);

    $soal->update([
        'kategori_id' => $request->kategori_id,
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