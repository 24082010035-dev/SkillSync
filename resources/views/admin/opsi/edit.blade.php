
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Opsi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-xl mx-auto py-10">

    <a href="{{ route('opsi.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded-xl">
        ← Kembali
    </a>

    <div class="bg-white rounded-3xl shadow-lg p-8 mt-4">

        <h1 class="text-3xl font-bold mb-6">
            Edit Opsi ✏️
        </h1>

        <form action="{{ route('opsi.update', $opsi->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="font-semibold">
                    Pilih Soal
                </label>

                <select
                    name="soal_id"
                    class="w-full border rounded-xl p-3 mt-2">

                    @foreach($soals as $soal)

                        <option
                            value="{{ $soal->id }}"
                            {{ $opsi->soal_id == $soal->id ? 'selected' : '' }}>

                            {{ $soal->pertanyaan }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="font-semibold">
                    Opsi Jawaban
                </label>

                <input
                    type="text"
                    name="opsi"
                    value="{{ $opsi->opsi }}"
                    class="w-full border rounded-xl p-3 mt-2">

            </div>

            <button
                type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl">

                Update

            </button>

        </form>

    </div>

</div>

</body>
</html>
