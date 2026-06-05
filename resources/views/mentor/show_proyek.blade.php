<!DOCTYPE html>
<html>
<head>
    <title>Detail Proyek</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50">

<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-blue-600 mb-4">
        {{ $proyek->judul_proyek }}
    </h1>

    <!-- DESKRIPSI -->
    <p class="text-slate-600 mb-4">
        {{ $proyek->deskripsi }}
    </p>

    <!-- FILE INFO -->
    <div class="mb-4 p-3 bg-slate-100 rounded-xl">
        <p class="text-sm text-slate-500">
            File: {{ $proyek->file_proyek }}
        </p>
    </div>

    <!-- DOWNLOAD / VIEW FILE -->
    @if($proyek->file_proyek)
        <a href="{{ asset('storage/' . $proyek->file_proyek) }}"
           target="_blank"
           class="bg-blue-500 text-white px-4 py-2 rounded-xl inline-block">
            Lihat / Download File
        </a>
    @endif

    <!-- BACK -->
    <a href="{{ route('mentor.dashboard') }}"
       class="block mt-5 text-center text-slate-500 hover:text-blue-600">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>