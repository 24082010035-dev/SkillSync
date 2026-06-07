<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan SyncInsight</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
            color:#333;
            line-height:1.6;
        }

        h1{
            text-align:center;
            color:#2563eb;
            margin-bottom:5px;
        }

        h2{
            color:#1e40af;
            margin-bottom:10px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:10px;
        }

        table, th, td{
            border:1px solid #d1d5db;
        }

        th{
            background:#f1f5f9;
        }

        th, td{
            padding:8px;
        }

        .section{
            margin-top:25px;
        }

        .info-box{
            background:#f8fafc;
            border:1px solid #e2e8f0;
            padding:12px;
            margin-top:10px;
        }

        .badge{
            display:inline-block;
            padding:4px 10px;
            border-radius:4px;
            background:#dbeafe;
            color:#1d4ed8;
            font-weight:bold;
        }

    </style>

</head>
<body>

    <h1>Laporan SyncInsight</h1>

    <p>
        <strong>Tanggal Cetak :</strong>
        {{ now()->format('d-m-Y') }}
    </p>

    <hr>

    <!-- RINGKASAN -->
    <div class="section">

        <h2>Ringkasan Kompetensi</h2>

        <div class="info-box">

            <p>
                <strong>Skill Readiness :</strong>
                {{ $readiness }}%
            </p>

            <p>
                <strong>Level Kompetensi :</strong>
                {{ $level }}
            </p>

            <p>
                <strong>Standar Industri :</strong>
                {{ $standarIndustri }}%
            </p>

            <p>
                <strong>Skill Gap :</strong>
                {{ $gap }}%
            </p>

        </div>

    </div>

    <!-- SKILL TERKUAT -->
    <div class="section">

        <h2>Skill Terkuat</h2>

        <table>

            <tr>
                <th>Skill</th>
                <th>Skor</th>
            </tr>

            @foreach($topSkills as $skill)

            <tr>
                <td>{{ $skill->skill->nama_skill }}</td>
                <td>{{ $skill->skor }}</td>
            </tr>

            @endforeach

        </table>

    </div>

    <!-- AREA PENGEMBANGAN -->
    <div class="section">

        <h2>Area Pengembangan</h2>

        <table>

            <tr>
                <th>Skill</th>
                <th>Skor</th>
            </tr>

            @foreach($lowSkills as $skill)

            <tr>
                <td>{{ $skill->skill->nama_skill }}</td>
                <td>{{ $skill->skor }}</td>
            </tr>

            @endforeach

        </table>

    </div>

    <!-- KEPRIBADIAN -->
    @if($kepribadianDominan)

    <div class="section">

        <h2>Profil Kepribadian</h2>

        <div class="info-box">

            <p>
                <strong>Kategori Dominan :</strong>
                {{ $kepribadianDominan->kategori->nama_kategori }}
            </p>

            <p>
                <strong>Skor :</strong>
                {{ $kepribadianDominan->skor }}
            </p>

        </div>

    </div>

    @endif

    <!-- KARIER -->
    @if($rekomendasiKarier)

    <div class="section">

        <h2>Rekomendasi Jalur Karier</h2>

        <div class="info-box">

            <p>
                <strong>Bidang Dominan :</strong>
                {{ $rekomendasiKarier->kategori->nama_kategori }}
            </p>

            <p>
                <strong>Skor Kecocokan :</strong>
                {{ $rekomendasiKarier->skor }}
            </p>

        </div>

    </div>

    @endif

    <!-- DETAIL SKILL -->
    <div class="section">

        <h2>Seluruh Kompetensi</h2>

        <table>

            <tr>
                <th>Skill</th>
                <th>Skor</th>
            </tr>

            @foreach($allSkills as $skill)

            <tr>
                <td>{{ $skill->skill->nama_skill }}</td>
                <td>{{ $skill->skor }}</td>
            </tr>

            @endforeach

        </table>

    </div>

    <!-- REKOMENDASI -->
    @if(count($rekomendasiPengembangan))

    <div class="section">

        <h2>Rekomendasi Pengembangan</h2>

        <ul>

            @foreach($rekomendasiPengembangan as $item)

                <li>{{ $item }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <!-- KESIMPULAN -->
    <div class="section">

        <h2>Kesimpulan</h2>

        <div class="info-box">

            Mahasiswa memiliki tingkat kesiapan kompetensi sebesar
            <strong>{{ $readiness }}%</strong>
            dengan kategori
            <strong>{{ $level }}</strong>.

            @if($topSkills->count())
                Kompetensi yang paling menonjol adalah
                <strong>{{ $topSkills->first()->skill->nama_skill }}</strong>.
            @endif

            @if($rekomendasiKarier)
                Jalur karier yang direkomendasikan adalah
                <strong>{{ $rekomendasiKarier->kategori->nama_kategori }}</strong>.
            @endif

        </div>

    </div>

</body>
</html>