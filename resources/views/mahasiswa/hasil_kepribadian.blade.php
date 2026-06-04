<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Kepribadian</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-blue-50 min-h-screen">

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
        Hasil Tes Kepribadian
    </h2>

    <p class="text-blue-500 mt-2">
        Berikut adalah hasil evaluasi kepribadian Anda
    </p>

    <!-- SKOR TOTAL -->
    <div class="bg-white mt-8 p-8 rounded-xl shadow">

        <h3 class="text-blue-700 font-semibold mb-4">
            Skor Keseluruhan
        </h3>

        <div class="text-5xl font-bold text-blue-600">
            {{ $hasilTes->skor_total }}
        </div>

    </div>

    <!-- KATEGORI DOMINAN -->
    <div class="mt-4">
        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-medium">
            Kategori Dominan:
            {{ $kategoriDominan ?? 'Belum ditentukan' }}
        </span>
    </div>

    <!-- DETAIL KATEGORI -->
    <div class="bg-white mt-6 p-6 rounded-xl shadow text-left">

        <h3 class="text-blue-700 font-semibold mb-4">
            Detail Skor Kategori
        </h3>

        @foreach($detailKategori as $detail)

            <div class="flex justify-between items-center border-b py-3">

                <span>
                    Kategori {{ $detail->kategori_id }}
                </span>

                <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full">
                    {{ $detail->skor }}
                </span>

            </div>

        @endforeach

    </div>

    <!-- INTERPRETASI -->
    <div class="bg-white mt-6 p-6 rounded-xl shadow text-left">

        <h3 class="text-blue-700 font-semibold mb-4">
            Interpretasi
        </h3>

        <p>
            Hasil tes menunjukkan kecenderungan karakter berdasarkan jawaban yang Anda berikan.
            Gunakan hasil ini sebagai bahan refleksi untuk mengenali potensi diri dan pengembangan karier.
        </p>

    </div>

    <a href="{{ route('pilih.tes') }}"
       class="inline-block mt-6 bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">

        Kembali ke Pilihan Tes

    </a>

</div>

</body>
</html>