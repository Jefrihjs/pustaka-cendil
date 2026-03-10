<!DOCTYPE html>
<html>
<head>
    <title>Laporan SKM Pustaka Cendil</title>
    <style>
        body { font-family: sans-serif; padding: 10px; line-height: 1.4; }
        
        /* HEADER / KOP SURAT */
        .kop-surat { border-bottom: 4px double #000; padding-bottom: 10px; margin-bottom: 30px; }
        .table-kop { width: 100%; border: none; }
        .logo { width: 80px; }
        .text-kop { text-align: center; }
        .text-kop h1 { font-size: 18px; margin: 0; padding: 0; text-transform: uppercase; }
        .text-kop h2 { font-size: 20px; margin: 2px 0; padding: 0; text-transform: uppercase; }
        .text-kop p { font-size: 11px; margin: 2px 0; padding: 0; font-style: italic; }

        /* KONTEN */
        .title-laporan { text-align: center; text-decoration: underline; font-weight: bold; margin-bottom: 20px; }
        .box-skor { border: 3px solid #000; padding: 25px; text-align: center; margin: 40px auto; width: 280px; }
        .nilai { font-size: 55px; font-weight: bold; margin: 10px 0; }
        .mutu { font-size: 18px; font-weight: bold; background: #eee; padding: 5px; }
        
        .table-info { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table-info th, .table-info td { border: 1px solid #000; padding: 8px; text-align: center; font-size: 12px; }
        
        .ttd { margin-top: 50px; float: right; width: 250px; text-align: center; }
    </style>
</head>
<body>

    <div class="kop-surat">
        <table class="table-kop">
            <tr>
                <td class="logo">
                    {{-- Pastikan path gambarnya benar --}}
                    <img src="{{ public_path('images/logo-pustaka.png') }}" style="width: 90px;">
                </td>
                <td class="text-kop">
                    <h1>Pustaka Cendil Tige Kubok</h1>
                    <h2>Desa Cendil Kecamatan Kelapa Kampit</h2>
                    <h2>Kabupaten Belitung Timur</h2>
                    <p>Alamat : Jln. Sijuk Desa Cendil Kec. Kelapa Kampit Kab. Belitung Timur 33571</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="title-laporan">LAPORAN INDEKS KEPUASAN MASYARAKAT (IKM)</div>

    <div style="text-align: center; font-size: 12px;">Periode: Tahun 2026</div>

    <div class="box-skor">
        <div style="font-size: 14px; font-weight: bold; letter-spacing: 2px;">NILAI IKM</div>
        <div class="nilai">{{ $ikm }}</div>
        <div class="mutu">MUTU: {{ $mutu }}</div>
        <div style="margin-top: 5px; font-size: 12px; font-weight: bold;">({{ $kinerja }})</div>
    </div>

    <table class="table-info">
        <thead>
            <tr style="background: #f0f0f0;">
                <th>Jumlah Responden</th>
                <th>Kinerja Unit Pelayanan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $totalResponden }} Orang</td>
                <td>{{ $kinerja }}</td>
            </tr>
        </tbody>
    </table>

    <div class="ttd">
        <p>Manggar, {{ $tanggal }}</p>
        <p>Kepala Perpustakaan,</p>
        <br><br><br><br>
        <p><b><u>EKA RIA LESTARI</u></b><br>
        </p>
    </div>

</body>
</html>