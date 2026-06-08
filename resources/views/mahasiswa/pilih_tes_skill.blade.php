<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Skill</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-blue-50 min-h-screen">

    <!-- Navbar -->
    <div class="bg-white shadow px-6 py-4 flex items-center gap-2">
        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
            S
        </div>

        <h1 class="text-blue-600 font-semibold text-lg">
            SkillSync
        </h1>
    </div>

    <div class="p-6 max-w-6xl mx-auto">

        <!-- Tombol Kembali -->
        <a href="{{ route('mahasiswa.dashboard') }}"
           class="text-blue-500 hover:text-blue-700 mb-6 inline-block">
            ← Kembali
        </a>

        <!-- Header -->
        <div class="text-center mb-10">

            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-medium">
                {{ $mahasiswa->jurusan->nama_jurusan }}
            </span>

            <h2 class="text-3xl font-bold text-blue-700 mt-4">
                Pilih Fokus Skill
            </h2>

            <p class="text-blue-500 mt-2">
                Pilih fokus skill yang ingin Anda tes
            </p>

        </div>

        <!-- List Skill -->
        <div class="grid md:grid-cols-2 gap-6">

            @foreach($skills as $skill)

                <a href="{{ route('skill.start', $skill->id) }}"
                   class="block">

                    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition duration-300 flex items-center justify-between">

                        <div>

                            <h3 class="font-semibold text-blue-700 text-lg">
                                {{ $skill->nama_skill }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $skill->deskripsi }}
                            </p>

                            <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full inline-block mt-3">
                                15 Soal
                            </span>

                        </div>

                        <div class="text-blue-400 text-2xl">
                            →
                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</body>
</html>