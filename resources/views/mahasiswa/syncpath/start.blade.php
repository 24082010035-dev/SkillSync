<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncPath</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-sky-50 min-h-screen">

<div class="max-w-4xl mx-auto py-12 px-6">

    <div class="bg-white rounded-3xl shadow p-8">

        <span class="bg-sky-100 text-sky-600 px-4 py-2 rounded-full text-sm">
            SyncPath
        </span>

        <h1 class="text-3xl font-bold text-sky-700 mt-4 mb-4">
            {{ $test->name }}
        </h1>

        <p class="text-slate-600 mb-8">
            {{ $test->description }}
        </p>

        <a href="{{ route('syncpath.question') }}"
           class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-xl inline-block">
            Mulai Tes
        </a>

    </div>

</div>

</body>
</html>