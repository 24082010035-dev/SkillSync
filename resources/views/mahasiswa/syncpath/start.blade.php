<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncPath</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-sky-50 min-h-screen">

    <div class="max-w-4xl mx-auto py-12 px-6">
        <div class="mb-6">
        <a href="{{ route('mahasiswa.dashboard') }}"
        class="text-sky-600 hover:underline">
            ← Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow p-8">

        <span class="bg-sky-100 text-sky-600 px-4 py-2 rounded-full text-sm">
            SyncPath
        </span>

        <h1 class="text-3xl font-bold text-sky-700 mt-4 mb-4">
            Tes Akademik SyncPath
        </h1>

        <p class="text-slate-600 mb-8">
            Tes ini bertujuan untuk mengukur kemampuan akademik berdasarkan beberapa kategori soal yang tersedia.
            Jawablah setiap pertanyaan dengan teliti sesuai kemampuan Anda.
        </p>

        <ul class="list-disc ml-6 text-slate-600 mb-8">
            <li>Bacalah setiap soal dengan cermat.</li>
            <li>Pilih satu jawaban yang paling sesuai.</li>
            <li>Tidak ada pengurangan nilai untuk jawaban yang salah.</li>
            <li>Hasil tes akan digunakan untuk menentukan kategori kemampuan akademik Anda.</li>
        </ul>

        <a href="{{ route('syncpath.question') }}"
           class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-xl inline-block">
            Mulai Tes
        </a>

    </div>

</div>

</body>
</html>