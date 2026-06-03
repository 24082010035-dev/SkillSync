<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-blue-50 text-gray-800 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <div class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">

        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                S
            </div>

            <span class="text-blue-600 font-semibold text-lg">
                SkillSync
            </span>
        </div>

        <a href="{{ route('login') }}"
           class="border border-blue-500 text-blue-500 px-4 py-1 rounded-lg text-sm hover:bg-blue-50">
            Login
        </a>
    </div>

    <!-- KEMBALI -->
    <div class="max-w-6xl mx-auto w-full px-6 mt-4">

        <a href="{{ route('pilih.role') }}"
           class="text-blue-500 text-sm hover:underline">

            ← Kembali
        </a>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 flex justify-center items-start pt-10 pb-32">

        <div class="bg-white p-8 rounded-2xl shadow-lg w-96">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-center text-[#2C7DA0] mb-2">
                Daftar Mahasiswa
            </h2>

            <p class="text-center text-sm text-[#2C7DA0] mb-6">
                Bergabunglah dengan SkillSync untuk meningkatkan kompetensi Anda
            </p>

            <form action="{{ route('daftar.mahasiswa.store') }}" method="POST">

                @csrf

                <!-- Nama -->
                <label class="text-sm text-blue-500 font-semibold">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="nama"
                       placeholder="Masukkan nama lengkap"
                       class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- Jurusan -->
                <label class="text-sm text-blue-500 font-semibold">
                    Jurusan
                </label>

                <select
                    name="jurusan_id"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                    <option value="">Pilih Jurusan</option>

                    @foreach($jurusan as $j)
                        <option value="{{ $j->id }}">
                            {{ $j->nama_jurusan }}
                        </option>
                    @endforeach

                </select>

                <!-- Angkatan -->
                <label class="text-sm text-blue-500 font-semibold">
                    Angkatan
                </label>

                <input type="text"
                       name="angkatan"
                       placeholder="Contoh: 2023"
                       class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- Email -->
                <label class="text-sm text-blue-500 font-semibold">
                    Email
                </label>

                <input type="email"
                       name="email"
                       placeholder="nama@email.com"
                       class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- Password -->
                <label class="text-sm text-blue-500 font-semibold">
                    Password
                </label>

                <input type="password"
                       name="password"
                       placeholder="Masukkan password"
                       class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- Konfirmasi -->
                <label class="text-sm text-blue-500 font-semibold">
                    Konfirmasi Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       placeholder="Konfirmasi password"
                       class="w-full p-2 mb-5 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-[#1FA9D6] hover:bg-[#189ac2] text-white p-2 rounded-lg">

                    Daftar Sekarang
                </button>

            </form>

            <!-- LOGIN -->
            <p class="text-center text-sm text-gray-600 mt-5">

                Sudah punya akun?

                <a href="{{ route('login') }}"
                   class="text-blue-500 hover:underline">

                    Login di sini
                </a>
            </p>

        </div>

    </div>

</body>
</html>