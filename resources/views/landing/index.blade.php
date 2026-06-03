<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSync</title>

    {{-- Tailwind Laravel --}}
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200 fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold shadow">
                    S
                </div>

                <div>
                    <h1 class="text-xl font-bold text-blue-600">
                        SkillSync
                    </h1>
                    <p class="text-xs text-slate-400">
                        Smart Learning Platform
                    </p>
                </div>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('login') }}"
                   class="px-5 py-2 border border-blue-500 text-blue-500 rounded-xl hover:bg-blue-50 transition">
                    Login
                </a>

                <a href="{{ route('pilih.role') }}"
                   class="px-5 py-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition shadow">
                    Daftar
                </a>
            </div>

        </div>
    </nav>

    <!-- HERO -->
    <section class="pt-40 pb-24 px-6">

        <div class="max-w-7xl mx-auto">

            <div class="bg-gradient-to-r from-blue-600 to-cyan-500 rounded-[32px] p-12 lg:p-16 text-white shadow-xl">

                <div class="max-w-3xl">

                    <span class="bg-white/20 px-4 py-2 rounded-full text-sm">
                        Platform Pengembangan Kompetensi Mahasiswa
                    </span>

                    <h1 class="text-5xl font-bold mt-6 leading-tight">
                        Bangun Skill, Kenali Potensi, dan Raih Karier Impian
                    </h1>

                    <p class="mt-6 text-blue-100 text-lg leading-relaxed">
                        SkillSync membantu mahasiswa memahami kompetensi diri melalui tes diagnostik,
                        peta kompetensi, career gap analysis, serta validasi skill oleh mentor profesional.
                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">

                        <a href="{{ route('pilih.role') }}"
                           class="bg-white text-blue-600 px-6 py-3 rounded-xl font-semibold hover:bg-slate-100 transition">
                            Mulai Sekarang
                        </a>

                        <a href="{{ route('login') }}"
                           class="border border-white px-6 py-3 rounded-xl hover:bg-white/10 transition">
                            Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- FITUR -->
    <section class="pb-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">

                <h2 class="text-4xl font-bold text-slate-800 mb-4">
                    Fitur Unggulan
                </h2>

                <p class="text-slate-500 max-w-2xl mx-auto">
                    Berbagai fitur yang dirancang untuk membantu mahasiswa mengembangkan kompetensi dan mempersiapkan karier masa depan.
                </p>

            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                <!-- CARD -->
                <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 text-blue-600">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-xl text-slate-800 mb-3">
                        Login & Register
                    </h3>

                    <p class="text-slate-500">
                        Sistem autentikasi untuk mahasiswa, mentor, dan administrator.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 text-blue-600">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3v18h18"/>

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 15v-4m4 4V7m4 8v-2"/>

                        </svg>

                    </div>
                    <h3 class="font-bold text-xl text-slate-800 mb-3">
                        Peta Kompetensi
                    </h3>

                    <p class="text-slate-500">
                        Visualisasi perkembangan kompetensi mahasiswa secara interaktif.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 text-blue-600">

                            <circle cx="12" cy="12" r="9"></circle>
                            <circle cx="12" cy="12" r="5"></circle>
                            <circle cx="12" cy="12" r="1"></circle>

                        </svg>

                    </div>

                    <h3 class="font-bold text-xl text-slate-800 mb-3">
                        Career Gap Scanner
                    </h3>

                    <p class="text-slate-500">
                        Analisis kesenjangan kompetensi terhadap karier yang dituju.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 text-blue-600">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 5.25h5.379a1.5 1.5 0 011.06.44l1.371 1.37a1.5 1.5 0 001.06.44h7.63a.75.75 0 01.75.75v9.75a.75.75 0 01-.75.75H3.75a.75.75 0 01-.75-.75V6a.75.75 0 01.75-.75z"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-xl text-slate-800 mb-3">
                        Upload Proyek
                    </h3>

                    <p class="text-slate-500">
                        Unggah portofolio dan dapatkan validasi skill dari mentor.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 text-blue-600">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 4.5h6m-6 0A1.5 1.5 0 007.5 6v12A1.5 1.5 0 009 19.5h6A1.5 1.5 0 0016.5 18V6A1.5 1.5 0 0015 4.5m-6 0A1.5 1.5 0 019 3h6a1.5 1.5 0 011.5 1.5"/>

                        </svg>

                    </div>
                    <h3 class="font-bold text-xl text-slate-800 mb-3">
                        Tes Diagnostik
                    </h3>

                    <p class="text-slate-500">
                        Identifikasi kemampuan awal dan potensi pengembangan diri.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 text-blue-600">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3L2 8l10 5 10-5-10-5z"/>

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 10.5v4.5c0 1.5 2.7 3 6 3s6-1.5 6-3v-4.5"/>

                        </svg>

                    </div>

                    <h3 class="font-bold text-xl text-slate-800 mb-3">
                        Rekomendasi Pembelajaran
                    </h3>

                    <p class="text-slate-500">
                        Materi belajar yang disesuaikan dengan kebutuhan kompetensi pengguna.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="px-6 pb-24">

        <div class="max-w-7xl mx-auto">

            <div class="bg-white rounded-[32px] p-12 shadow-sm border border-slate-200 text-center">

                <h2 class="text-4xl font-bold text-slate-800 mb-4">
                    Mulai Perjalanan Belajarmu Hari Ini
                </h2>

                <p class="text-slate-500 mb-8 max-w-2xl mx-auto">
                    Bergabung bersama mahasiswa dan mentor untuk mengembangkan kompetensi serta mempersiapkan karier masa depan.
                </p>

                <a href="{{ route('pilih.role') }}"
                   class="bg-blue-500 text-white px-8 py-4 rounded-2xl hover:bg-blue-600 transition shadow-lg">
                    Daftar Sekarang
                </a>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-10">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h3 class="font-bold text-blue-600 text-lg mb-3">
                SkillSync
            </h3>

            <p class="text-slate-500">
                info@skillsync.com • +62 812-3456-7890
            </p>

            <p class="text-sm text-slate-400 mt-4">
                © 2026 SkillSync. All Rights Reserved.
            </p>

        </div>

    </footer>

</body>
</html>