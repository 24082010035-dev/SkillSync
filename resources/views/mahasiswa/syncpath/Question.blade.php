<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Akademik SyncPath</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-blue-50 min-h-screen">

<!-- Navbar -->
<div class="bg-white px-6 py-4 shadow flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
        S
    </div>

    <h1 class="text-blue-600 font-semibold text-lg">
        SkillSync
    </h1>
</div>

<div class="max-w-4xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <a href="{{ route('syncpath.start') }}"
       class="text-blue-500 hover:underline inline-block mb-6">
        ← Kembali
    </a>

    <!-- Header -->
    <div class="mb-8 text-center">

        <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm">
            SyncPath
        </span>

        <h2 class="text-3xl font-bold text-blue-700 mt-4">
            Tes Akademik
        </h2>

        <p class="text-blue-500 mt-2">
            Jawab seluruh pertanyaan berikut dengan benar
        </p>

    </div>

   <form method="POST"
      action="{{ route('syncpath.submit', $number) }}">
        @csrf

        <input type="hidden"
               name="number"
               value="{{ $number }}">

        <!-- Progress -->
        <div class="mb-6">

            <div class="flex justify-between text-sm text-blue-600 mb-2">
                <span>Soal {{ $number }} dari {{ $total }}</span>
                <span>{{ round(($number / $total) * 100) }}%</span>
            </div>

            <div class="w-full bg-blue-100 rounded-full h-2">
                <div class="bg-blue-500 h-2 rounded-full"
                     style="width: {{ ($number / $total) * 100 }}%">
                </div>
            </div>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow mb-6">

            <div class="mb-4">

                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                    Soal {{ $number }}
                </span>

                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                    Pilihan Ganda
                </span>

            </div>

            <h3 class="text-blue-700 font-semibold text-lg mb-6">
                {{ $question->pertanyaan }}
            </h3>

            <div class="space-y-3">

                @foreach($question->opsi as $option)

        <label class="block border rounded-xl p-4 hover:bg-blue-50 cursor-pointer">

            <input type="radio"
                name="option_id"
                value="{{ $option->id }}"
                {{ $jawabanTerpilih == $option->id ? 'checked' : '' }}
                required
                class="mr-3">

            {{ $option->teks_opsi }}

        </label>

        @endforeach
            </div>

        </div>

        <div class="flex justify-between items-center mt-6">

            @if($number > 1)

                <a href="{{ route('syncpath.question', $number - 1) }}"
                class="px-5 py-3 border border-blue-500 text-blue-500 rounded-xl hover:bg-blue-50">
                    ← Sebelumnya
                </a>

            @else

                <a href="{{ route('syncpath.start') }}"
                class="px-5 py-3 border border-blue-500 text-blue-500 rounded-xl hover:bg-blue-50">
                    ← Kembali
                </a>

            @endif

            @if($number < $total)

                <button type="submit"
                        class="px-5 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-semibold">
                    Selanjutnya →
                </button>

            @else

                <button type="submit"
                        class="px-5 py-3 bg-green-500 hover:bg-green-600 text-white rounded-xl font-semibold">
                    Selesai Tes
                </button>

            @endif

        </div>

    </form>

</div>

</body>
</html>