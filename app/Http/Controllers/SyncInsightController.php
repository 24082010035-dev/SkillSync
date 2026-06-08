<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilTes;
use App\Models\HasilDetailKepribadian;
use App\Models\HasilDetailSyncpath;
use App\Models\HasilDetailSkill;
use App\Models\Proyek;

class SyncInsightController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL NILAI TERAKHIR SETIAP SKILL
        |--------------------------------------------------------------------------
        */
        $allSkills = HasilDetailSkill::with('skill')
            ->whereHas('hasilTes', function ($query) {
                $query->where('user_id', Auth::id())
                      ->where('jenis_tes', 'skill');
            })
            ->orderByDesc('id')
            ->get()
            ->unique('skill_id')
            ->values();
        /*
        |--------------------------------------------------------------------------
        | JIKA BELUM ADA DATA SKILL
        |--------------------------------------------------------------------------
        */

        if ($allSkills->isEmpty()) {
            return view('mahasiswa.syncinsight', [
                'readiness' => 0,
                'level' => 'Belum Ada Data',
                'levelColor' => 'bg-gray-100 text-gray-700',
                'standarIndustri' => 80,
                'gap' => 0,
                'topSkills' => collect(),
                'lowSkills' => collect(),
                'allSkills' => collect(),
                'kepribadianDominan' => null,
                'rekomendasiKarier' => null,
                'rekomendasiPengembangan' => [],
                'skillLabels' => [],
                'skillScores' => [],
                'projectDinilai' => collect(),
                'rataProject' => 0,
                'nilaiPhp' => 0,
                'nilaiJava' => 0,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL NILAI PHP TERAKHIR
        |--------------------------------------------------------------------------
        */
        $phpSkill = $allSkills->first(function ($item) {
            return strtolower($item->skill->nama_skill) == 'php';
        });
        $nilaiPhp = $phpSkill ? $phpSkill->skor : 0;
        /*
        |--------------------------------------------------------------------------
        | AMBIL NILAI JAVA TERAKHIR
        |--------------------------------------------------------------------------
        */
        $javaSkill = $allSkills->first(function ($item) {
            return strtolower($item->skill->nama_skill) == 'java';
        });
        $nilaiJava = $javaSkill ? $javaSkill->skor : 0;
        /*
        |--------------------------------------------------------------------------
        | AMBIL PROJECT YANG SUDAH DINILAI MENTOR
        |--------------------------------------------------------------------------
        */
        $projectDinilai = Proyek::where('user_id', Auth::id())
            ->where('status', 'selesai')
            ->whereNotNull('nilai')
            ->latest()
            ->get();
        /*
        |--------------------------------------------------------------------------
        | RATA-RATA NILAI PROJECT
        |--------------------------------------------------------------------------
        */
        $rataProject = round(
            $projectDinilai->avg('nilai') ?? 0,
            0
        );
        /*
        |--------------------------------------------------------------------------
        | READINESS SCORE
        | PHP + JAVA + PROJECT
        |--------------------------------------------------------------------------
        */
        $readiness = round(
            (
                $nilaiPhp +
                $nilaiJava +
                $rataProject
            ) / 3,
            0
        );
        /*
        |--------------------------------------------------------------------------
        | STANDAR INDUSTRI & GAP
        |--------------------------------------------------------------------------
        */
        $standarIndustri = 80;
        $gap = $readiness - $standarIndustri;
        /*
        |--------------------------------------------------------------------------
        | LEVEL KOMPETENSI
        |--------------------------------------------------------------------------
        */
        if ($readiness >= 90) {
            $level = 'Expert';
        } elseif ($readiness >= 80) {
            $level = 'Advanced';
        } elseif ($readiness >= 70) {
            $level = 'Intermediate';
        } else {
            $level = 'Beginner';
        }
        /*
        |--------------------------------------------------------------------------
        | WARNA LEVEL
        |--------------------------------------------------------------------------
        */
        if ($level == 'Expert') {
            $levelColor = 'bg-purple-100 text-purple-700';
        } elseif ($level == 'Advanced') {
            $levelColor = 'bg-green-100 text-green-700';
        } elseif ($level == 'Intermediate') {
            $levelColor = 'bg-yellow-100 text-yellow-700';
        } else {
            $levelColor = 'bg-red-100 text-red-700';
        }
        /*
        |--------------------------------------------------------------------------
        | TOP SKILL
        |--------------------------------------------------------------------------
        */
        $topSkills = $allSkills
            ->sortByDesc('skor')
            ->take(3);
        /*
        |--------------------------------------------------------------------------
        | LOW SKILL
        |--------------------------------------------------------------------------
        */
        $lowSkills = $allSkills
            ->sortBy('skor')
            ->take(3);
        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI PENGEMBANGAN
        |--------------------------------------------------------------------------
        */
        $rekomendasiPengembangan = [];
        foreach ($lowSkills as $skill) {
            switch (strtolower($skill->skill->nama_skill)) {
                case 'php':
                    $rekomendasi =
                        'Pelajari Laravel dan bangun proyek CRUD yang lebih kompleks.';
                    break;
                case 'java':
                    $rekomendasi =
                        'Perkuat OOP Java dan coba membuat aplikasi desktop atau Android.';

                    break;

                case 'database':
                    $rekomendasi =

                        'Latih kemampuan SQL, JOIN, dan desain database relasional.';

                    break;
                case 'ui/ux':
                    $rekomendasi =
                        'Perbanyak latihan desain di Figma dan pembuatan prototype.';

                    break;
                case 'javascript':
                    $rekomendasi =

                        'Pelajari DOM, AJAX, dan framework modern seperti React.';

                    break;

                default:
                    $rekomendasi =
                        'Perbanyak latihan serta proyek nyata untuk meningkatkan kompetensi.';

            }
            $rekomendasiPengembangan[] =
                $skill->skill->nama_skill . ' : ' . $rekomendasi;
        }
        /*
        |--------------------------------------------------------------------------
        | HASIL KEPRIBADIAN TERAKHIR
        |--------------------------------------------------------------------------
        */
        $hasilKepribadian = HasilTes::where('user_id', Auth::id())
            ->where('jenis_tes', 'kepribadian')
            ->latest('id')
            ->first();

        $kepribadianDominan = null;

        if ($hasilKepribadian) {
            $kepribadianDominan = HasilDetailKepribadian::with('kategori')
                ->where('hasil_tes_id', $hasilKepribadian->id)
                ->orderByDesc('skor')
                ->first();
        }

        /*
        |--------------------------------------------------------------------------
        | HASIL SYNCPATH TERAKHIR
        |--------------------------------------------------------------------------
        */
        $hasilSyncpath = HasilTes::where('user_id', Auth::id())
            ->where('jenis_tes', 'akademik')
            ->latest('id')
            ->first();

        $rekomendasiKarier = null;

        if ($hasilSyncpath) {
            $rekomendasiKarier = HasilDetailSyncpath::with('kategori')
                ->where('hasil_tes_id', $hasilSyncpath->id)
                ->orderByDesc('skor')
                ->first();
        }
        /*
        |--------------------------------------------------------------------------
        | DATA CHART
        |--------------------------------------------------------------------------
        */
        $skillLabels = $allSkills
            ->pluck('skill.nama_skill')
            ->toArray();

        $skillScores = $allSkills
            ->pluck('skor')
            ->toArray();

        return view('mahasiswa.syncinsight', compact(
            'readiness',
            'standarIndustri',
            'gap',
            'level',
            'levelColor',
            'topSkills',
            'lowSkills',
            'allSkills',
            'kepribadianDominan',
            'rekomendasiKarier',
            'rekomendasiPengembangan',
            'skillLabels',
            'skillScores',
            'projectDinilai',
            'rataProject',
            'nilaiPhp',
            'nilaiJava'

        ));

    }

}

