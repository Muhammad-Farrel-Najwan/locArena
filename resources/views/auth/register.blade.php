<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - LocArena</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f3;
            color: #222;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 24px;
            width: 100%;
            max-width: 420px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 20px;
            font-weight: bold;
            color: #1f6f43;
            margin-bottom: 4px;
            text-decoration: none;
        }

        .brand img { height: 28px; width: auto; }

        h1 { font-size: 18px; margin: 12px 0 16px; }

        label {
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
            font-size: 13px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 12px;
            background: #fff;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1f6f43;
            color: #fff;
            border: 1px solid #1f6f43;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            background: #fdecec;
            border: 1px solid #f5c2c2;
            color: #a12626;
            border-radius: 6px;
            padding: 8px 12px;
            margin-bottom: 12px;
            font-size: 13px;
        }

        .error ul { margin: 0; padding-left: 16px; }

        .muted { color: #777; font-size: 13px; text-align: center; margin-top: 16px; }

        .muted a { color: #1f6f43; }
    </style>
</head>

<body>
    <div class="card">
        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('images/LOGO.png') }}" alt="LocArena">
            LocArena
        </a>

        <h1>Buat akun LocArena</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.process') }}">
            @csrf

            <label for="nama_depan">Nama depan</label>
            <input type="text" id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}" maxlength="50" required autofocus>

            <label for="nama_belakang">Nama belakang (opsional)</label>
            <input type="text" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}" maxlength="50">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" maxlength="100" required>

            <label for="no_telepon">No. telepon (opsional)</label>
            <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" maxlength="20">

            <label for="jenis_kelamin">Jenis kelamin (opsional)</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="">-</option>
                <option value="L" @selected(old('jenis_kelamin') === 'L')>Laki-laki</option>
                <option value="P" @selected(old('jenis_kelamin') === 'P')>Perempuan</option>
            </select>

            <label for="password">Password (min. 8 karakter)</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Ulangi password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Daftar</button>
        </form>

        <p class="muted">
            Sudah pernah mendaftar? <a href="{{ url('/') }}">Kembali ke beranda</a>
        </p>
    </div>
</body>

</html>
