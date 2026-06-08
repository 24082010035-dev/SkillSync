<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Kepribadian</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-4xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">

        <a href="{{ route('kategori.index') }}"
           class="inline-flex items-center gap-2
                  bg-purple-500 hover:bg-purple-600
                  text-white px-4 py-2
                  rounded-xl shadow">

            ← Kembali

        </a>

    </div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-3xl font-bold">
            Tambah Kategori Kepribadian 🧠
        </h1>

        <p class="mt-2 text-purple-100">
            Tambahkan kategori kepribadian baru.
        </p>

    </div>

    <!-- Form -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form action="{{ route('kategori.store') }}" method="POST">

         @csrf

            <div>

                <label class="block font-semibold mb-2">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    placeholder="Contoh: Ekstrovert"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500">

            </div>

            <div class="mt-6">

                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl">

                    Simpan Kategori

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>