<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Project</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">

<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-3xl shadow">

    <a href="/mentor/dashboard"
       class="text-blue-500">
       ← Kembali
    </a>

    <h1 class="text-3xl font-bold mt-4 mb-5">
        Review Project Mahasiswa
    </h1>

    <h2 class="text-xl font-bold">
        {{ $project->nama_proyek }}
    </h2>

    <p class="mt-3 text-slate-500">
        {{ $project->deskripsi }}
    </p>

    <a href="{{ asset('storage/'.$project->file_proyek) }}"
       target="_blank"
       class="inline-block mt-4 bg-green-500 text-white px-4 py-2 rounded-xl">

        Download File

    </a>

    <form
        action="{{ route('mentor.project.nilai',$project->id) }}"
        method="POST"
        class="mt-8">

        @csrf

        <label class="block mb-2 font-semibold">
            Nilai
        </label>

        <input
            type="number"
            name="nilai"
            min="0"
            max="100"
            class="w-full border p-3 rounded-xl mb-5">

        <label class="block mb-2 font-semibold">
            Feedback Mentor
        </label>

        <textarea
            name="feedback"
            rows="5"
            class="w-full border p-3 rounded-xl mb-5"></textarea>

        <button
            class="bg-blue-500 text-white px-6 py-3 rounded-xl">

            Simpan Penilaian

        </button>

    </form>

</div>

</body>
</html>