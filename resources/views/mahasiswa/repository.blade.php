<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repository Saya</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 min-h-screen">

<div class="max-w-5xl mx-auto py-10 px-6">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="text-blue-600 hover:text-blue-800 font-medium">
        ← Kembali ke Dashboard
    </a>

    <h1 class="text-3xl font-bold text-blue-600 mt-4 mb-8">
        Repository Saya 📁
    </h1>

    @if($proyek->count() > 0)

        <div class="grid gap-5">

            @foreach($proyek as $item)

            <div class="bg-white p-6 rounded-2xl shadow">

                <div class="flex justify-between items-start">

                    <div>

                        <h2 class="text-xl font-bold text-slate-800">
                            {{ $item->nama_proyek }}
                        </h2>

                        <p class="text-slate-500 mt-2">
                            {{ $item->deskripsi }}
                        </p>

                    </div>

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                        {{ $item->status }}
                    </span>

                </div>

                <div class="mt-4 flex gap-3">

                    <a href="{{ asset('storage/' . $item->file_proyek) }}"
                       target="_blank"
                       class="bg-blue-500 text-white px-4 py-2 rounded-xl">

                        Lihat File
                    </a>

                </div>

            </div>

            @endforeach

        </div>

    @else

        <div class="bg-white p-10 rounded-3xl shadow text-center">

            <div class="text-5xl mb-4">
                📂
            </div>

            <h2 class="text-xl font-bold text-slate-700">
                Belum Ada Proyek
            </h2>

            <p class="text-slate-500 mt-2">
                Upload proyek pertama Anda melalui SyncProject.
            </p>

        </div>

    @endif

</div>

</body>
</html>