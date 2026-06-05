<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        $tests = [
            [
                'name' => 'SyncPath',
                'slug' => 'syncpath',
                'description' => 'Tes arah karir dan akademik berdasarkan minat dan bakat.'
            ],
            [
                'name' => 'SyncMind',
                'slug' => 'syncmind',
                'description' => 'Tes kepribadian dan gaya belajar.'
            ],
            [
                'name' => 'SyncGap',
                'slug' => 'syncgap',
                'description' => 'Analisis gap skill dengan kebutuhan industri.'
            ],
            [
                'name' => 'SyncInsight',
                'slug' => 'syncinsight',
                'description' => 'Laporan hasil gabungan semua tes.'
            ],
            [
                'name' => 'SyncCareer Match',
                'slug' => 'synccareer',
                'description' => 'Rekomendasi karir dan magang berbasis AI.'
            ],
        ];

        foreach ($tests as $test) {
            Test::create($test);
        }
    }
}