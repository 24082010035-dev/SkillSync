<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mentor</title>


    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-slate-50 text-gray-800 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-50">

    <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold shadow">
            S
        </div>

        <div>
            <h1 class="text-xl font-bold text-blue-600">SkillSync</h1>
            <p class="text-xs text-slate-400">Mentor Dashboard</p>
        </div>
    </div>

    <div class="flex items-center gap-4">

        <div class="text-right">
            <p class="font-semibold text-slate-700">
                Halo, {{ auth()->user()->nama }}
            </p>
            <p class="text-sm text-slate-400">
                {{ session('role_user') }}
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-blue-500 text-white px-4 py-2 rounded-xl">
                Logout
            </button>
        </form>

    </div>
</nav>

<div class="p-8 max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white shadow-lg mb-8">
        <h1 class="text-3xl font-bold mb-3">
            Selamat Datang Mentor 🚀
        </h1>

        <p class="text-blue-100">
            Kelola proyek yang sudah Anda upload di SkillSync
        </p>
    </div>

    @php
        $pending = 0;
        $totalProyek = $proyekMentor->count();
        $totalViews = 0;
    @endphp

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-sm text-slate-400">Total Proyek</p>
            <h2 class="text-3xl font-bold">{{ $totalProyek }}</h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-sm text-slate-400">Pending</p>
            <h2 class="text-3xl font-bold">{{ $pending }}</h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-sm text-slate-400">Views</p>
            <h2 class="text-3xl font-bold">{{ $totalViews }}</h2>
        </div>

    </div>

    <!-- HEADER PROYEK -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold">Proyek Mentor</h2>
            <p class="text-slate-400 text-sm">Daftar proyek yang kamu upload</p>
        </div>

        <a href="{{ route('mentor.upload.proyek') }}"
           class="bg-blue-500 text-white px-5 py-3 rounded-2xl flex items-center gap-2">
            + Upload Proyek
        </a>
    </div>

    <!-- LIST PROYEK -->
    @if($proyekMentor->count() > 0)

        @foreach($proyekMentor as $proyek)

        <div class="bg-white p-6 rounded-3xl shadow-sm mb-4">

            <!-- JUDUL -->
            <h3 class="text-xl font-bold text-slate-800">
                {{ $proyek->judul_proyek }}
            </h3>

            <!-- DESKRIPSI -->
            <p class="text-slate-500 mt-1">
                {{ $proyek->deskripsi }}
            </p>

            <!-- TANGGAL -->
            <p class="text-xs text-slate-400 mt-2">
                {{ $proyek->created_at->format('d M Y') }}
            </p>

            <!-- ACTION BUTTON -->
            <div class="flex gap-3 mt-4">

                <!-- LIHAT (NEW) -->
                <a href="{{ route('mentor.upload.proyek.show', $proyek->id) }}"
                   class="text-green-500 border border-green-500 px-4 py-1 rounded-xl hover:bg-green-50">
                    Lihat
                </a>

                <!-- EDIT -->
                <a href="{{ route('mentor.upload.proyek.edit', $proyek->id) }}"
                   class="text-blue-500 border border-blue-500 px-4 py-1 rounded-xl hover:bg-blue-50">
                    Edit
                </a>

                <!-- DELETE -->
                <form action="{{ route('mentor.upload.proyek.delete', $proyek->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin mau hapus proyek ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-red-500 border border-red-500 px-4 py-1 rounded-xl hover:bg-red-50">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

        @endforeach

    @else

        <div class="bg-white p-10 text-center rounded-3xl border-dashed border-2 border-slate-200">
            <p class="text-slate-400">
                Belum ada proyek yang diupload
            </p>
        </div>

    @endif

</div>

<script>
    lucide.createIcons();
</script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif
</body>
</html>