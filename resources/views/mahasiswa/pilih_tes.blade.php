<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tes - SkillSync</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-blue-50 text-gray-800 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <div class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">

        <div class="flex items-center gap-2">

            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                S
            </div>

            <h1 class="text-xl font-semibold text-blue-600">
                SkillSync
            </h1>

        </div>

        <div class="flex items-center gap-4">

            <span class="text-blue-600 font-medium">
                {{ Auth::user()->nama }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">

                    Logout
                </button>
            </form>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="flex-grow px-6 py-10">

        <!-- BACK -->
        <a href="{{ route('mahasiswa.dashboard') }}"
            class="text-blue-500 hover:underline mb-6 inline-block">

            ← Kembali

        </a>

        <!-- TITLE -->
        <div class="text-center mb-10">

            <h2 class="text-3xl font-bold text-blue-700">
                Tes Diagnostik Awal
            </h2>

            <p class="text-blue-500 mt-2">
                Ikuti tes untuk mengetahui kepribadian dan level skill Anda
            </p>

        </div>

        <!-- CARD CONTAINER -->
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

            <!-- TES KEPRIBADIAN -->
            <div class="bg-white p-8 rounded-2xl shadow-md text-center">

                <div class="bg-blue-100 w-20 h-20 mx-auto flex items-center justify-center rounded-full text-3xl">
                    🧠
                </div>

                <h3 class="text-xl font-semibold text-blue-600 mt-5">
                    Tes Kepribadian
                </h3>

                <p class="text-blue-500 mt-3 text-sm leading-relaxed">
                    Kenali tipe kepribadian Anda melalui serangkaian pertanyaan
                    yang dirancang untuk memahami karakteristik dan preferensi kerja Anda.
                </p>

                <div class="text-left mt-5 text-sm text-blue-600 space-y-2">

                    <p>✓ 20 pertanyaan</p>
                    <p>✓ Durasi ±10 menit</p>
                    <p>✓ Analisis kepribadian</p>
                    <p>✓ Rekomendasi karier</p>

                </div>

                <a href="{{ route('tes.kepribadian') }}"
                    class="block mt-6 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">

                    Mulai Tes Kepribadian

                </a>

            </div>

            <!-- TES SKILL -->
            <div class="bg-white p-8 rounded-2xl shadow-md text-center">

                <div class="bg-blue-100 w-20 h-20 mx-auto flex items-center justify-center rounded-full text-3xl">
                    &lt;/&gt;
                </div>

                <h3 class="text-xl font-semibold text-blue-600 mt-5">
                    Tes Skill Kompetensi
                </h3>

                <p class="text-blue-500 mt-3 text-sm leading-relaxed">
                    Uji kemampuan teknis Anda melalui soal-soal kompetensi
                    sesuai dengan bidang keahlian yang dipilih.
                </p>

                <div class="text-left mt-5 text-sm text-blue-600 space-y-2">

                    <p>✓ Pilih bidang kompetensi</p>
                    <p>✓ Soal sesuai jurusan</p>
                    <p>✓ Evaluasi skill teknis</p>
                    <p>✓ Pemetaan kompetensi</p>

                </div>

                <a href="{{ route('tes.skill') }}"
                    class="block mt-6 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">

                    Mulai Tes Skill

                </a>

            </div>

        </div>

        <!-- NOTE -->
        <div class="max-w-4xl mx-auto mt-10 bg-white p-5 rounded-xl shadow text-center text-blue-600 text-sm">

            💡 <span class="font-semibold">Catatan:</span>

            Hasil tes akan ditampilkan pada halaman
            <span class="font-semibold">Peta Kompetensi Mahasiswa</span>
            dalam bentuk pemetaan skill dan rekomendasi karier.

        </div>

    </div>

    <!-- FOOTER -->
    <div class="bg-white text-center py-6 text-sm text-blue-600">

        <p class="font-semibold">
            Hubungi Kami
        </p>

        <p>Email: info@skillsync.com</p>

        <p>Telepon: +62 812-3456-7890</p>

        <p class="mt-3 text-gray-500">
            © 2026 SkillSync. Platform pembelajaran untuk masa depan Anda.
        </p>

    </div>

</body>
</html>