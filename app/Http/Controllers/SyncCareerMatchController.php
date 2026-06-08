<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\HasilTes;
use App\Models\HasilDetailSkill;
use App\Models\HasilDetailKepribadian;
use App\Models\HasilDetailSyncpath;
use App\Models\PosisiKerja;
use App\Models\PosisiMagang;

class SyncCareerMatchController extends Controller
{
    public function index()
    {
        // Skill Terkuat
        $topSkills = HasilDetailSkill::with('skill')
            ->whereHas('hasilTes', function ($query) {
                $query->where('user_id', Auth::id())
                      ->where('jenis_tes', 'skill');
            })
            ->orderByDesc('skor')
            ->take(3)
            ->get();

        // Kepribadian Dominan
        $hasilKepribadian = HasilTes::where(
            'user_id',
            Auth::id()
        )
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

        // SyncPath Dominan
        $hasilSyncpath = HasilTes::where(
            'user_id',
            Auth::id()
        )
        ->where('jenis_tes', 'akademik')
        ->latest('id')
        ->first();

        $syncpathDominan = null;

        if ($hasilSyncpath) {

            $syncpathDominan = HasilDetailSyncpath::with('kategori')
                ->where('hasil_tes_id', $hasilSyncpath->id)
                ->orderByDesc('skor')
                ->first();
        }

        // Career Match
        $careerMatches = collect();

        if ($syncpathDominan) {

            $careerMatches = PosisiKerja::where(
                'kategori_syncpath_id',
                $syncpathDominan->kategori_id
            )->get();

            $careerMatches = $careerMatches->map(function ($career) use ($kepribadianDominan) {

                $score = 70;

                if (
                    $kepribadianDominan &&
                    $career->kategori_kepribadian_id ==
                    $kepribadianDominan->kategori_id
                ) {
                    $score += 30;
                }

                $career->match_score = $score;

                return $career;
            })
            ->sortByDesc('match_score')
            ->values();
        }

        $analitis = 0;
        $kreatif = 0;
        $komunikatif = 0;
        $leadership = 0;

        $recommendedInternships = collect();

        if ($syncpathDominan) {

            $recommendedInternships = PosisiMagang::where(
                'kategori_syncpath_id',
                $syncpathDominan->kategori_id
            )->get();
        }
        if ($hasilKepribadian) {

            $semuaKepribadian = HasilDetailKepribadian::with('kategori')
                ->where('hasil_tes_id', $hasilKepribadian->id)
                ->get();

            foreach ($semuaKepribadian as $item) {

                switch (strtolower($item->kategori->nama_kategori)) {

                    case 'analitis':
                        $analitis = $item->skor;
                        break;

                    case 'kreatif':
                        $kreatif = $item->skor;
                        break;

                    case 'komunikatif':
                        $komunikatif = $item->skor;
                        break;

                    case 'leadership':
                        $leadership = $item->skor;
                        break;
                }
            }
        }
        $radarLabels = [
            'Technical',
            'Analytical',
            'Creative',
            'Communication',
            'Leadership',
            'Career Fit'
        ];

        $radarScores = [
            round($topSkills->avg('skor') ?? 0),
            $analitis,
            $kreatif,
            $komunikatif,
            $leadership,
            $syncpathDominan?->skor ?? 0
        ];
        return view(
            'mahasiswa.synccareermatch',
            compact(
                'topSkills',
                'kepribadianDominan',
                'syncpathDominan',
                'careerMatches',
                'radarLabels',
                'radarScores',
                'recommendedInternships'
            )
        );
    }
}