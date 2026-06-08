<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pertanyaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-3xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('pertanyaan.index') }}"
           class="inline-flex items-center gap-2
                  bg-blue-500 hover:bg-blue-600
                  text-white px-4 py-2
                  rounded-xl shadow-md">

            ← Kembali

        </a>
    </div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold mb-2">
            Edit Pertanyaan ✏️
        </h1>

        <p class="text-yellow-100">
            Ubah soal kepribadian.
        </p>

    </div>

    <!-- Form -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form action="{{ route('pertanyaan.update', $soal->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    rows="4"
                    class="w-full border rounded-xl px-4 py-3"
                    required>{{ $soal->pertanyaan }}</textarea>

            </div>

            <button
                type="submit"
                class="bg-yellow-500 hover:bg-yellow-600
                       text-white px-6 py-3 rounded-xl">

                Update Pertanyaan

            </button>

        </form>

    </div>

</div>

</body>
</html>