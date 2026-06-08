<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Kepribadian</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-blue-50 min-h-screen">

<div class="max-w-4xl mx-auto py-12 px-6">

    <div class="mb-6">
        <a href="{{ route('mahasiswa.dashboard') }}"
           class="px-5 py-3 border border-blue-500 text-blue-500 rounded-xl hover:bg-blue-50 inline-block">
            ← Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow p-8">

        <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm">
            SyncMind
        </span>

        <h1 class="text-3xl font-bold text-blue-700 mt-4 mb-4">
            Tes Kepribadian
        </h1>

        <p class="text-slate-600 mb-8">
            Tes ini bertujuan untuk mengenali kecenderungan karakter dan kepribadian Anda berdasarkan pilihan yang diberikan pada setiap pertanyaan.
        </p>

        <ul class="list-disc ml-6 text-slate-600 mb-8">
            <li>Bacalah setiap pernyataan dengan cermat.</li>
            <li>Pilih jawaban yang paling menggambarkan diri Anda.</li>
            <li>Tidak ada jawaban benar atau salah.</li>
            <li>Jawablah dengan jujur sesuai kondisi Anda.</li>
        </ul>

        <a href="{{ route('tes.kepribadian', 1) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl inline-block">
            Mulai Tes
        </a>

    </div>

</div>

</body>
</html>