<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKepribadian;

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
}