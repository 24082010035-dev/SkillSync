<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pertanyaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-7xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ url('/admin/soal-kepribadian') }}"
           class="inline-flex items-center gap-2
                  bg-blue-500 hover:bg-blue-600
                  text-white px-4 py-2
                  rounded-xl shadow-md">

            ← Kembali ke Kelola Soal

        </a>
    </div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold mb-2">
            Kelola Pertanyaan 📋
        </h1>

        <p class="text-blue-100">
            Tambah, edit dan hapus soal kepribadian.
        </p>

    </div>

    <!-- Judul -->
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Daftar Pertanyaan
        </h2>

                <a href="{{ route('pertanyaan.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow">

                    + Tambah Pertanyaan

                </a>

    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="text-left px-6 py-4">
                        No
                    </th>

                    <th class="text-left px-6 py-4">
                        Pertanyaan
                    </th>

                    <th class="text-center px-6 py-4">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($soals as $soal)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $soal->pertanyaan }}
                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                                    <a href="{{ route('pertanyaan.edit', $soal->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                                            Edit

                                    </a>

                            <form action="{{ route('pertanyaan.delete', $soal->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center py-10 text-gray-500">

                        Belum ada pertanyaan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>