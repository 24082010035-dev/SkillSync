<!DOCTYPE html>
<html>
<head>
    <title>Edit Proyek</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <!-- TITLE -->
    <h1 class="text-xl font-bold mb-4 text-blue-600">
        Edit Proyek
    </h1>

    <!-- FORM -->
    <form action="{{ route('mentor.upload.proyek.update', $proyek->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- JUDUL -->
        <input type="text"
               name="judul_proyek"
               value="{{ $proyek->judul_proyek }}"
               class="w-full border p-2 mb-3 rounded-xl">

        <!-- DESKRIPSI -->
        <textarea name="deskripsi"
                  class="w-full border p-2 mb-3 rounded-xl">{{ $proyek->deskripsi }}</textarea>

        <!-- FILE -->
        <input type="file"
               name="file_proyek"
               class="w-full border p-2 mb-3 rounded-xl">

        <!-- BUTTON UPDATE -->
        <button class="bg-blue-500 text-white px-4 py-2 rounded-xl w-full">
            Update
        </button>

    </form>

    <!-- BACK TO DASHBOARD -->
    <a href="{{ route('mentor.dashboard') }}"
       class="block text-center mt-4 text-slate-500 hover:text-blue-600">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>