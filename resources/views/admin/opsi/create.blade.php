<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Opsi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-3xl mx-auto p-6">

    <div class="mb-6">

        <a href="{{ route('opsi.index') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">

            ← Kembali

        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Opsi 📝
        </h1>

        <form action="{{ route('opsi.store') }}" method="POST">

            @csrf

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Pilih Soal
                </label>

                <select
                    name="soal_id"
                    class="w-full border rounded-xl p-3"
                    required>

                    <option value="">
                        -- Pilih Soal --
                    </option>

                    @foreach($soals as $soal)

                        <option value="{{ $soal->id }}">
                            {{ $soal->pertanyaan }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Opsi Jawaban
                </label>

                <input
                    type="text"
                    name="opsi"
                    class="w-full border rounded-xl p-3"
                    placeholder="Contoh: Saya suka bekerja dalam tim"
                    required>

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