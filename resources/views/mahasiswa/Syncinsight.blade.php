<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncInsight</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-6">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="text-blue-600 hover:text-blue-800 font-medium">
        ← Kembali ke Dashboard
    </a>

    <h1 class="flex items-center gap-3 text-4xl font-bold text-blue-600 mt-4">

        <svg xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-9 h-9">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M3 3v18h18" />

            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M7 15l4-4 3 3 5-7" />

        </svg>

        SyncInsight

    </h1>

    <p class="text-slate-500 mt-2 mb-8">
        Analisis kompetensi berdasarkan hasil tes yang telah kamu kerjakan.
    </p>
    <!-- RINGKASAN PROFIL KOMPETENSI -->

    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-8 rounded-3xl shadow mb-8">

    <h2 class="text-2xl font-bold mb-6">
        Ringkasan Profil Kompetensi
    </h2>

    <div class="grid md:grid-cols-2 gap-4">

        <div class="bg-white/10 rounded-2xl p-4">
            <p class="text-sm opacity-90">
                Readiness
            </p>

            <p class="text-2xl font-bold">
                {{ $readiness }}%
            </p>
        </div>

        @if($topSkills->count() > 0)
        <div class="bg-white/10 rounded-2xl p-4">
            <p class="text-sm opacity-90">
                Skill Terkuat
            </p>

            <p class="text-2xl font-bold">
                {{ $topSkills->first()->skill->nama_skill }}
            </p>
        </div>
        @endif

        @if($kepribadianDominan)
        <div class="bg-white/10 rounded-2xl p-4">
            <p class="text-sm opacity-90">
                Kepribadian Dominan
            </p>

            <p class="text-2xl font-bold">
                {{ $kepribadianDominan->kategori->nama_kategori }}
            </p>
        </div>
        @endif

        @if($rekomendasiKarier)
        <div class="bg-white/10 rounded-2xl p-4">
            <p class="text-sm opacity-90">
                Jalur Karier
            </p>

            <p class="text-2xl font-bold">
                {{ $rekomendasiKarier->kategori->nama_kategori }}
            </p>
        </div>
        @endif

        <!-- KOMPONEN READINESS -->

<div class="bg-white p-6 rounded-3xl shadow mb-8">

    <h2 class="text-2xl font-bold text-blue-600 mb-6">
        Komponen Readiness Score
    </h2>

    <div class="grid md:grid-cols-3 gap-5">

        <div class="bg-blue-50 rounded-2xl p-5">

            <p class="text-slate-500 text-sm">
                Nilai PHP Terakhir
            </p>

            <h3 class="text-3xl font-bold text-blue-600">
                {{ $nilaiPhp }}
            </h3>

        </div>

        <div class="bg-blue-50 rounded-2xl p-5">

            <p class="text-slate-500 text-sm">
                Nilai Java Terakhir
            </p>

            <h3 class="text-3xl font-bold text-blue-600">
                {{ $nilaiJava }}
            </h3>

        </div>

        <div class="bg-blue-50 rounded-2xl p-5">

            <p class="text-slate-500 text-sm">
                Nilai Rata-rata Proyek
            </p>

            <h3 class="text-3xl font-bold text-blue-600">
                {{ $rataProject }}
            </h3>

        </div>

    </div>

</div>

<!-- RIWAYAT PROYEK -->

<div class="bg-white p-6 rounded-3xl shadow mb-8">

    <h2 class="text-2xl font-bold text-blue-600 mb-6">
        Riwayat Validasi Proyek
    </h2>

    @if($projectDinilai->count())

        <div class="space-y-4">

            @foreach($projectDinilai as $proyek)

                <div class="border border-slate-200 rounded-2xl p-5">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-bold text-lg">

                                {{ $proyek->judul }}

                            </h3>

                            <p class="text-sm text-slate-500">

                                Status : Sudah Dinilai Mentor

                            </p>

                        </div>

                        <div class="text-right">

                            <p class="text-slate-500 text-sm">
                                Nilai
                            </p>

                            <h3 class="text-2xl font-bold text-blue-600">

                                {{ $proyek->nilai }}

                            </h3>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-slate-50 p-6 rounded-2xl text-center text-slate-500">

            Belum ada proyek yang dinilai mentor.

        </div>

    @endif

</div>
    </div>

