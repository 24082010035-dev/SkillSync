<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen">

<div class="max-w-3xl mx-auto py-10 px-6">

    <!-- KEMBALI -->
    <a href="{{ route('repository.saya') }}"
       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium mb-6">

        ← Kembali ke Repository

    </a>

    <!-- CARD -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-blue-600 mb-2">
                Edit Project ✏️
            </h1>

            <p class="text-slate-500">
                Perbarui informasi project atau kirim project ke mentor untuk mendapatkan penilaian.
            </p>

        </div>

        <!-- FORM -->
        <form action="{{ route('project.update', $proyek->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- JUDUL -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Judul Proyek
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ $proyek->nama_proyek }}"
                    class="w-full border border-slate-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

            </div>

            <!-- DESKRIPSI -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Deskripsi Proyek
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full border border-slate-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $proyek->deskripsi }}</textarea>

            </div>

            <!-- FILE -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Ganti File (Opsional)
                </label>

                <input
                    type="file"
                    name="file_proyek"
                    class="w-full border border-slate-300 rounded-xl p-3">

            </div>

            <!-- TUJUAN -->
            <div class="mb-8">

                <label class="block font-semibold mb-2">
                    Tujuan Project
                </label>

                <select
                    name="tipe_project"
                    class="w-full border border-slate-300 rounded-xl p-3">

                    <option value="repository"
                        {{ $proyek->status == 'repository' ? 'selected' : '' }}>
                        Simpan ke Repository Pribadi
                    </option>

                    <option value="penilaian"
                        {{ $proyek->status == 'pending' ? 'selected' : '' }}>
                        Kirim ke Mentor untuk Penilaian
                    </option>

                </select>

                <div class="mt-3 text-sm text-slate-500">

                    <p class="mb-1">
                        📁 <strong>Repository Pribadi</strong> :
                        hanya tersimpan di akun Anda.
                    </p>

                    <p>
                        ⭐ <strong>Penilaian Mentor</strong> :
                        masuk ke antrian mentor untuk dinilai dan hasil skor akan digunakan pada SyncInsight.
                    </p>

                </div>

            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold transition">

                Update Project

            </button>

        </form>

    </div>

</div>

</body>
</html>