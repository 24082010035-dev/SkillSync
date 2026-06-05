<?php

namespace App\Http\Controllers;

use App\Models\SoalKepribadian;
use Illuminate\Http\Request;
use App\Models\OpsiKepribadian;
use App\Models\HasilTes;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilDetailKepribadian;




class KepribadianController extends Controller
{
    public function show($nomor = 1)
    
    {
        $soal = SoalKepribadian::with('opsi')->get();

        $totalSoal = $soal->count();

        $question = $soal[$nomor - 1] ?? null;

        if (!$question) {
            abort(404);
        }

        $progress = ($nomor / $totalSoal) * 100;
        $jawabanSebelumnya = session('jawaban_kepribadian', []);

        $jawabanTerpilih = $jawabanSebelumnya[$nomor] ?? null;
       

        return view('mahasiswa.tes_kepribadian', compact(
            'question',
            'nomor',
            'totalSoal',
            'progress',
            'jawabanTerpilih'
        ));
    }
   public function submit(Request $request, $nomor)
    {
        $jawaban = session('jawaban_kepribadian', []);

        $jawaban[$nomor] = $request->jawaban;

        session([
            'jawaban_kepribadian' => $jawaban
        ]);

        $totalSoal = SoalKepribadian::count();

        if ($nomor >= $totalSoal) {

            $jawaban = session('jawaban_kepribadian');

            $totalSkor = OpsiKepribadian::whereIn('id', $jawaban)
                ->sum('skor');

            $hasilTes = HasilTes::create([
                'user_id' => Auth::id(),
                'jenis_tes' => 'kepribadian',
                'skor_total' => $totalSkor,
                'created_at' => now(),
            ]);
            $jawaban = session('jawaban_kepribadian');

        foreach ($jawaban as $opsiId) {

            $opsi = OpsiKepribadian::with('soal')->find($opsiId);

            $kategoriId = $opsi->soal->kategori_id;

            HasilDetailKepribadian::updateOrCreate(
                [
                    'hasil_tes_id' => $hasilTes->id,
                    'kategori_id' => $kategoriId,
                ],
                [
                    'skor' => HasilDetailKepribadian::where(
                        'hasil_tes_id',
                        $hasilTes->id
                    )->where(
                        'kategori_id',
                        $kategoriId
                    )->sum('skor') + $opsi->skor,
                ]
            );
        }
            
            session()->forget('jawaban_kepribadian');

            return redirect()->route('hasil.kepribadian', $hasilTes->id);

        }

        return redirect()->route(
            'tes.kepribadian',
            $nomor + 1
        );
    }
    public function hasil(HasilTes $hasilTes)
    {
        $detailKategori = HasilDetailKepribadian::where(
            'hasil_tes_id',
            $hasilTes->id
        )->get();

        return view(
            'mahasiswa.hasil_kepribadian',
            compact(
                'hasilTes',
                'detailKategori'
            )
        );
    }
}