<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Soal Kepribadian</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-7xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">
    <a href="{{ url('/admin/dashboard') }}"
       class="inline-flex items-center gap-2
              bg-blue-500 hover:bg-cyan-500
              text-white
              px-5 py-3
              rounded-xl
              shadow-lg
              transition duration-300">

        ← Dashboard Admin

    </a>
</div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold">
            Kelola Soal Kepribadian 🧠
        </h1>

        <p class="mt-2 text-blue-100">
            Manajemen pertanyaan, opsi jawaban, kategori dan bobot kepribadian.
        </p>

    </div>

        <!-- Statistik -->
    <div class="flex gap-4 mb-8">

        <div class="bg-white rounded-2xl shadow p-5 flex-1">
            <p class="text-gray-500 text-sm">Total Soal</p>
            <h2 class="text-3xl font-bold text-blue-600">
                {{ $totalSoal }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-5 flex-1">
            <p class="text-gray-500 text-sm">Total Opsi</p>
            <h2 class="text-3xl font-bold text-green-600">
                {{ $totalOpsi }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-5 flex-1">
            <p class="text-gray-500 text-sm">Kategori</p>
            <h2 class="text-3xl font-bold text-purple-600">
                {{ $totalKategori }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-5 flex-1">
            <p class="text-gray-500 text-sm">Bobot</p>
            <h2 class="text-3xl font-bold text-red-600">
                {{ $totalBobot }}
            </h2>
        </div>

    </div>
    <!-- Menu -->
    <div class="grid md:grid-cols-2 gap-6">

    <!-- Pertanyaan -->
    <a href="{{ route('pertanyaan.index') }}"
    class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition block">

        <div class="text-4xl mb-4">
            📋
        </div>

        <div class="mt-4">
            <span
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl inline-block">

                Kelola Pertanyaan

            </span>
        </div>

        <p class="text-gray-500 mt-2">
            Tambah, edit dan hapus soal kepribadian.
        </p>

    </a>

        <!-- Opsi -->
        <a href="{{ route('opsi.index') }}"
        class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition block">

            <div class="text-4xl mb-4">
                📝
            </div>

            <div class="mt-4">
                <span
                    class="bg-blue-500 text-white px-4 py-2 rounded-xl inline-block">

                    Kelola Opsi

                </span>
            </div>

            <p class="text-gray-500 mt-2">
                Kelola pilihan jawaban setiap soal.
            </p>

        </a>

        <!-- Kategori -->
        <a href="{{ route('kategori.index') }}"
           class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition">

            <div class="text-4xl mb-4">
                🧠
            </div>

            <div class="mt-4">
                <span
                    class="bg-blue-500 text-white px-4 py-2 rounded-xl inline-block">

                    Kelola Kategori

                </span>
            </div>

            <p class="text-gray-500 mt-2">
                Mengatur kategori kepribadian mahasiswa.
            </p>

        </a>

        <!-- Bobot -->
        <a href="{{ route('bobot.index') }}"
           class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition">

            <div class="text-4xl mb-4">
                📊
            </div>

            <div class="mt-4">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">

                    Kelola Bobot

                </button>
            </div>

            <p class="text-gray-500 mt-2">
                Mengatur nilai setiap opsi jawaban.
            </p>

        </a>

    </div>

</div>

</body>
</html>