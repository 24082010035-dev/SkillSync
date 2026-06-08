<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Skill</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-7xl mx-auto p-6">

    <div class="mb-6">
        <a href="{{ url('/admin/dashboard') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow">

            ← Kembali ke Dashboard

        </a>
    </div>

    <div class="bg-blue-500 rounded-3xl p-8 text-white shadow-lg mb-8">

        <h1 class="text-4xl font-bold mb-2">
            Kelola Skill 💡
        </h1>

        <p>
            Tambah dan kelola data skill yang tersedia pada platform.
        </p>

    </div>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Daftar Skill
        </h2>

        <a href="{{ route('skill.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow">

            + Tambah Skill

        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Nama Skill</th>
                    <th class="px-6 py-4 text-left">Deskripsi</th>
<th class="px-6 py-4 text-left">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($skills as $skill)

                <tr class="border-b">

                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $skill->nama_skill }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $skill->deskripsi }}
                    </td>

                    <td class="px-6 py-4">

                    <div class="flex gap-2">

                        <a href="{{ route('skill.edit', $skill->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        <form action="{{ route('skill.delete', $skill->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus skill ini?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

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

                        Belum ada data skill.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>