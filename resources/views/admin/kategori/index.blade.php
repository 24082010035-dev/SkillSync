<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori Kepribadian</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-7xl mx-auto p-6">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ url('/admin/soal-kepribadian') }}"
           class="inline-flex items-center gap-2
                  bg-blue-500 hover:bg-blue-600
                  text-white
                  px-4 py-2
                  rounded-xl
                  shadow-md
                  transition">

            ← Kembali ke Kelola Soal

        </a>
    </div>

    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold">
            Kelola Kategori Kepribadian 🧠
        </h1>

        <p class="mt-2 text-purple-100">
            Tambah, edit dan hapus kategori kepribadian.
        </p>

    </div>

    <!-- Judul + Tombol Tambah -->
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Daftar Kategori
        </h2>

        <button
            class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow">

            + Tambah Kategori

        </button>

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
                        Nama Kategori
                    </th>

                    <th class="text-center px-6 py-4">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($kategori as $item)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->nama_kategori }}
                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <button
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                                Edit

                            </button>

                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">

                                Hapus

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center py-10 text-gray-500">

                        Belum ada kategori kepribadian.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>