<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mentor</title>

    @vite('resources/css/app.css')

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50 text-gray-800 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-50">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold shadow">
            S
        </div>

        <div>
            <h1 class="text-xl font-bold text-blue-600">
                SkillSync
            </h1>

            <p class="text-xs text-slate-400">
                Mentor Dashboard
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

<div class="p-8 max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-3xl font-bold mb-3">
            Selamat Datang Mentor 🚀
        </h1>

        <p class="text-blue-100 max-w-2xl leading-relaxed">
            Kelola materi pembelajaran, validasi kompetensi mahasiswa,
            dan bantu mahasiswa berkembang bersama SkillSync.
        </p>

    </div>

    @php
        $pending = 0;
        $totalMateri = 0;
        $totalViews = 0;

        $data_validasi = [];
        $materi = [];
    @endphp

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex justify-between items-center">

            <div>
                <p class="text-sm text-slate-400 mb-1">
                    Pending Validasi
                </p>

                <h2 class="text-3xl font-bold text-slate-800">
                    {{ $pending }}
                </h2>
            </div>

            <div class="bg-yellow-100 p-4 rounded-2xl">
                <i data-lucide="clock" class="text-yellow-600"></i>
            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex justify-between items-center">

            <div>
                <p class="text-sm text-slate-400 mb-1">
                    Total Materi
                </p>

                <h2 class="text-3xl font-bold text-slate-800">
                    {{ $totalMateri }}
                </h2>
            </div>

            <div class="bg-blue-100 p-4 rounded-2xl">
                <i data-lucide="file-text" class="text-blue-600"></i>
            </div>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex justify-between items-center">

            <div>
                <p class="text-sm text-slate-400 mb-1">
                    Total Views
                </p>

                <h2 class="text-3xl font-bold text-slate-800">
                    {{ $totalViews }}
                </h2>
            </div>

            <div class="bg-green-100 p-4 rounded-2xl">
                <i data-lucide="eye" class="text-green-600"></i>
            </div>

        </div>

    </div>

    <!-- VALIDASI -->
    <div class="mb-10">

        <div class="flex items-center gap-2 mb-5">

            <i data-lucide="award" class="text-blue-500"></i>

            <h2 class="text-2xl font-bold text-slate-800">
                Validasi Tes Kompetensi
            </h2>

        </div>

        @if(count($data_validasi) > 0)

            @foreach($data_validasi as $v)

            <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 mb-4 flex justify-between items-center">

                <div class="flex items-center gap-4">

                    <div class="bg-blue-100 p-4 rounded-2xl">
                        <i data-lucide="users" class="text-blue-600"></i>
                    </div>

                    <div>

                        <h3 class="font-semibold text-slate-800">
                            {{ $v['nama'] }}
                        </h3>

                        <p class="text-sm text-blue-500">
                            {{ $v['judul'] }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ $v['tanggal'] }}
                        </p>

                    </div>

                </div>

                <button class="bg-blue-500 hover:bg-blue-600 transition text-white px-4 py-2 rounded-xl">
                    Review
                </button>

            </div>

            @endforeach

        @else

        <div class="bg-white border-2 border-dashed border-slate-200 rounded-3xl p-10 text-center">

            <div class="text-5xl mb-3">
                📭
            </div>

            <h3 class="text-xl font-bold text-slate-700 mb-2">
                Belum Ada Data Validasi
            </h3>

            <p class="text-slate-400">
                Nanti akan muncul saat mahasiswa submit kompetensi.
            </p>

        </div>

        @endif

    </div>

    <!-- HEADER MATERI -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">
                Materi Pembelajaran
            </h2>

            <p class="text-slate-400 text-sm">
                Kelola materi yang sudah Anda upload
            </p>

        </div>

        <a href="#"
           class="bg-blue-500 hover:bg-blue-600 transition text-white px-5 py-3 rounded-2xl flex items-center gap-2 w-fit">

            <i data-lucide="plus"></i>

            Upload Materi Baru

        </a>

    </div>

    <!-- LIST MATERI -->
    @if(count($materi) > 0)

        @foreach($materi as $m)

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mb-5 flex flex-col lg:flex-row justify-between gap-5">

            <div class="flex gap-4">

                <div class="bg-purple-100 p-4 rounded-2xl h-fit">
                    <i data-lucide="file" class="text-purple-600"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-lg text-slate-800 mb-1">
                        {{ $m['judul'] }}
                    </h3>

                    <p class="text-sm text-slate-500 mb-2">
                        {{ $m['kategori'] }}
                    </p>

                    <p class="text-xs text-slate-400">
                        👁 {{ $m['views'] ?? 0 }} views •
                        ⬇ {{ $m['downloads'] ?? 0 }} downloads
                    </p>

                </div>

            </div>

            <div class="flex gap-3">

                <a href="#"
                   class="border border-blue-500 text-blue-500 px-4 py-2 rounded-xl hover:bg-blue-50 transition">

                    Edit
                </a>

                <button
                    class="border border-red-400 text-red-500 px-4 py-2 rounded-xl hover:bg-red-50 transition">

                    Hapus
                </button>

            </div>

        </div>

        @endforeach

    @else

    <div class="bg-white border-2 border-dashed border-slate-200 rounded-3xl p-12 text-center">

        <div class="text-5xl mb-4">
            📂
        </div>

        <h3 class="text-xl font-bold text-slate-700 mb-2">
            Belum Ada Materi
        </h3>

        <p class="text-slate-400">
            Upload materi pertama Anda sekarang.
        </p>

    </div>

    @endif

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>