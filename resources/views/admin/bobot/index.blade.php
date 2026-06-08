<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Bobot</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-7xl mx-auto p-6">

    <div class="mb-6">
        <a href="{{ url('/admin/soal-kepribadian') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow">

            ← Kembali ke Kelola Soal

        </a>
    </div>

    <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold mb-2">
            Kelola Bobot 📊
        </h1>

        <p>
            Atur nilai setiap opsi terhadap kategori kepribadian.
        </p>

    </div>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Daftar Bobot
        </h2>

        <a href="{{ route('bobot.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow">

            + Tambah Bobot

        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Opsi ID</th>
                    <th class="px-6 py-4 text-left">Kategori ID</th>
                    <th class="px-6 py-4 text-left">Nilai</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($bobots as $bobot)

                <tr class="border-b">

                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $bobot->opsi_id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $bobot->kategori_id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $bobot->nilai }}
                    </td>

                <td class="px-6 py-4 flex gap-2">

                    <a
                        href="{{ route('bobot.edit', $bobot->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                        Edit

                    </a>

                    <form
                        action="{{ route('bobot.delete', $bobot->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus bobot ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">

                            Hapus

                        </button>

                    </form>

                </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center py-10 text-gray-500">

                        Belum ada data bobot.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>