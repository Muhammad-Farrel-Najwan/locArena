<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocArena - Booking Lapangan Olahraga</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
            background: #f4f6f3;
            font-size: 14px;
        }

        a {
            color: #1f6f43;
            text-decoration: none;
        }

        .wrap {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 16px;
        }

        header.topbar {
            background: #fff;
            border-bottom: 1px solid #ddd;
        }

        .topbar .wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 20px;
            font-weight: bold;
            color: #1f6f43;
        }

        .brand img {
            height: 32px;
            width: auto;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid #1f6f43;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-outline {
            background: #fff;
            color: #1f6f43;
        }

        .btn-solid {
            background: #1f6f43;
            color: #fff;
        }

        .hero {
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding: 40px 0;
        }

        .hero h1 {
            margin: 0 0 8px;
            font-size: 28px;
            color: #1f6f43;
        }

        .hero p {
            margin: 0 0 20px;
            color: #555;
            max-width: 560px;
        }

        form.cari {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            background: #f4f6f3;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
        }

        form.cari input,
        form.cari select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background: #fff;
        }

        section {
            padding: 24px 0;
        }

        h2.judul {
            font-size: 18px;
            margin: 0 0 12px;
            border-left: 4px solid #1f6f43;
            padding-left: 8px;
        }

        .statistik {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .statistik div {
            flex: 1 1 160px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            text-align: center;
        }

        .statistik strong {
            display: block;
            font-size: 22px;
            color: #1f6f43;
        }

        ul.kategori {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul.kategori li {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 999px;
            padding: 6px 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid #ddd;
        }

        th,
        td {
            border-bottom: 1px solid #e4e4e4;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #eaf3ec;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        tbody tr:hover {
            background: #f9fcfa;
        }

        .muted {
            color: #777;
            font-size: 13px;
        }

        .badge {
            display: inline-block;
            background: #eaf3ec;
            color: #1f6f43;
            border: 1px solid #cfe3d5;
            border-radius: 999px;
            padding: 2px 8px;
            font-size: 12px;
        }

        ol.langkah {
            margin: 0;
            padding-left: 20px;
        }

        ol.langkah li {
            margin-bottom: 6px;
        }

        .cta-owner {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        footer {
            background: #fff;
            border-top: 1px solid #ddd;
            padding: 16px 0;
            margin-top: 24px;
        }

        footer .wrap {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 8px;
            font-size: 13px;
            color: #666;
        }
    </style>
</head>

<body>
    <header class="topbar">
        <div class="wrap">
            <span class="brand">
                <img src="{{ asset('images/LOGO.png') }}" alt="LocArena">
                LocArena
            </span>
        </div>
    </header>

    <section class="hero">
        <div class="wrap">
            <h1>Booking Lapangan Olahraga Tanpa Ribet</h1>
            <p>Temukan venue futsal, badminton, dan basket di sekitarmu. Lihat harga, jadwal, dan pesan langsung dari satu tempat.</p>

            <form class="cari" method="GET" action="{{ route('customer.venue.index') }}">
                <input type="text" name="q" placeholder="Cari nama venue...">
                <select name="jenis">
                    <option value="">Semua jenis</option>
                    @foreach ($jenisList as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->nama_lapangan }}</option>
                    @endforeach
                </select>
                <select name="kota">
                    <option value="">Semua kota</option>
                    @foreach ($kotaList as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kota }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-solid">Cari Lapangan</button>
            </form>
        </div>
    </section>

    <div class="wrap">
        <section>
            <div class="statistik">
                <div><strong>{{ $statistik['venue'] }}</strong> Venue Terverifikasi</div>
                <div><strong>{{ $statistik['lapangan'] }}</strong> Lapangan Aktif</div>
                <div><strong>{{ $statistik['kota'] }}</strong> Kota</div>
            </div>
        </section>

        <section>
            <h2 class="judul">Kategori Lapangan</h2>
            <ul class="kategori">
                @forelse ($jenisList as $jenis)
                    <li>{{ $jenis->nama_lapangan }} <span class="muted">({{ $jenis->lapangan_count }})</span></li>
                @empty
                    <li class="muted">Belum ada kategori</li>
                @endforelse
            </ul>
        </section>

        <section>
            <h2 class="judul">Venue Unggulan</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Venue</th>
                        <th>Wilayah</th>
                        <th>Lapangan</th>
                        <th>Harga Mulai</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($venueUnggulan as $venue)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $venue->nama_venue }}</strong><br>
                                <span class="muted">{{ $venue->detail_alamat }}</span><br>
                                @if ($venue->status_verifikasi)
                                    <span class="badge">Terverifikasi</span>
                                @endif
                            </td>
                            <td>
                                {{ $venue->kecamatan?->nama_kecamatan }},
                                {{ $venue->kecamatan?->kota?->nama_kota }}<br>
                                <span class="muted">{{ $venue->kecamatan?->kota?->provinsi?->nama_provinsi }}</span>
                            </td>
                            <td>{{ $venue->lapangan->count() }}</td>
                            <td>
                                @if ($venue->harga_mulai)
                                    Rp{{ number_format($venue->harga_mulai, 0, ',', '.') }}/jam
                                @else
                                    <span class="muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if ($venue->rata_rating)
                                    {{ number_format($venue->rata_rating, 1) }} / 5
                                    <br><span class="muted">{{ $venue->jumlah_ulasan }} ulasan</span>
                                @else
                                    <span class="muted">Belum ada ulasan</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('customer.venue.show', $venue->id) }}" class="btn btn-outline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="muted">Belum ada venue yang terverifikasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

        <section>
            <h2 class="judul">Cara Booking</h2>
            <ol class="langkah">
                <li>Cari venue dan jenis lapangan yang kamu butuhkan.</li>
                <li>Pilih lapangan, tanggal, dan jam bermain.</li>
                <li>Lakukan pembayaran, lalu tunjukkan kode QR saat datang.</li>
            </ol>
        </section>

        <section>
            <div class="cta-owner">
                <div>
                    <strong>Punya lapangan?</strong>
                    <div class="muted">Pendaftaran venue sebagai owner akan segera tersedia.</div>
                </div>
                <span class="badge">Segera hadir</span>
            </div>
        </section>
    </div>

    <footer>
        <div class="wrap">
            <span>&copy; {{ date('Y') }} LocArena</span>
            <span class="muted">Booking lapangan olahraga lebih mudah.</span>
        </div>
    </footer>
</body>

</html>
