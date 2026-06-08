<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\SoalSyncpath;
use App\Models\OpsiSyncpath;
use App\Models\KategoriSyncpath;
use App\Models\HasilTes;
use App\Models\HasilDetailSyncpath;
use Illuminate\Support\Facades\Auth;

class SyncPathController extends Controller
{
    /**
     * HALAMAN AWAL SYNPATH
     * (nanti ini jadi halaman instruksi sebelum mulai tes)
     */
    public function start()
    {
        return view('mahasiswa.syncpath.start');
    }

    /**
     * MULAI TES (soal pertama)
     */
    public function question($number = 1)
    {
        $questions = SoalSyncpath::with('opsi')
            ->orderBy('id')
            ->get();

        $question = $questions[$number - 1] ?? null;

        if (!$question) {
            return redirect()->route('syncpath.result');
        }

        $jawabanSebelumnya = session('jawaban_syncpath', []);

        $jawabanTerpilih = $jawabanSebelumnya[$number] ?? null;

        return view('mahasiswa.syncpath.question', [
            'question' => $question,
            'number' => $number,
            'total' => $questions->count(),
            'jawabanTerpilih' => $jawabanTerpilih
        ]);
    }
    /**
     * SIMPAN JAWABAN
     */
    public function submit(Request $request, $nomor)
    {
        $jawaban = session('jawaban_syncpath', []);

        $jawaban[$nomor] = $request->option_id;

        session([
            'jawaban_syncpath' => $jawaban
        ]);

        $totalSoal = SoalSyncpath::count();

        if ($nomor >= $totalSoal) {

            $jawaban = session('jawaban_syncpath');

            $totalSkor = OpsiSyncpath::whereIn('id', $jawaban)
                ->sum('skor');

            $hasilTes = HasilTes::create([
                'user_id' => Auth::id(),
                'jenis_tes' => 'akademik',
                'skor_total' => $totalSkor,
                'created_at' => now(),
            ]);

            foreach ($jawaban as $opsiId) {

                $opsi = OpsiSyncpath::with('soal')->find($opsiId);

                $kategoriId = $opsi->soal->kategori_id;

                HasilDetailSyncpath::updateOrCreate(
                    [
                        'hasil_tes_id' => $hasilTes->id,
                        'kategori_id' => $kategoriId,
                    ],
                    [
                        'skor' => HasilDetailSyncpath::where(
                            'hasil_tes_id',
                            $hasilTes->id
                        )->where(
                            'kategori_id',
                            $kategoriId
                        )->sum('skor') + $opsi->skor,
                    ]
                );
            }

            session()->forget('jawaban_syncpath');

            return redirect()->route('syncpath.result');
        }

        return redirect()->route(
            'syncpath.question',
            $nomor + 1
        );
    }

    /**
     * HASIL SYNPATH
     */
    public function result()
    {
        $hasilTes = HasilTes::where('user_id', Auth::id())
            ->where('jenis_tes', 'akademik')
            ->latest('id')
            ->first();

        if (!$hasilTes) {
            return redirect()->route('syncpath.start');
        }

        $detailKategori = HasilDetailSyncpath::with('kategori')
            ->where('hasil_tes_id', $hasilTes->id)
            ->get();

        return view(
            'mahasiswa.syncpath.result',
            compact(
                'hasilTes',
                'detailKategori'
            )
        );
    }
}