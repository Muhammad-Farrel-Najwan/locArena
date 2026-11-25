<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LocArena</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f3;
            color: #222;
            font-size: 14px;
            padding: 24px;
        }

        .card {
            max-width: 720px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 24px;
        }

        h1 { font-size: 20px; margin: 0 0 4px; color: #1f6f43; }

        .muted { color: #777; font-size: 13px; }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #eee;
            margin-top: 16px;
            padding-top: 16px;
        }

        .badge {
            display: inline-block;
            background: #eaf3ec;
            color: #1f6f43;
            border: 1px solid #cfe3d5;
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 12px;
        }

        button {
            padding: 8px 16px;
            background: #fff;
            color: #1f6f43;
            border: 1px solid #1f6f43;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        a { color: #1f6f43; }
    </style>
</head>

<body>
    <div class="card">
        <h1>Dashboard Admin</h1>
        <p class="muted">Masuk sebagai {{ auth()->user()->nama_depan }} ({{ auth()->user()->role }}).</p>

        <p><span class="badge">Halaman masih placeholder</span></p>
        <p class="muted">Modul verifikasi venue, user, transaksi, dan wilayah belum diisi.</p>

        <div class="row">
            <a href="{{ url('/') }}">Kembali ke landing page</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar</button>
            </form>
        </div>
    </div>
</body>

</html>
