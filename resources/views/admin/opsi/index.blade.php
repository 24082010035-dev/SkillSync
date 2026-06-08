<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Opsi</title>

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

    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold mb-2">
            Kelola Opsi 📝
        </h1>

        <p>
            Tambah, edit dan hapus opsi jawaban.
        </p>

    </div>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Daftar Opsi
        </h2>

        <a href="{{ route('opsi.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow">

            + Tambah Opsi

        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Soal ID</th>
                    <th class="px-6 py-4 text-left">Opsi</th>
                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($opsis as $opsi)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $opsi->soal_id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $opsi->opsi }}
                    </td>

                    <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('opsi.edit', $opsi->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                            Edit

                        </a>

                        <form action="{{ route('opsi.delete', $opsi->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus opsi ini?')">

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

                    <td colspan="4"
                        class="text-center py-10 text-gray-500">

                        Belum ada opsi.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>

