<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncProject - SkillSync</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen">

<div class="max-w-3xl mx-auto py-10 px-6">

    <!-- KEMBALI -->
    <a href="{{ route('mentor.dashboard') }}"
       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium mb-6">

        ← Kembali ke Dashboard

    </a>

    <!-- CARD -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-blue-600 mb-2">
                SyncProject 📁
            </h1>

            <p class="text-slate-500">
                Simpan proyek ke repository pribadi 
            </p>

        </div>

        <!-- SUCCESS -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-xl mb-6">

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('mentor.upload.proyek.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- JUDUL -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Judul Proyek
                </label>

                <input
                    <input
                    type="text"
                    name="judul_proyek"
                    class="w-full border border-slate-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan judul proyek"
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
                    class="w-full border border-slate-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Jelaskan proyek yang telah dibuat"></textarea>

            </div>

            <!-- FILE -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Upload File
                </label>

                <input
                    type="file"
                    name="file_proyek"
                    accept=".pdf,.zip,.rar"
                    class="w-full border border-slate-300 rounded-xl p-3"
                    required>

                <p class="text-sm text-slate-400 mt-2">
                    Format yang diperbolehkan: PDF, ZIP, RAR (maksimal 20 MB)
                </p>

            </div>


            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold transition">

                Upload Project

            </button>

        </form>

    </div>

</div>

</body>
</html>