</div>
    <!-- CARD RINGKASAN -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-6 rounded-3xl shadow">

            <p class="text-slate-500 mb-2">
                Skill Readiness
            </p>

            <h2 class="text-4xl font-bold text-blue-600">
                {{ $readiness }}%
            </h2>

            <span class="
                inline-block mt-4 px-4 py-2 rounded-full text-sm font-semibold
                {{ $levelColor }}
            ">
                {{ $level }}
            </span>

        </div>

        <div class="bg-white p-6 rounded-3xl shadow">
            <p class="text-slate-500 mb-2">
                Standar Industri
            </p>

            <h2 class="text-4xl font-bold text-green-600">
                {{ $standarIndustri }}%
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow">
            <p class="text-slate-500 mb-2">
                Skill Gap
            </p>

            <h2 class="text-4xl font-bold {{ $gap >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $gap >= 0 ? '+' : '' }}{{ $gap }}%
            </h2>
        </div>

    </div>

    <!-- TOP SKILL -->
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="flex items-center gap-2 text-2xl font-bold mb-4 text-blue-600">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
                class="w-6 h-6">

                <path d="M10 2l2.09 4.26L17 7l-3.5 3.41.83 4.84L10 13l-4.33 2.25.83-4.84L3 7l4.91-.74L10 2z"/>

            </svg>

            Skill Terkuat

        </h2>
        @foreach($topSkills as $skill)

            <div class="flex justify-between border-b py-3">

                <span>
                    {{ $skill->skill->nama_skill }}
                </span>

                <span class="font-bold">
                    {{ $skill->skor }}
                </span>

            </div>

        @endforeach

    </div>

    <!-- LOW SKILL -->
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="flex items-center gap-2 text-2xl font-bold mb-4 text-orange-500">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 18L9 11.25l4.5 4.5L21.75 7.5"/>

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.5 7.5h5.25v5.25"/>

            </svg>

            Perlu Ditingkatkan

        </h2>

        @foreach($lowSkills as $skill)

            <div class="flex justify-between border-b py-3">

                <span>
                    {{ $skill->skill->nama_skill }}
                </span>

                <span class="font-bold">
                    {{ $skill->skor }}
                </span>

            </div>

        @endforeach

    </div>

    <!-- DETAIL KOMPETENSI -->
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="flex items-center gap-2 text-2xl font-bold mb-6 text-blue-600">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 3v18M8.25 12h12M8.25 6h8.25M8.25 18h5.25"/>

            </svg>

            Detail Kompetensi

        </h2>

        @foreach($allSkills as $skill)

            <div class="mb-5">

                <div class="flex justify-between mb-2">

                    <span class="font-medium">
                        {{ $skill->skill->nama_skill }}
                    </span>

                    <span class="font-bold">
                        {{ $skill->skor }}%
                    </span>

                </div>

                <div class="w-full bg-slate-200 rounded-full h-3">

                    <div
                        class="bg-blue-500 h-3 rounded-full"
                        style="width: {{ $skill->skor }}%">
                    </div>

                </div>

            </div>

        @endforeach

    </div>

    @if($kepribadianDominan)

    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="flex items-center gap-2 text-2xl font-bold text-purple-600 mb-4">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3c-3.866 0-7 3.134-7 7a6.96 6.96 0 003.11 5.82c.36.24.64.62.64 1.06V18h6.5v-1.12c0-.44.28-.82.64-1.06A6.96 6.96 0 0019 10c0-3.866-3.134-7-7-7z"/>

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 21h6"/>

            </svg>

            Profil Kepribadian

        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <p class="text-slate-500 mb-2">
                    Kategori Dominan
                </p>

                <h3 class="text-3xl font-bold text-purple-600">
                    {{ $kepribadianDominan->kategori->nama_kategori }}
                </h3>

            </div>

            <div>

                <p class="text-slate-500 mb-2">
                    Skor Kepribadian
                </p>

                <h3 class="text-3xl font-bold text-purple-600">
                    {{ $kepribadianDominan->skor }}
                </h3>

            </div>

        </div>

    </div>

    @endif

    @if($rekomendasiKarier)

    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="flex items-center gap-2 text-2xl font-bold text-indigo-600 mb-4">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 21h16.5M6.75 18V8.25m5.25 9.75V3.75m5.25 14.25v-6"/>

            </svg>

            Rekomendasi Jalur Karier

        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <p class="text-slate-500 mb-2">
                    Bidang Dominan
                </p>

                <h3 class="text-3xl font-bold text-indigo-600">

                    {{ $rekomendasiKarier->kategori->nama_kategori }}

                </h3>

            </div>

            <div>

                <p class="text-slate-500 mb-2">
                    Skor Kecocokan
                </p>

                <h3 class="text-3xl font-bold text-indigo-600">

                    {{ $rekomendasiKarier->skor }}

                </h3>

            </div>

        </div>

    </div>

    @endif
    <!-- PETA KOMPETENSI -->
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-2xl font-bold text-blue-600 mb-6">
            Peta Kompetensi
        </h2>

        <div class="max-w-lg mx-auto h-80">
            <canvas id="radarChart"></canvas>
        </div>

    </div>
    <div class="bg-white p-6 rounded-3xl shadow mb-8">

        <h2 class="text-2xl font-bold text-blue-600 mb-4">
            Perbandingan Skor Skill
        </h2>

        <div style="height:400px;">
            <canvas id="barChart"></canvas>
        </div>

    </div>
    <!-- INSIGHT -->
    <div class="bg-white p-6 rounded-3xl shadow">

        <h2 class="flex items-center gap-2 text-2xl font-bold text-blue-600 mb-4">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3c-3.866 0-7 3.134-7 7a6.96 6.96 0 003.11 5.82c.36.24.64.62.64 1.06V18h6.5v-1.12c0-.44.28-.82.64-1.06A6.96 6.96 0 0019 10c0-3.866-3.134-7-7-7z"/>

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 21h6"/>

            </svg>

            Insight Kompetensi

        </h2>
        <p class="text-slate-600 leading-relaxed">

            Berdasarkan hasil analisis yang telah dilakukan,
            Anda memiliki tingkat kesiapan kompetensi sebesar

            <strong>{{ $readiness }}%</strong>

            dengan kategori

            <strong>{{ $level }}</strong>.

            <br><br>

            @if($topSkills->count() > 0)

                Skill yang paling menonjol saat ini adalah

                <strong>
                    {{ $topSkills->first()->skill->nama_skill }}
                </strong>.

            @endif
            <br><br>
            @if($kepribadianDominan)

                Profil kepribadian dominan Anda termasuk kategori

                <strong>
                    {{ $kepribadianDominan->kategori->nama_kategori }}
                </strong>,

                yang menunjukkan kecenderungan dan gaya kerja yang paling kuat berdasarkan hasil tes kepribadian.

            @endif
            <br><br>
            @if($rekomendasiKarier)

                Berdasarkan hasil SyncPath, jalur karier yang paling sesuai adalah

                <strong>
                    {{ $rekomendasiKarier->kategori->nama_kategori }}
                </strong>.

            @endif
            <br><br>
            @if($lowSkills->count() > 0)

                Untuk meningkatkan kesiapan kompetensi secara keseluruhan,
                disarankan untuk lebih fokus mengembangkan kemampuan pada area

                <strong>
                    {{ $lowSkills->first()->skill->nama_skill }}
                </strong>.

            @endif

        </p>

    </div>

    <!-- REKOMENDASI PENGEMBANGAN -->
    <div class="bg-white p-6 rounded-3xl shadow mt-8">

        <h2 class="text-2xl font-bold text-blue-600 mb-4">
            Rekomendasi Pengembangan
        </h2>

        <div class="space-y-3">

            @foreach($rekomendasiPengembangan as $rekomendasi)

                <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">

                    {{ $rekomendasi }}

                </div>

            @endforeach

        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('radarChart');

    new Chart(ctx, {
        type: 'radar',
        data: {
            labels: @json($skillLabels),
            datasets: [{
                label: 'Skor Kompetensi',
                data: @json($skillScores),
                fill: true,
                backgroundColor: 'rgba(59,130,246,0.2)',
                borderColor: 'rgb(59,130,246)',
                pointBackgroundColor: 'rgb(59,130,246)',
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
    <script>

    const barCtx = document.getElementById('barChart');

    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: @json($skillLabels),
            datasets: [{
                label: 'Skor Skill',
                data: @json($skillScores),
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    </script>
</body>
</html>