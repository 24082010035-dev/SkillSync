<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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

        <a href="{{ route('pilih.role') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded-lg text-sm">

            Daftar
        </a>
    </div>

    <!-- KEMBALI -->
    <div class="max-w-6xl mx-auto w-full px-6 mt-4">

        <a href="/"
           class="text-blue-500 text-sm hover:underline">

            ← Kembali
        </a>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 flex justify-center items-start pt-16 pb-24">

        <div class="bg-white p-8 rounded-2xl shadow-lg w-80">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-center text-[#2C7DA0] mb-2">
                Login
            </h2>

            <p class="text-center text-sm text-[#2C7DA0] mb-5">
                Masuk ke akun SkillSync Anda
            </p>

            <form action="{{ route('login.process') }}" method="POST">

                @csrf

                <!-- Email -->
                <label class="text-sm text-blue-500 font-semibold">
                    Email
                </label>

                <input type="email"
                    name="email"
                    value="{{ old('email', Cookie::get('user_email')) }}"
                    placeholder="Masukkan Email"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- Password -->
                <label class="text-sm text-blue-500 font-semibold">
                    Password
                </label>

                <input type="password"
                       name="password"
                       placeholder="Masukkan password"
                       class="w-full p-2 mb-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- Remember -->
                <div class="flex justify-between items-center mb-4 text-sm">

                    <label class="flex items-center text-blue-500 font-semibold">

                        <input type="checkbox"
                               name="remember"
                               class="mr-2">

                        Ingat saya
                    </label>

                    <a href="#"
                       class="text-blue-500 hover:underline">

                        Lupa password?
                    </a>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-[#1FA9D6] hover:bg-[#189ac2] text-white p-2 rounded-lg">

                    Masuk
                </button>

            </form>

            <!-- Daftar -->
            <p class="text-center text-sm text-gray-600 mt-5">

                Belum punya akun?

                <a href="{{ route('pilih.role') }}"
                   class="text-blue-500 hover:underline">

                    Daftar di sini
                </a>
            </p>

        </div>

    </div>

</body>
</html>