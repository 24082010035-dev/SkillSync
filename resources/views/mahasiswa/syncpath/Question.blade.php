<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncPath</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-sky-50 min-h-screen">

<div class="max-w-4xl mx-auto py-10 px-6">

    <div class="bg-white rounded-3xl shadow p-8">

        <div class="mb-6">
            <span class="bg-sky-100 text-sky-600 px-3 py-1 rounded-full text-sm">
                Soal {{ $number }} dari {{ $total }}
            </span>
        </div>

        <h2 class="text-2xl font-bold text-slate-800 mb-8">
            {{ $question->question_text }}
        </h2>

        <form method="POST"
              action="{{ route('syncpath.submit', $question->id) }}">
            @csrf

            <input type="hidden"
                   name="number"
                   value="{{ $number }}">

            <div class="space-y-3">

                @foreach($question->options as $option)

                    <label class="block border rounded-xl p-4 hover:bg-sky-50 cursor-pointer">

                        <input type="radio"
                               name="option_id"
                               value="{{ $option->id }}"
                               required
                               class="mr-3">

                        {{ $option->option_text }}

                    </label>

                @endforeach

            </div>

            <button type="submit"
                    class="mt-8 bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-xl">
                Selanjutnya →
            </button>

        </form>

    </div>

</div>

</body>
</html>