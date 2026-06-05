<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class SyncPathController extends Controller
{
    /**
     * HALAMAN AWAL SYNPATH
     * (nanti ini jadi halaman instruksi sebelum mulai tes)
     */
    public function start()
    {
        $test = Test::where('slug', 'syncpath')->first();

        if (!$test) {
            abort(404, 'Test SyncPath belum tersedia');
        }

        return view('syncpath.start', compact('test'));
    }

    /**
     * MULAI TES (soal pertama)
     */
    public function question($number = 1)
    {
        $test = Test::where('slug', 'syncpath')->first();

        $questions = Question::where('test_id', $test->id)
            ->with('options')
            ->orderBy('id')
            ->get();

        $question = $questions[$number - 1] ?? null;

        if (!$question) {
            return redirect()->route('syncpath.result');
        }

        return view('syncpath.question', [
            'question' => $question,
            'number' => $number,
            'total' => $questions->count()
        ]);
    }

    /**
     * SIMPAN JAWABAN
     */
    public function submit(Request $request, $question_id)
    {
        $request->validate([
            'option_id' => 'required'
        ]);

        Result::create([
            'user_id' => Auth::id(),
            'question_id' => $question_id,
            'option_id' => $request->option_id,
        ]);

        $next = $request->number + 1;

        return redirect()->route('syncpath.question', $next);
    }

    /**
     * HASIL SYNPATH
     */
    public function result()
    {
        $test = Test::where('slug', 'syncpath')->first();

        $results = Result::where('user_id', Auth::id())
            ->whereHas('question', function ($q) use ($test) {
                $q->where('test_id', $test->id);
            })
            ->with('option')
            ->get();

        return view('syncpath.result', compact('results'));
    }
}