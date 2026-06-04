<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Kepribadian</title>

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

    <a href="{{ route('pilih.tes') }}"
       class="text-blue-500 hover:underline inline-block mb-6">
        ← Kembali ke Pilih Tes
    </a>

    <!-- Header -->
    <div class="mb-8 text-center">

        <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm">
            Tes Kepribadian
        </span>

        <h2 class="text-3xl font-bold text-blue-700 mt-4">
            Tes Kepribadian
        </h2>

        <p class="text-blue-500 mt-2">
            Jawab pertanyaan sesuai dengan kondisi diri Anda
        </p>

    </div>
    <!-- Progress -->
<div class="mb-6">

    <div class="flex justify-between text-sm text-blue-600 mb-2">
        <span>Soal {{ $nomor }} dari {{ $totalSoal }}</span>
        <span>{{ round($progress) }}%</span>
    </div>

    <div class="w-full bg-blue-100 rounded-full h-2">
        <div class="bg-blue-500 h-2 rounded-full"
             style="width: {{ $progress }}%">
        </div>
    </div>

</div>
<form method="POST"
      action="{{ route('tes.kepribadian.submit', $nomor) }}">
    @csrf

    <div class="bg-white p-6 rounded-2xl shadow mb-6">

        <div class="mb-4">

            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                Soal {{ $nomor }}
            </span>

            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                Kepribadian
            </span>

        </div>

        <h3 class="text-blue-700 font-semibold text-lg mb-6">
            {{ $question->pertanyaan }}
        </h3>

        <div class="space-y-3">

            @foreach($question->opsi as $opsi)

                <label class="block border rounded-xl p-4 hover:bg-blue-50">

                    <input type="radio"
                           name="jawaban"
                           value="{{ $opsi->id }}"
                           class="mr-3"
                           required>

                    {{ $opsi->opsi }}

                </label>

            @endforeach

        </div>

    </div>
    <div class="flex justify-end">

    <button type="submit"
            class="px-5 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-semibold">
        Selanjutnya →
    </button>

</div>

</form>

</div>

</body>
</html>