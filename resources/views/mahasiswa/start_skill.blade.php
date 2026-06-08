<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Skill {{ $skill->nama_skill }}</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-blue-50 min-h-screen">

<div class="max-w-4xl mx-auto py-12 px-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('tes.skill') }}"
           class="px-5 py-3 border border-blue-500 text-blue-500 rounded-xl hover:bg-blue-50 inline-block">
            ← Kembali ke Pilih Skill
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-3xl shadow p-8">

        <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm">
            {{ $skill->nama_skill }}
        </span>

        <h1 class="text-3xl font-bold text-blue-700 mt-4 mb-4">
            Tes Skill {{ $skill->nama_skill }}
        </h1>

        <p class="text-slate-600 mb-8">
            Tes ini bertujuan untuk mengukur kemampuan dan pemahaman Anda pada bidang
            <strong>{{ $skill->nama_skill }}</strong>.
            Jawablah setiap pertanyaan dengan cermat sesuai pengetahuan yang Anda miliki.
        </p>

        <ul class="list-disc ml-6 text-slate-600 mb-8">
            <li>Bacalah setiap soal dengan teliti.</li>
            <li>Pilih satu jawaban yang paling benar.</li>
            <li>Setiap soal memiliki bobot nilai yang sama.</li>
            <li>Kerjakan seluruh soal hingga selesai.</li>
        </ul>

        <a href="{{ route('skill.soal', [$skill->id, 1]) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl inline-block">
            Mulai Tes
        </a>

    </div>

</div>

</body>
</html>