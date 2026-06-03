<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Skill {{ $skill->nama_skill }}</title>

```
@vite(['resources/css/app.css'])
```

</head>

<body class="bg-blue-50 min-h-screen">

```
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
    <a href="{{ route('tes.skill') }}"
       class="text-blue-500 hover:underline inline-block mb-6">
        ← Kembali ke Pilih Skill
    </a>

    <!-- Header -->
    <div class="mb-8 text-center">

        <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm">
            {{ $skill->nama_skill }}
        </span>

        <h2 class="text-3xl font-bold text-blue-700 mt-4">
            Tes Skill {{ $skill->nama_skill }}
        </h2>

        <p class="text-blue-500 mt-2">
            Jawab seluruh pertanyaan berikut dengan benar
        </p>

    </div>

    <form>

        @foreach($questions as $index => $question)

            <div class="bg-white p-6 rounded-2xl shadow mb-6">

                <!-- Tag -->
                <div class="mb-4">
                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                        Soal {{ $index + 1 }}
                    </span>

                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                        Pilihan Ganda
                    </span>
                </div>

                <!-- Pertanyaan -->
                <h3 class="text-blue-700 font-semibold text-lg mb-6">
                    {{ $question->pertanyaan }}
                </h3>

                <!-- Opsi -->
                <div class="space-y-3">

                    <label class="block border rounded-xl p-4 cursor-pointer hover:bg-blue-50">
                        <input type="radio"
                               name="question_{{ $question->id }}"
                               value="A"
                               class="mr-3">

                        {{ $question->opsi_a }}
                    </label>

                    <label class="block border rounded-xl p-4 cursor-pointer hover:bg-blue-50">
                        <input type="radio"
                               name="question_{{ $question->id }}"
                               value="B"
                               class="mr-3">

                        {{ $question->opsi_b }}
                    </label>

                    <label class="block border rounded-xl p-4 cursor-pointer hover:bg-blue-50">
                        <input type="radio"
                               name="question_{{ $question->id }}"
                               value="C"
                               class="mr-3">

                        {{ $question->opsi_c }}
                    </label>

                    <label class="block border rounded-xl p-4 cursor-pointer hover:bg-blue-50">
                        <input type="radio"
                               name="question_{{ $question->id }}"
                               value="D"
                               class="mr-3">

                        {{ $question->opsi_d }}
                    </label>

                </div>

            </div>

        @endforeach

        <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-xl font-semibold">
            Selesai Tes
        </button>

    </form>

</div>
```

</body>
</html>
