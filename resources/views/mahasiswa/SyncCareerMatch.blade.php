<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncCareer Match</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-6">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="text-blue-600 hover:text-blue-800 font-medium">
        ← Kembali ke Dashboard
    </a>

    <h1 class="text-4xl font-bold text-blue-600 mt-4">
        SyncCareer Match
    </h1>

    <div class="grid md:grid-cols-4 gap-4 mt-8 mb-8">

        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Career Path</p>
            <h3 class="font-bold text-lg">
                {{ $syncpathDominan->kategori->nama_kategori ?? '-' }}
            </h3>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Kepribadian Dominan</p>
            <h3 class="font-bold text-lg">
                {{ $kepribadianDominan->kategori->nama_kategori ?? '-' }}
            </h3>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Top Skill</p>
            <h3 class="font-bold text-lg">
                {{ $topSkills->first()->skill->nama_skill ?? '-' }}
            </h3>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Career Match</p>
            <h3 class="font-bold text-lg text-green-600">
                {{ $careerMatches->first()->match_score ?? 0 }}%
            </h3>
        </div>

    </div>

    <p class="text-slate-500 mt-2 mb-8">
        Rekomendasi karier berdasarkan hasil asesmen yang telah dikerjakan.
    </p>

    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-2xl font-bold text-blue-600 mb-4">
            Profile Fit Analysis
        </h2>

        <div style="height:400px">
            <canvas id="careerRadar"></canvas>
        </div>

    </div>

    {{-- Karier Utama --}}
    @if($syncpathDominan)

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-8 rounded-3xl shadow mb-8">

        <p class="text-sm opacity-80">
            Karier Paling Cocok
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $syncpathDominan->kategori->nama_kategori }}
        </h2>

    </div>

    @endif

    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-xl font-bold text-blue-600 mb-4">
            Alasan Rekomendasi
        </h2>

        <ul class="space-y-3">

            <li>
                • Career path dominan:
                <strong>
                    {{ $syncpathDominan->kategori->nama_kategori ?? '-' }}
                </strong>
            </li>

            <li>
                • Kepribadian dominan:
                <strong>
                    {{ $kepribadianDominan->kategori->nama_kategori ?? '-' }}
                </strong>
            </li>

            <li>
                • Skill terkuat:
                <strong>
                    {{ $topSkills->pluck('skill.nama_skill')->implode(', ') }}
                </strong>
            </li>

        </ul>

    </div>

    {{-- Top Career --}}
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-2xl font-bold text-blue-600 mb-4">
            Rekomendasi Karier
        </h2>

        @forelse($careerMatches as $career)

            <div class="border-b py-4">

                <div class="flex justify-between items-center">

                    <h3 class="font-bold text-lg">
                        {{ $career->nama_posisi }}
                    </h3>

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $career->match_score }}%
                    </span>

                </div>

                <p class="text-slate-600 mt-2">
                    {{ $career->deskripsi }}
                </p>

            </div>

        @empty

            <p class="text-slate-500">
                Belum ada rekomendasi karier.
            </p>

        @endforelse

    </div>

    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-2xl font-bold text-orange-600 mb-4">
            Posisi Magang yang Direkomendasikan
        </h2>

        @forelse($recommendedInternships as $internship)

            <div class="border-b py-4">

                <h3 class="font-bold text-lg">
                    {{ $internship->nama_posisi }}
                </h3>

                <p class="text-slate-600 mt-1">
                    {{ $internship->deskripsi }}
                </p>

            </div>

        @empty

            <p class="text-slate-500">
                Belum ada rekomendasi magang.
            </p>

        @endforelse

    </div>
    {{-- Skill Pendukung --}}
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-2xl font-bold text-green-600 mb-4">
            Skill Terkuat
        </h2>

        @foreach($topSkills as $skill)

            <div class="mb-4">

                <div class="flex justify-between mb-1">

                    <span>
                        {{ $skill->skill->nama_skill }}
                    </span>

                    <span class="font-semibold">
                        {{ $skill->skor }}%
                    </span>

                </div>

                <div class="w-full bg-gray-200 rounded-full h-3">

                    <div
                        class="bg-green-500 h-3 rounded-full"
                        style="width: {{ $skill->skor }}%">
                    </div>

                </div>

            </div>

            @endforeach

        </div>


    {{-- Kepribadian --}}
    @if($kepribadianDominan)

    <div class="bg-white p-6 rounded-3xl shadow">

        <h2 class="text-2xl font-bold text-purple-600 mb-4">
            Kepribadian Dominan
        </h2>

        <h3 class="text-3xl font-bold">
            {{ $kepribadianDominan->kategori->nama_kategori }}
        </h3>

        <p class="text-slate-500 mt-2">
            Skor : {{ $kepribadianDominan->skor }}
        </p>

    </div>

    @endif

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('careerRadar');

new Chart(ctx, {

    type: 'radar',

    data: {

        labels: @json($radarLabels),

        datasets: [{

            label: 'Career Profile',

            data: @json($radarScores),

            backgroundColor: 'rgba(249,115,22,0.2)',

            borderColor: 'rgb(249,115,22)',

            pointBackgroundColor: 'rgb(249,115,22)',

            borderWidth: 2

        }]
    },

    options: {

        responsive: true,

        scales: {

            r: {

                min: 0,

                max: 100,

                ticks: {
                    stepSize: 20
                }
            }
        }
    }
});

</script>
</body>
</html>