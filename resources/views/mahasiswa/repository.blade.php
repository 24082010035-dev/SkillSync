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

    <!-- BACK -->
    <a href="{{ route('mahasiswa.dashboard') }}"
       class="text-blue-600 hover:text-blue-800 font-medium">
        ← Kembali ke Dashboard
    </a>

    <!-- TITLE -->
    <h1 class="text-3xl font-bold text-blue-600 mt-4 mb-8">
        Repository Saya 📁
    </h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($proyek->count() > 0)

        <div class="grid gap-5">

            @foreach($proyek as $item)

            <div class="bg-white p-6 rounded-2xl shadow">

                <div class="flex justify-between items-center">

                    <div>

                        <h2 class="text-xl font-bold text-slate-800">
                            {{ $item->nama_proyek }}
                        </h2>

                        <p class="text-slate-500 mt-2">
                            {{ $item->deskripsi }}
                        </p>

                    </div>

                    <!-- STATUS -->
                    <div>

                        @if($item->status == 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                                Menunggu Penilaian
                            </span>

                        @elseif($item->status == 'selesai')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                Sudah Dinilai
                            </span>

                        @else

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                Repository Pribadi
                            </span>

                        @endif

                    </div>

                </div>

                <!-- HASIL PENILAIAN -->
                @if($item->status == 'selesai')

                <div class="mt-5 p-4 bg-green-50 border border-green-200 rounded-xl">

                    <h3 class="font-bold text-green-700 mb-3">
                        Hasil Penilaian Mentor
                    </h3>

                    <p class="mb-2">
                        <strong>Nilai:</strong>
                        {{ $item->nilai ?? '-' }}
                    </p>

                    <p>
                        <strong>Feedback Mentor:</strong>
                        {{ $item->feedback ?? '-' }}
                    </p>

                </div>

                @endif

                <!-- ACTION -->
                <div class="mt-5 flex flex-wrap gap-3">

                    <a href="{{ asset('storage/' . $item->file_proyek) }}"
                       target="_blank"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">
                        Lihat File
                    </a>

                    <a href="{{ route('project.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl">
                        Edit
                    </a>

                    <form action="{{ route('project.delete', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus project ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">
                            Hapus
                        </button>

                    </form>

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