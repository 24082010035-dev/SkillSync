<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BobotKepribadian;
use App\Models\OpsiKepribadian;
use App\Models\KategoriKepribadian;
use Illuminate\Http\Request;

class BobotKepribadianController extends Controller
{
    public function index()
    {
        $bobots = BobotKepribadian::all();

        return view(
            'admin.bobot.index',
            compact('bobots')
        );
    }

    public function create()
    {
        $opsis = OpsiKepribadian::all();
        $kategoris = KategoriKepribadian::all();

        return view(
            'admin.bobot.create',
            compact('opsis', 'kategoris')
        );
    }

    public function store(Request $request)
    {
        BobotKepribadian::create([
            'opsi_id' => $request->opsi_id,
            'kategori_id' => $request->kategori_id,
            'nilai' => $request->nilai
        ]);

        return redirect()
            ->route('bobot.index')
            ->with('success', 'Bobot berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bobot = BobotKepribadian::findOrFail($id);

        $opsis = OpsiKepribadian::all();

        $kategoris = KategoriKepribadian::all();

        return view(
            'admin.bobot.edit',
            compact(
                'bobot',
                'opsis',
                'kategoris'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $bobot = BobotKepribadian::findOrFail($id);

        $bobot->update([
            'opsi_id' => $request->opsi_id,
            'kategori_id' => $request->kategori_id,
            'nilai' => $request->nilai
        ]);

        return redirect()
            ->route('bobot.index')
            ->with(
                'success',
                'Bobot berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $bobot = BobotKepribadian::findOrFail($id);

        $bobot->delete();

        return redirect()
            ->route('bobot.index')
            ->with(
                'success',
                'Bobot berhasil dihapus'
            );
    }
}
