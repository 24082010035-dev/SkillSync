<?php

namespace App\Http\Controllers;

use App\Models\HasilTes;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilDetailKepribadian;
use App\Models\HasilDetailSyncpath;
use App\Models\HasilDetailSkill;
use Barryvdh\DomPDF\Facade\Pdf;

class SyncInsightController extends Controller
{
    public function index()
    {
        $allSkills = HasilDetailSkill::with('skill')
        ->whereHas('hasilTes', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('jenis_tes', 'skill');
        })
        ->get();

        if ($allSkills->isEmpty()) {

            return view('mahasiswa.syncinsight', [
                'readiness' => 0,
                'level' => 'Belum Ada Data',
                'topSkills' => collect(),
                'lowSkills' => collect(),
                'allSkills' => collect()
            ]);
        }

        $readiness = round(
            $allSkills->avg('skor'),
            0
        );
        $standarIndustri = 80;
        $gap = $readiness - $standarIndustri;

        if ($readiness >= 90) {
            $level = 'Expert';
        } elseif ($readiness >= 80) {
            $level = 'Advanced';
        } elseif ($readiness >= 70) {
            $level = 'Intermediate';
        } else {
            $level = 'Beginner';
        }

        if ($level == 'Expert') {
            $levelColor = 'bg-purple-100 text-purple-700';
        } elseif ($level == 'Advanced') {
            $levelColor = 'bg-green-100 text-green-700';
        } elseif ($level == 'Intermediate') {
            $levelColor = 'bg-yellow-100 text-yellow-700';
        } else {
            $levelColor = 'bg-red-100 text-red-700';
        }
        $learningRecommendation = '';

        if ($readiness < 70) {

            $learningRecommendation =
                'Disarankan memperkuat kompetensi dasar melalui latihan rutin, pengerjaan project sederhana, dan mengikuti kursus pengenalan skill.';

        } elseif ($readiness < 85) {

            $learningRecommendation =
                'Kompetensi sudah cukup baik. Fokus pada pengembangan project nyata, studi kasus, dan pendalaman teknologi yang relevan dengan bidang yang diminati.';

        } else {

            $learningRecommendation =
                'Kompetensi berada pada level tinggi. Disarankan membangun portofolio profesional, mengikuti sertifikasi, serta memperluas pengalaman melalui project industri.';

        }

        $topSkills = $allSkills
            ->sortByDesc('skor')
            ->take(3);

        $lowSkills = $allSkills
            ->sortBy('skor')
            ->take(3);

        $rekomendasiPengembangan = [];

        foreach ($lowSkills as $skill) {

            $rekomendasiPengembangan[] =
                $skill->skill->nama_skill . ' : ' .
                ($skill->skill->rekomendasi_pengembangan
                    ?? 'Perbanyak latihan dan pengalaman proyek.');
        }

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
        $hasilSyncpath = HasilTes::where(
            'user_id',
            Auth::id()
        )
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
            'skillScores'
        ));
    }
    public function exportPdf()
    {
        $allSkills = HasilDetailSkill::with('skill')
            ->whereHas('hasilTes', function ($query) {
                $query->where('user_id', Auth::id())
                    ->where('jenis_tes', 'skill');
            })
            ->get();

        if ($allSkills->isEmpty()) {
            return back();
        }
        

        $readiness = round(
            $allSkills->avg('skor'),
            0
        );

        $standarIndustri = 80;
        $gap = $readiness - $standarIndustri;

        if ($readiness >= 90) {
            $level = 'Expert';
        } elseif ($readiness >= 80) {
            $level = 'Advanced';
        } elseif ($readiness >= 70) {
            $level = 'Intermediate';
        } else {
            $level = 'Beginner';
        }

        $topSkills = $allSkills
            ->sortByDesc('skor')
            ->take(3);

        $lowSkills = $allSkills
            ->sortBy('skor')
            ->take(3);

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

        $hasilSyncpath = HasilTes::where(
            'user_id',
            Auth::id()
        )
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
        $rekomendasiPengembangan = [];

        $pdf = Pdf::loadView(
            'mahasiswa.pdf.syncinsight_pdf',
            compact(
                'readiness',
                'standarIndustri',
                'gap',
                'level',
                'topSkills',
                'lowSkills',
                'allSkills',
                'kepribadianDominan',
                'rekomendasiKarier',
                'rekomendasiPengembangan'
            )
        );

        return $pdf->download('SyncInsight_Report.pdf');
    }
}