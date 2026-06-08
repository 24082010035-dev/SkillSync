<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori Kepribadian</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-3xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('kategori.index') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow">
            ← Kembali
        </a>
    </div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold">
            Edit Kategori ✏️
        </h1>

        <p class="mt-2 text-yellow-100">
            Ubah nama kategori kepribadian.
        </p>

    </div>

    <!-- Form -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    value="{{ $kategori->nama_kategori }}"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <button
                type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl">

                Update Kategori

            </button>

        </form>

    </div>

</div>

</body>
</html>