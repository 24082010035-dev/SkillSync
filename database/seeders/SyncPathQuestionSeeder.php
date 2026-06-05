<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\Question;
use App\Models\Option;

class SyncPathQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $test = Test::where('slug', 'syncpath')->first();

        if (!$test) return;

        $questions = [
            [
                'question' => 'Saya lebih suka kegiatan yang melibatkan analisis data atau logika.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya tertarik membuat sesuatu yang kreatif dan inovatif.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya suka memecahkan masalah yang kompleks.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya tertarik bekerja di bidang teknologi atau IT.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya lebih suka bekerja secara mandiri dibanding tim besar.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya mudah memahami pola atau sistem.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya suka merencanakan sesuatu secara detail.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya tertarik dengan dunia bisnis atau startup.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya suka belajar hal baru dengan cepat.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
            [
                'question' => 'Saya lebih suka tugas yang punya solusi jelas.',
                'options' => [
                    ['text' => 'Sangat Setuju', 'score' => 5],
                    ['text' => 'Setuju', 'score' => 4],
                    ['text' => 'Netral', 'score' => 3],
                    ['text' => 'Tidak Setuju', 'score' => 2],
                    ['text' => 'Sangat Tidak Setuju', 'score' => 1],
                ]
            ],
        ];

        // DUPLIKASI jadi 20 soal
        $questions = array_merge($questions, $questions);

        foreach ($questions as $q) {

            $question = Question::create([
                'test_id' => $test->id,
                'question_text' => $q['question']
            ]);

            foreach ($q['options'] as $opt) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $opt['text'],
                    'score' => $opt['score']
                ]);
            }
        }
    }
}