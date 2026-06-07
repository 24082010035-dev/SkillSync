<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen">

<div class="max-w-3xl mx-auto py-10 px-6">

    <a href="{{ route('repository.saya') }}"
       class="text-blue-600 hover:text-blue-800 font-medium">
        ← Kembali ke Repository
    </a>

    <div class="bg-white rounded-3xl shadow-lg p-8 mt-5">

        <h1 class="text-3xl font-bold text-blue-600 mb-6">
            Edit Project ✏️
        </h1>

        <form action="{{ route('project.update', $proyek->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block font-semibold mb-2">
                    Judul Project
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ $proyek->nama_proyek }}"
                    class="w-full border border-slate-300 rounded-xl p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full border border-slate-300 rounded-xl p-3">{{ $proyek->deskripsi }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block font-semibold mb-2">
                    Ganti File (Opsional)
                </label>

                <input
                    type="file"
                    name="file_proyek"
                    class="w-full border border-slate-300 rounded-xl p-3">
            </div>

            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold">

                Update Project

            </button>

        </form>

    </div>

</div>

</body>
</html>