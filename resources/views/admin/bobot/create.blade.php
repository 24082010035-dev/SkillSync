<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bobot</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-xl mx-auto py-10">

    <a href="{{ route('bobot.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded-xl">

        ← Kembali

    </a>

    <div class="bg-white rounded-3xl shadow-lg p-8 mt-4">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Bobot 📊
        </h1>

        <form action="{{ route('bobot.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">

                <label class="font-semibold">
                    Pilih Opsi
                </label>

                <select
                    name="opsi_id"
                    class="w-full border rounded-xl p-3 mt-2">

                    @foreach($opsis as $opsi)

                        <option value="{{ $opsi->id }}">
                            {{ $opsi->opsi }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="font-semibold">
                    Pilih Kategori
                </label>

                <select
                    name="kategori_id"
                    class="w-full border rounded-xl p-3 mt-2">

                    @foreach($kategoris as $kategori)

                        <option value="{{ $kategori->id }}">
                            {{ $kategori->nama_kategori }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="font-semibold">
                    Nilai
                </label>

                <input
                    type="number"
                    name="nilai"
                    class="w-full border rounded-xl p-3 mt-2">

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
