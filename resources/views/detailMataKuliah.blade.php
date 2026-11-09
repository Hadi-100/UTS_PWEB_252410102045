<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mata Kuliah - CampusHub</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #eff4ff;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            width: 100%;
            flex: 1;
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .back {
            display: inline-block;
            color: #2563eb;
            text-decoration: none;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        h2 {
            font-size: 19px;
            margin-bottom: 20px;
        }

        .item {
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item h3 {
            font-size: 15px;
            margin-bottom: 8px;
        }

        .info {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #64748b;
        }

        .status {
            color: #64748b;
            font-weight: bold;
        }

        .materi {
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .materi:last-child {
            border-bottom: none;
        }

        .uts {
            font-size: 14px;
            color: #64748b;
        }

        footer {
            background: white;
            text-align: center;
            padding: 30px;
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="container">

        <a href="{{ url('/pengelolaan') }}" class="back">
            ← Kembali ke Pengelolaan
        </a>

        <h1>{{ $matakuliah['nama'] }}</h1>

        <p class="subtitle">
            Detail tugas dan materi perkuliahan.
        </p>

        <div class="card">

            <h2>Daftar Tugas</h2>

            @foreach ($matakuliah['tugas'] as $tugas)

                <div class="item">  

                    <h3>{{ $tugas['nama'] }}</h3>

                    <div class="info">
                        <span>
                            Deadline: {{ $tugas['deadline'] }}
                        </span>

                        <span class="status">
                            {{ $tugas['status'] }}
                        </span>
                    </div>

                </div>

            @endforeach 

            <h2 class="materi-title">Materi Perkuliahan</h2>

            @foreach ($matakuliah['materi'] as $materi)

                <div class="materi">
                    {{ $materi }}
                </div>

            @endforeach

            <h2 class="materi-title">Ujian Tengah Semester</h2>

            <div class="info">
                <span>UTS {{ $matakuliah['nama'] }}</span>

                <span>Jadwal: {{ $matakuliah['uts'] }}</span>
            </div>

        </div>

    </div>

    <footer>
        © 2026 CampusHub
    </footer>

</body>
</html>