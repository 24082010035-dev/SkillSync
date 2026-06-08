<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKepribadian;
use Illuminate\Http\Request;

class KategoriKepribadianController extends Controller
{
    public function index()
    {
        $kategori = KategoriKepribadian::all();

        return view(
            'admin.kategori.index',
            compact('kategori')
        );
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        KategoriKepribadian::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriKepribadian::findOrFail($id);

        return view(
            'admin.kategori.edit',
            compact('kategori')
        );
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriKepribadian::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = KategoriKepribadian::findOrFail($id);

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}