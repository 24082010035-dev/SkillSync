<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpsiKepribadian;
use App\Models\SoalKepribadian;
use Illuminate\Http\Request;

class OpsiKepribadianController extends Controller
{
    public function index()
    {
        $opsis = OpsiKepribadian::all();

        return view(
            'admin.opsi.index',
            compact('opsis')
        );
    }

    public function create()
{
    $soals = SoalKepribadian::all();

    return view(
        'admin.opsi.create',
        compact('soals')
    );
}

    public function store(Request $request)
{
    $request->validate([
        'soal_id' => 'required|exists:soal_kepribadian,id',
        'opsi' => 'required',
        'skor' => 'required|numeric',
    ]);

    OpsiKepribadian::create([
        'soal_id' => $request->soal_id,
        'opsi' => $request->opsi,
        'skor' => $request->skor,
    ]);

    return redirect()
        ->route('opsi.index')
        ->with('success', 'Opsi berhasil ditambahkan');
}

        public function edit($id)
    {
        $opsi = OpsiKepribadian::findOrFail($id);
        $soals = SoalKepribadian::all();

        return view(
            'admin.opsi.edit',
            compact('opsi', 'soals')
        );
    }

    public function update(Request $request, $id)
    {
        $opsi = OpsiKepribadian::findOrFail($id);

        $opsi->update([
            'soal_id' => $request->soal_id,
            'opsi' => $request->opsi
        ]);

        return redirect()
            ->route('opsi.index')
            ->with('success', 'Opsi berhasil diupdate');
    }

    public function destroy($id)
    {
        $opsi = OpsiKepribadian::findOrFail($id);

        $opsi->delete();

        return redirect()
            ->route('opsi.index')
            ->with('success', 'Opsi berhasil dihapus');
    }
}