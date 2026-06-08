<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Bobot</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen">

<div class="max-w-2xl mx-auto p-6">

    <a href="{{ route('bobot.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded-xl">

        ← Kembali

    </a>

    <div class="bg-white rounded-3xl shadow-lg p-8 mt-6">

        <h1 class="text-4xl font-bold mb-8">
            Edit Bobot 📊
        </h1>

        <form
            action="{{ route('bobot.update', $bobot->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2">
                    Pilih Opsi
                </label>

                <select
                    name="opsi_id"
                    class="w-full border rounded-xl p-3">

                    @foreach($opsis as $opsi)

                    <option
                        value="{{ $opsi->id }}"
                        {{ $bobot->opsi_id == $opsi->id ? 'selected' : '' }}>

                        {{ $opsi->opsi }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    Pilih Kategori
                </label>

                <select
                    name="kategori_id"
                    class="w-full border rounded-xl p-3">

                    @foreach($kategoris as $kategori)

                    <option
                        value="{{ $kategori->id }}"
                        {{ $bobot->kategori_id == $kategori->id ? 'selected' : '' }}>

                        {{ $kategori->nama_kategori }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-6">

                <label class="block mb-2">
                    Nilai
                </label>

                <input
                    type="number"
                    name="nilai"
                    value="{{ $bobot->nilai }}"
                    class="w-full border rounded-xl p-3">

            </div>

            <button
                type="submit"
                class="bg-yellow-500 text-white px-5 py-3 rounded-xl">

                Update

            </button>

        </form>

    </div>

</div>

</body>
</html>