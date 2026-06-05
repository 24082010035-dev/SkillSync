<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Option;
use App\Models\Result;

class TestController extends Controller
{
    /**
     * TAMPILKAN SOAL TEST (SyncPath / SyncMind / SyncGap)
     */
    public function show($slug)
    {
        $test = Test::with(['questions.options'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('tes.index', compact('test'));
    }

    /**
     * SUBMIT JAWABAN USER
     */
    public function submit(Request $request, $slug)
    {
        $request->validate([
            'answers' => 'required|array'
        ]);

        $test = Test::where('slug', $slug)->firstOrFail();

        $totalScore = 0;

        foreach ($request->answers as $questionId => $optionId) {

            $option = Option::find($optionId);

            if ($option) {
                $totalScore += $option->score;
            }
        }

        $result = Result::create([
            'user_id' => auth()->id(),
            'test_id' => $test->id,
            'total_score' => $totalScore,
        ]);

        return redirect()
            ->route('tes.result', $test->slug)
            ->with('success', 'Tes berhasil disimpan!');
    }

    /**
     * HALAMAN HASIL TES
     */
    public function result($slug)
    {
        $test = Test::where('slug', $slug)->firstOrFail();

        $result = Result::where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->latest()
            ->first();

        return view('tes.result', compact('test', 'result'));
    }
}