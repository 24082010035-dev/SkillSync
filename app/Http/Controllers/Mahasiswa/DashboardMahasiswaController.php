<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilTes;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilDetailKepribadian;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        $hasilSyncMind = HasilTes::where('user_id', Auth::id())
            ->where('jenis_tes', 'kepribadian')
            ->latest()
            ->first();

        $kategoriDominan = null;

        if ($hasilSyncMind) {

            $kategoriDominan = HasilDetailKepribadian::with('kategori')
                ->where('hasil_tes_id', $hasilSyncMind->id)
                ->orderByDesc('skor')
                ->first();
        }

        return view('mahasiswa.dashboard', compact(
            'hasilSyncMind',
            'kategoriDominan'
        ));
    }
}