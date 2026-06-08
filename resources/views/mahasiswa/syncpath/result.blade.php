<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Akademik</title>

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

    <div class="bg-white rounded-2xl shadow p-8">

        <div class="text-center mb-8">

            <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm">
                Tes Selesai
            </span>

            <h2 class="text-3xl font-bold text-blue-700 mt-4">
                Hasil Tes Akademik
            </h2>

            <p class="text-gray-500 mt-2">
                Berikut hasil yang diperoleh dari tes SyncPath
            </p>

        </div>

        <!-- Skor Total -->
        <div class="bg-blue-50 rounded-xl p-6 text-center mb-8">

            <p class="text-gray-600 mb-2">
                Skor Total
            </p>

            <h3 class="text-5xl font-bold text-blue-600">
                {{ $hasilTes->skor_total }}
            </h3>

        </div>

        <!-- Detail Kategori -->
        <div class="space-y-4">

            <h3 class="text-xl font-semibold text-blue-700 mb-4">
                Detail Kategori
            </h3>

            @foreach($detailKategori as $detail)

                <div class="border rounded-xl p-4 flex justify-between items-center">

                    <span class="font-medium">
                        {{ $detail->kategori->nama_kategori }}
                    </span>

                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full">
                        {{ $detail->skor }}
                    </span>

                </div>

            @endforeach

        </div>

        <div class="text-center mt-10">

            <a href="{{ route('mahasiswa.dashboard') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl inline-block">

                Kembali ke Dashboard

            </a>

        </div>

    </div>

</div>

</body>
</html>