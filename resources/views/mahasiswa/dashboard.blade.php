<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 text-gray-800 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-50">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 bg-gradient-to-r from-sky-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold shadow-md">
            S
        </div>

        <div>
            <h1 class="text-xl font-bold text-sky-600">
                SkillSync
            </h1>

            <p class="text-xs text-slate-400">
                Smart Learning Platform
            </p>
        </div>

    </div>

    <div class="flex items-center gap-4">

        <div class="text-right">
            <p class="font-semibold text-slate-700">
                Halo, {{ auth()->user()->nama }}
            </p>

            <p class="text-sm text-slate-400">
                {{ session('role_user') }}
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-xl">
                Logout
            </button>
        </form>

    </div>

</nav>

<!-- HEADER -->
<section class="px-8 pt-8">

    <div class="bg-gradient-to-r from-sky-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg">

        <div class="max-w-2xl">

            <h1 class="text-3xl font-bold mb-3">
                Selamat Datang di SkillSync 👋
            </h1>

            <p class="text-sky-100 leading-relaxed">
                Tingkatkan kompetensi, kenali potensi diri, dan persiapkan karir impianmu melalui berbagai fitur pembelajaran interaktif.
            </p>

            <button class="mt-6 bg-white text-sky-600 px-5 py-2 rounded-xl font-semibold hover:bg-slate-100 transition">
                Mulai Eksplorasi
            </button>

        </div>

    </div>

</section>

<!-- HASIL TES -->
<section class="px-8 mt-8">

    <div class="flex items-center justify-between mb-5">

        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                Hasil Tes Kepribadian
            </h2>

            <p class="text-slate-400 text-sm">
                Analisis potensi dan karakter belajar Anda
            </p>
        </div>

    </div>

    @php
        $data = null;
    @endphp

    @if($data)

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col lg:flex-row gap-8">

        <!-- KIRI -->
        <div class="bg-gradient-to-b from-sky-500 to-cyan-500 text-white rounded-3xl p-8 w-full lg:w-72 flex flex-col justify-center items-center shadow-md">

            <h1 class="text-5xl font-bold mb-2">
                {{ $data->tipe_kepribadian }}
            </h1>

            <p class="text-sky-100">
                Arsitek
            </p>

        </div>

        <!-- KANAN -->
        <div class="flex-1">

            <p class="text-slate-600 leading-relaxed mb-8">
                {{ $data->deskripsi }}
            </p>

            <!-- BAR -->
            <div class="space-y-5">

                <div>
                    <div class="flex justify-between mb-2 text-sm font-medium">
                        <span>Analitis</span>
                        <span>{{ $data->analitis }}%</span>
                    </div>

                    <div class="w-full bg-slate-200 h-3 rounded-full">
                        <div class="bg-sky-500 h-3 rounded-full"
                             style="width: {{ $data->analitis }}%">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-2 text-sm font-medium">
                        <span>Kreatif</span>
                        <span>{{ $data->kreatif }}%</span>
                    </div>

                    <div class="w-full bg-slate-200 h-3 rounded-full">
                        <div class="bg-cyan-500 h-3 rounded-full"
                             style="width: {{ $data->kreatif }}%">
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @else

    <!-- EMPTY STATE -->
    <div class="bg-white rounded-3xl border border-dashed border-sky-200 p-12 text-center shadow-sm">

        <div class="w-24 h-24 mx-auto bg-sky-100 rounded-full flex items-center justify-center mb-6">

            <span class="text-5xl">
                🧠
            </span>

        </div>

        <h3 class="text-2xl font-bold text-sky-600 mb-3">
            Belum Ada Hasil Tes
        </h3>

        <p class="text-slate-500 max-w-xl mx-auto leading-relaxed mb-8">
            Kenali kepribadian, gaya belajar, dan potensi karirmu melalui tes diagnostik SkillSync.
        </p>

        <a href="#"
           class="bg-sky-500 hover:bg-sky-600 transition text-white px-6 py-3 rounded-2xl inline-block shadow-md">

            Mulai Tes Kepribadian
        </a>

        <p class="text-sm text-slate-400 mt-4">
            Gratis • 15-20 menit
        </p>

    </div>

    @endif

</section>

<!-- FITUR -->
<section class="px-8 py-10">

    <div class="flex items-center justify-between mb-6">

        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                Fitur Platform
            </h2>

            <p class="text-slate-400 text-sm">
                Jelajahi berbagai fitur pengembangan kompetensi
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <!-- CARD -->
        <a href="#" class="group">

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 h-full">

                <div class="flex justify-between items-start mb-6">

                    <div class="bg-sky-100 p-4 rounded-2xl">

                        <svg class="w-7 h-7 text-sky-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>

                    </div>

                    <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full">
                        Gratis
                    </span>

                </div>

                <h3 class="font-bold text-lg text-slate-800 mb-2">
                    Tes Diagnostik Awal
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Tes kepribadian dan kompetensi untuk mengenali potensi diri.
                </p>

            </div>

        </a>

        <!-- CARD -->
        <a href="#" class="group">

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 h-full">

                <div class="flex justify-between items-start mb-6">

                    <div class="bg-cyan-100 p-4 rounded-2xl">

                        <svg class="w-7 h-7 text-cyan-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 17l6-6 4 4 8-8"/>
                        </svg>

                    </div>

                    <span class="bg-sky-100 text-sky-600 text-xs px-3 py-1 rounded-full">
                        Populer
                    </span>

                </div>

                <h3 class="font-bold text-lg text-slate-800 mb-2">
                    Peta Kompetensi
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Visualisasi skill dan perkembangan kompetensi Anda.
                </p>

            </div>

        </a>

        <!-- CARD -->
        <a href="#" class="group">

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 h-full">

                <div class="flex justify-between items-start mb-6">

                    <div class="bg-indigo-100 p-4 rounded-2xl">

                        <svg class="w-7 h-7 text-indigo-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>

                    </div>

                    <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">
                        Premium
                    </span>

                </div>

                <h3 class="font-bold text-lg text-slate-800 mb-2">
                    Career Gap Scanner
                </h3>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Analisis kesenjangan skill untuk mencapai karir impian.
                </p>

            </div>

        </a>

    </div>

</section>

<!-- PREMIUM -->
<section class="px-8 pb-10">

    <div class="bg-gradient-to-r from-yellow-400 to-orange-400 rounded-3xl p-8 text-white shadow-lg flex flex-col lg:flex-row justify-between gap-6 items-center">

        <div>

            <h2 class="text-3xl font-bold mb-2">
                Upgrade ke Premium 🚀
            </h2>

            <p class="text-yellow-100">
                Nikmati akses unlimited semua fitur SkillSync tanpa batas.
            </p>

        </div>

        <div class="text-center lg:text-right">

            <p class="text-lg font-semibold">
                Rp 99.000 / bulan
            </p>

            <p class="text-yellow-100 text-sm mb-4">
                atau Rp 25.000 / hasil
            </p>

            <a href="#"
               class="bg-white text-orange-500 px-6 py-3 rounded-2xl font-semibold hover:bg-slate-100 transition inline-block">

                Upgrade Sekarang
            </a>

        </div>

    </div>

</section>

</body>
</html>