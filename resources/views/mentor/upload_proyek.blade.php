<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Proyek</title>

    @vite(['resources/css/app.css'])
</head>
<body class="bg-blue-50">

<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">

    <h1 class="text-2xl font-bold text-blue-600 mb-6">
        Upload Proyek
    </h1>

    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-4">
        ✅ {{ session('success') }}
    </div>
@endif

    <form action="{{ route('mentor.upload.proyek.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        <a href="/mentor/dashboard"
   class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
    ← Kembali ke Dashboard
</a>

        <div class="mb-4">
            <label class="block mb-2">Judul Proyek</label>
            <input type="text"
                   name="judul_proyek"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Deskripsi</label>
            <textarea name="deskripsi"
                      rows="5"
                      class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2">File Proyek</label>
            <input type="file"
                   name="file_proyek"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded">
            Upload
        </button>

    </form>

</div>

</body>
</html>