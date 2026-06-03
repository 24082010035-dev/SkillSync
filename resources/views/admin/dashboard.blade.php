<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen text-slate-800">

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
                Admin Panel
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

    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg">

        <div class="max-w-2xl">

            <h1 class="text-3xl font-bold mb-3">
                Dashboard Admin SkillSync ⚙️
            </h1>

            <p class="text-blue-100 leading-relaxed">
                Kelola soal tes, data pengguna, skill, dan seluruh aktivitas platform SkillSync dengan mudah.
            </p>

        </div>

    </div>

</section>

<!-- MENU -->
<section class="px-8 py-10">

    <div class="mb-6">

        <h2 class="text-2xl font-bold text-slate-800">
            Menu Manajemen
        </h2>

        <p class="text-slate-400 text-sm mt-1">
            Kelola seluruh fitur dan data platform
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

            <div class="bg-yellow-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
                <span class="text-3xl">🧠</span>
            </div>

            <h3 class="font-bold text-lg text-slate-800 mb-2">
                Soal Kepribadian
            </h3>

            <p class="text-slate-500 text-sm leading-relaxed mb-5">
                Tambah, edit, dan hapus soal tes kepribadian mahasiswa.
            </p>

            <a href="#"
               class="inline-block bg-yellow-500 hover:bg-yellow-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                Kelola Soal
            </a>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

            <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
                <span class="text-3xl">📘</span>
            </div>

            <h3 class="font-bold text-lg text-slate-800 mb-2">
                Soal Kompetensi
            </h3>

            <p class="text-slate-500 text-sm leading-relaxed mb-5">
                Kelola soal tes skill dan kompetensi mahasiswa.
            </p>

            <a href="#"
               class="inline-block bg-blue-500 hover:bg-blue-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                Kelola Soal
            </a>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

            <div class="bg-indigo-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
                <span class="text-3xl">💡</span>
            </div>

            <h3 class="font-bold text-lg text-slate-800 mb-2">
                Manajemen Skill
            </h3>

            <p class="text-slate-500 text-sm leading-relaxed mb-5">
                Kelola data skill dan kompetensi pada platform.
            </p>

            <a href="#"
               class="inline-block bg-indigo-500 hover:bg-indigo-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                Kelola Skill
            </a>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

            <div class="bg-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
                <span class="text-3xl">👥</span>
            </div>

            <h3 class="font-bold text-lg text-slate-800 mb-2">
                Manajemen User
            </h3>

            <p class="text-slate-500 text-sm leading-relaxed mb-5">
                Lihat dan kelola data seluruh pengguna platform.
            </p>

            <a href="#"
               class="inline-block bg-green-500 hover:bg-green-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                Kelola User
            </a>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

            <div class="bg-purple-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
                <span class="text-3xl">📊</span>
            </div>

            <h3 class="font-bold text-lg text-slate-800 mb-2">
                Hasil Tes
            </h3>

            <p class="text-slate-500 text-sm leading-relaxed mb-5">
                Melihat hasil tes dan perkembangan mahasiswa.
            </p>

            <a href="#"
               class="inline-block bg-purple-500 hover:bg-purple-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                Lihat Hasil
            </a>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

            <div class="bg-pink-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
                <span class="text-3xl">📂</span>
            </div>

            <h3 class="font-bold text-lg text-slate-800 mb-2">
                Data Proyek
            </h3>

            <p class="text-slate-500 text-sm leading-relaxed mb-5">
                Melihat proyek dan portfolio yang diupload mahasiswa.
            </p>

            <a href="#"
               class="inline-block bg-pink-500 hover:bg-pink-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                Lihat Proyek
            </a>

        </div>

    </div>

</section>

</body>
</html>