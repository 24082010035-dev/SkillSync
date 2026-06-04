<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalKepribadian;

class SoalKepribadianController extends Controller
{
   public function index()
    {
            $totalSoal = \DB::table('soal_kepribadian')->count();
            $totalOpsi = \DB::table('opsi_kepribadian')->count();
            $totalKategori = \DB::table('kategori_kepribadian')->count();
            $totalBobot = \DB::table('bobot_kepribadian')->count();

            return view(
                'admin.soal_kepribadian.index',
                compact(
                    'totalSoal',
                    'totalOpsi',
                    'totalKategori',
                    'totalBobot'
                )
            );
        }
}