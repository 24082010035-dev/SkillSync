<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Soal Kompetensi</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen">

<div class="max-w-7xl mx-auto py-10 px-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-bold text-blue-600">
                Kelola Soal Kompetensi
            </h1>

            <p class="text-slate-500 mt-2">
                Manajemen bank soal kompetensi mahasiswa
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('admin.dashboard') }}"
            class="bg-slate-500 hover:bg-slate-600 text-white px-5 py-3 rounded-xl font-semibold shadow">

                ← Dashboard

            </a>

            <a href="{{ route('admin.soal.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold shadow">

                + Tambah Soal

            </a>

        </div>

    </div>

    <!-- Notifikasi -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <!-- Card Table -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-blue-500 text-white">

                    <tr>
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Skill</th>
                        <th class="px-6 py-4 text-left">Pertanyaan</th>
                        <th class="px-6 py-4 text-center">Jawaban</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($questions as $question)

                    <tr class="border-b hover:bg-slate-50">

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $question->skill->nama_skill }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $question->pertanyaan }}
                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $question->jawaban_benar }}
                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.soal.edit', $question->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-semibold">

                                    Edit

                                </a>

                                <form action="{{ route('admin.soal.delete', $question->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus soal ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-10 text-slate-500">

                            Belum ada soal kompetensi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>