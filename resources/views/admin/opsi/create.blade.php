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

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('opsi.index') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">
            ← Kembali
        </a>
    </div>

    <!-- Card Form -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Opsi 📝
        </h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('opsi.store') }}" method="POST">
            @csrf

            <!-- Pilih Pertanyaan -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Pertanyaan
                </label>

                <select
                    name="soal_id"
                    class="w-full border rounded-xl px-3 py-2"
                    required>

                    <option value="">
                        Pilih Pertanyaan
                    </option>

                    @foreach($soals as $soal)
                        <option
                            value="{{ $soal->id }}"
                            {{ old('soal_id') == $soal->id ? 'selected' : '' }}>
                            {{ $soal->pertanyaan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Opsi Jawaban -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Opsi Jawaban
                </label>

                <input
                    type="text"
                    name="opsi"
                    value="{{ old('opsi') }}"
                    class="w-full border rounded-xl px-3 py-2"
                    placeholder="Contoh: Sangat Setuju"
                    required>
            </div>

            <!-- Skor -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold">
                    Skor
                </label>

                <input
                    type="number"
                    name="skor"
                    value="{{ old('skor') }}"
                    class="w-full border rounded-xl px-3 py-2"
                    placeholder="Masukkan skor"
                    required>
            </div>

            <!-- Tombol Simpan -->
            <button
                type="submit"
                class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl">
                Simpan Opsi
            </button>

        </form>

    </div>

</div>

</body>
</html>