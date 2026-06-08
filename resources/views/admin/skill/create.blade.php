<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Skill</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-3xl mx-auto p-6">

    <div class="mb-6">
        <a href="{{ route('skill.index') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow">

            ← Kembali

        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-4xl font-bold mb-8">
            Tambah Skill 💡
        </h1>

        <form action="{{ route('skill.store') }}"
              method="POST">

            @csrf

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nama Skill
                </label>

                <input
                    type="text"
                    name="nama_skill"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Contoh: Laravel">

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Deskripsi skill"></textarea>

            </div>

            <button
                type="submit"
                class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl">

                Simpan

            </button>

        </form>

    </div>

</div>

</body>
</html>