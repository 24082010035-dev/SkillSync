<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-slate-50 text-gray-800 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-50">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 bg-sky-500 rounded-xl flex items-center justify-center text-white font-bold shadow">
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
            <button class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-xl">
                Logout
            </button>
        </form>

    </div>

</nav>

<!-- HEADER -->
<section class="px-8 pt-8">

    <div class="bg-sky-500 rounded-3xl p-10 text-white shadow-lg">

        <h1 class="text-3xl font-bold mb-3">
            Selamat Datang di SkillSync 👋
        </h1>

        <p class="text-sky-100 max-w-2xl">
            Tingkatkan kompetensi, kenali potensi diri, dan bangun masa depanmu bersama platform ini.
        </p>

    </div>

</section>

<!-- HASIL TES -->
<section class="px-8 mt-8">

    <div class="mb-5">
        <h2 class="text-2xl font-bold text-slate-800">
            Hasil Tes SynchMind
        </h2>
        <p class="text-slate-400 text-sm">
            Analisis potensi dan karakter belajar Anda
        </p>
    </div>

   @if($hasilSyncMind)

        <div class="bg-white rounded-3xl p-8 shadow border border-slate-100">
            <div class="bg-white rounded-3xl p-8 shadow border border-slate-100">

            <h3 class="text-xl font-bold text-sky-600 mb-3">
                Hasil Tes Kepribadian
            </h3>

            <p class="text-slate-600 mb-2">
                @if($kategoriDominan)

                <p class="text-sky-600 font-semibold mb-2">
                    {{ $kategoriDominan->kategori->nama_kategori }}
                </p>

            @endif
            </p>

            <p class="text-slate-500 text-sm">
                Tes terakhir: {{ \Carbon\Carbon::parse($hasilSyncMind->created_at)->translatedFormat('d F Y') }}
            </p>

            <a href="{{ route('hasil.kepribadian', $hasilSyncMind->id) }}"
            class="inline-block mt-4 bg-sky-500 text-white px-4 py-2 rounded-xl">
                Lihat Detail
            </a>

        </div>
        </div>

    @else

        <div class="bg-white rounded-3xl border border-dashed border-sky-200 p-12 text-center">

            <div class="text-5xl mb-4">🧠</div>

            <h3 class="text-2xl font-bold text-sky-600 mb-2">
                Belum Ada Hasil Tes
            </h3>

            <p class="text-slate-500 max-w-xl mx-auto leading-relaxed mb-6">
                Mulai tes untuk melihat hasil kamu dan kenali potensi diri secara lebih mendalam.
            </p>

            <a href="{{ route('tes.kepribadian') }}"
               class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-2xl inline-block shadow-md transition">

                Mulai Tes
            </a>

            <p class="text-sm text-slate-400 mt-4">
                Gratis • 15–20 menit
            </p>

        </div>

    @endif

</section>

<!-- FITUR PLATFORM -->
<section class="px-8 py-10">

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">
            Fitur Platform
        </h2>
        <p class="text-slate-400 text-sm">
            Jelajahi 6 fitur SkillSync untuk pengembangan kariermu
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <!-- SyncPath -->
        <a href="{{ route('syncpath.start') }}" class="group">

            <div class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
                    🛣️
                </div>

                <h3 class="font-bold text-lg text-sky-600 mb-2">
                    SyncPath
                </h3>

                <p class="text-sm text-slate-500">
                    Tes Arah Karir & Akademik sesuai minat dan bakatmu.
                </p>

            </div>

        </a>

        <!-- SyncMind -->
        <a href="{{ route('tes.kepribadian') }}" class="group">
            <div class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
                    🧠
                </div>

                <h3 class="font-bold text-lg text-sky-600 mb-2">SyncMind</h3>
                <p class="text-sm text-slate-500">
                    Tes kepribadian & gaya belajar.
                </p>

            </div>
        </a>

        <!-- SyncGap -->
        <a href="{{ route('tes.skill') }}" class="group">
            <div class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
                    📊
                </div>

                <h3 class="font-bold text-lg text-sky-600 mb-2">SyncGap</h3>
                <p class="text-sm text-slate-500">
                    Analisis gap skill terhadap kebutuhan industri.
                </p>

            </div>
        </a>

        <!-- SyncInsight -->
        <a href="{{ route('syncinsight') }}" class="group">
            <div class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
                    📈
                </div>

                <h3 class="font-bold text-lg text-sky-600 mb-2">SyncInsight</h3>
                <p class="text-sm text-slate-500">
                    Laporan hasil tes lengkap dalam satu dashboard.
                </p>

            </div>
        </a>

        <!-- SyncCareer Match -->
        <a href="#" class="group">
            <div class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
                    🎯
                </div>

                <h3 class="font-bold text-lg text-sky-600 mb-2">SyncCareer Match</h3>
                <p class="text-sm text-slate-500">
                    Rekomendasi karir & magang berbasis AI.
                </p>

            </div>
        </a>

        <!-- SyncProject -->
<a href="{{ route('project.create') }}" class="group">
    <div class="bg-white border border-sky-200 p-6 rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition relative overflow-hidden">

        <span class="absolute top-3 right-3 bg-sky-500 text-white text-xs px-2 py-1 rounded-full">
            New
        </span>

        <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center mb-4">
            📁
        </div>

        <h3 class="font-bold text-lg text-sky-600 mb-2">
            SyncProject
        </h3>

        <p class="text-sm text-slate-500">
            Upload proyek, simpan ke repository pribadi, atau kirim ke mentor untuk mendapatkan penilaian.
        </p>

    </div>
</a>
    </div>

</section>
<a href="{{ route('repository.saya') }}" class="group">
    <div class="bg-white border border-indigo-200 p-6 rounded-3xl shadow-md hover:shadow-xl transition">

        <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
            📂
        </div>

        <h3 class="font-bold text-lg text-indigo-600 mb-2">
            Repository Saya
        </h3>

        <p class="text-sm text-slate-500">
            Lihat seluruh proyek yang pernah Anda upload.
        </p>

    </div>
</a>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

</body>
</html>