<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal Kompetensi</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen">

<div class="max-w-4xl mx-auto py-10 px-6">

    <!-- Tombol Kembali -->
    <a href="{{ route('admin.soal.index') }}"
       class="text-blue-600 hover:text-blue-800 font-medium">

        ← Kembali ke Daftar Soal

    </a>

    <!-- Header -->
    <h1 class="text-4xl font-bold text-blue-600 mt-4 mb-2">
        Edit Soal Kompetensi
    </h1>

    <p class="text-slate-500 mb-8">
        Perbarui data soal kompetensi yang sudah tersedia.
    </p>

    <!-- Card -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form action="{{ route('admin.soal.update', $question->id) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Skill -->
            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Pilih Skill
                </label>

                <select
                    name="skill_id"
                    class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    @foreach($skills as $skill)

                        <option value="{{ $skill->id }}"
                            {{ $question->skill_id == $skill->id ? 'selected' : '' }}>

                            {{ $skill->nama_skill }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Pertanyaan -->
            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    rows="4"
                    class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $question->pertanyaan }}</textarea>

            </div>

            <!-- Opsi A -->
            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Opsi A
                </label>

                <input
                    type="text"
                    name="opsi_a"
                    value="{{ $question->opsi_a }}"
                    class="w-full border border-slate-300 rounded-xl p-3">

            </div>

            <!-- Opsi B -->
            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Opsi B
                </label>

                <input
                    type="text"
                    name="opsi_b"
                    value="{{ $question->opsi_b }}"
                    class="w-full border border-slate-300 rounded-xl p-3">

            </div>

            <!-- Opsi C -->
            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Opsi C
                </label>

                <input
                    type="text"
                    name="opsi_c"
                    value="{{ $question->opsi_c }}"
                    class="w-full border border-slate-300 rounded-xl p-3">

            </div>

            <!-- Opsi D -->
            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Opsi D
                </label>

                <input
                    type="text"
                    name="opsi_d"
                    value="{{ $question->opsi_d }}"
                    class="w-full border border-slate-300 rounded-xl p-3">

            </div>

            <!-- Jawaban Benar -->
            <div class="mb-8">

                <label class="block font-semibold mb-2">
                    Jawaban Benar
                </label>

                <select
                    name="jawaban_benar"
                    class="w-full border border-slate-300 rounded-xl p-3">

                    <option value="A" {{ $question->jawaban_benar == 'A' ? 'selected' : '' }}>
                        A
                    </option>

                    <option value="B" {{ $question->jawaban_benar == 'B' ? 'selected' : '' }}>
                        B
                    </option>

                    <option value="C" {{ $question->jawaban_benar == 'C' ? 'selected' : '' }}>
                        C
                    </option>

                    <option value="D" {{ $question->jawaban_benar == 'D' ? 'selected' : '' }}>
                        D
                    </option>

                </select>

            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-3">

                <a href="{{ route('admin.soal.index') }}"
                   class="bg-slate-300 hover:bg-slate-400 text-slate-700 px-6 py-3 rounded-xl font-semibold">

                    Batal

                </a>

                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold transition">

                    Update Soal

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>