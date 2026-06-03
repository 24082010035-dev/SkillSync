<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Skill</title>

```
@vite(['resources/css/app.css'])
```

</head>

<body class="bg-blue-50 min-h-screen">

```
<!-- Navbar -->
<div class="bg-white px-6 py-4 shadow flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded">
        S
    </div>

    <h1 class="text-blue-600 font-semibold">
        SkillSync
    </h1>
</div>

<div class="max-w-4xl mx-auto p-6 text-center">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="text-blue-500">
        ← Kembali
    </a>

    <h2 class="text-2xl font-bold text-blue-700 mt-6">
        Hasil Tes Skill - {{ $detailSkill->skill->nama_skill }}
    </h2>

    <p class="text-blue-500 mt-2">
        Berikut adalah hasil evaluasi kompetensi Anda
    </p>

    <!-- SKOR -->
    <div class="bg-white mt-8 p-8 rounded-xl shadow">

        <h3 class="text-blue-700 font-semibold mb-4">
            Skor Keseluruhan
        </h3>

        <div class="text-5xl font-bold text-blue-600">
            {{ $detailSkill->skor }}
        </div>

    </div>
    <div class="mt-4">
        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-medium">
            Level: {{ $detailSkill->level_dicapai }}
        </span>
    </div>

    <!-- LEVEL -->
    <div class="bg-white mt-6 p-6 rounded-xl shadow text-left">

        <h3 class="text-blue-700 font-semibold mb-4">
            Level Kompetensi
        </h3>

        <div class="flex justify-between items-center">
            <span>
                {{ $detailSkill->skill->nama_skill }}
            </span>

            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full">
                {{ $detailSkill->level_dicapai }}
            </span>
        </div>

    </div>

    <!-- REKOMENDASI -->
    <div class="bg-white mt-6 p-6 rounded-xl shadow text-left">

        <h3 class="text-blue-700 font-semibold mb-4">
            Rekomendasi
        </h3>

        @if($detailSkill->level_dicapai == 'Beginner')

            <p>✓ Pelajari konsep dasar secara lebih mendalam</p>
            <p>✓ Kerjakan latihan soal secara rutin</p>
            <p>✓ Ikuti kursus atau tutorial pemula</p>

        @elseif($detailSkill->level_dicapai == 'Intermediate')

            <p>✓ Tingkatkan kemampuan melalui project nyata</p>
            <p>✓ Perdalam materi lanjutan</p>
            <p>✓ Bangun portofolio sederhana</p>

        @else

            <p>✓ Pertahankan kemampuan yang sudah dimiliki</p>
            <p>✓ Kerjakan project kompleks</p>
            <p>✓ Mulai mempelajari teknologi lanjutan</p>

        @endif

    </div>

    <a href="{{ route('tes.skill') }}"
       class="inline-block mt-6 bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">

        Tes Skill Lain

    </a>

</div>
```

</body>
</html>
