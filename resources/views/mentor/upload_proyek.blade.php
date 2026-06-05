<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Proyek Mentor</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50">

<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-3xl shadow-lg">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-blue-600 mb-6">
        Upload Proyek Mentor 🚀
    </h1>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- ERROR MESSAGE -->
    @if($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-4">
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
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Judul Proyek</label>
            <input type="text"
                   name="judul_proyek"
                   class="w-full border p-3 rounded-xl"
                   placeholder="Masukkan judul proyek"
                   required>
        </div>

        <!-- DESKRIPSI -->
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Deskripsi</label>
            <textarea name="deskripsi"
                      rows="4"
                      class="w-full border p-3 rounded-xl"
                      placeholder="Deskripsi proyek (opsional)"></textarea>
        </div>

        <!-- FILE -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold">File Proyek</label>
            <input type="file"
                   name="file_proyek"
                   class="w-full border p-3 rounded-xl"
                   required>
            <p class="text-xs text-slate-400 mt-1">
                Format: PDF, ZIP, RAR (max 20MB)
            </p>
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold">
            Upload Proyek
        </button>

    </form>

    <!-- BACK -->
    <a href="{{ route('mentor.dashboard') }}"
       class="block text-center mt-5 text-blue-500 hover:underline">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>