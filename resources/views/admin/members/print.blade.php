@php
    \Carbon\Carbon::setLocale('id');

    // 1. Proses Logo Base64
    $pathLogo = public_path('img/logo-pustaka.png');
    $base64Logo = '';
    if(file_exists($pathLogo)){
        $base64Logo = 'data:image/png;base64,' . base64_encode(file_get_contents($pathLogo));
    }

    // 2. Proses QR Code Base64 (Agar tidak muncul X di PDF)
    $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . ($member->kode_anggota ?? '000');
    $base64Qr = '';
    try {
        $qrData = file_get_contents($qrUrl);
        $base64Qr = 'data:image/png;base64,' . base64_encode($qrData);
    } catch (\Exception $e) {
        $base64Qr = '';
    }
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak Kartu - {{ $member->nama }}</title>
    <style>
        /* RESET & BASE */
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif; 
            background-color: #f1f5f9; 
            margin: 0;
            padding: 50px 0;
        }

        /* Container Kartu (Ukuran Standar ID Card) */
        .card {
            width: 8.5cm;
            height: 5.4cm;
            background-color: #0f172a;
            color: white;
            border-radius: 10px;
            position: relative;
            margin: 0 auto 20px auto;
            overflow: hidden;
            border: 1px solid #334155;
            page-break-inside: avoid;
        }

        .card-back {
            background-color: white;
            color: #1e293b;
            border: 1px solid #cbd5e1;
        }

        /* Header */
        .header-table {
            width: 100%;
            background-color: #1e293b;
            padding: 10px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .brand { font-size: 14px; font-weight: bold; letter-spacing: 1px; }

        /* Content */
        .content-table { width: 100%; padding: 15px 20px; }
        .label { font-size: 7px; color: #94a3b8; text-transform: uppercase; margin-bottom: 2px; }
        .value { font-size: 11px; font-weight: bold; margin-bottom: 10px; text-transform: uppercase; }

        /* QR & Badge */
        .qr-box {
            position: absolute;
            top: 45px;
            right: 20px;
            background: white;
            padding: 3px;
            border-radius: 5px;
        }

        .footer-text { 
            position: absolute; 
            bottom: 15px; 
            left: 20px; 
            font-size: 7px; 
            color: #64748b; 
            width: 160px;
            line-height: 1.2;
        }

        .kode-badge {
            position: absolute;
            bottom: 15px;
            right: 20px;
            background: white;
            color: #0f172a;
            padding: 3px 8px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 4px;
            font-family: monospace;
        }

        /* Aturan Belakang */
        .title-back { 
            font-size: 10px; 
            font-weight: bold; 
            text-align: center; 
            border-bottom: 2px solid #0f172a; 
            margin: 15px 15px 10px 15px;
            padding-bottom: 5px;
        }
        .rules { font-size: 8.5px; padding-left: 30px; padding-right: 20px; line-height: 1.4; color: #334155; }

        .contact-info {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 7px;
            color: #64748b;
        }

        @media print {
            body { background: none; padding: 0; }
            .card { box-shadow: none; }
        }
    </style>
</head>
<body>

    <div class="card">
        <table class="header-table" cellspacing="0">
            <tr>
                <td width="30">
                    @if($base64Logo) <img src="{{ $base64Logo }}" width="25"> @endif
                </td>
                <td class="brand">PUSTAKA CENDIL</td>
            </tr>
        </table>

        <table class="content-table">
            <tr>
                <td>
                    <div class="label">Nama Anggota</div>
                    <div class="value">{{ strtoupper($member->nama) }}</div>
                    
                    <div class="label">Kategori</div>
                    <div class="value">{{ strtoupper($member->kategori_pekerjaan) }}</div>
                </td>
            </tr>
        </table>

        <div class="qr-box">
            @if($base64Qr)
                <img src="{{ $base64Qr }}" width="50" height="50">
            @else
                <div style="width: 50px; height: 50px; background: #eee; font-size: 5px; text-align: center;">QR Error</div>
            @endif
        </div>

        <div class="footer-text">
            Kartu ini berlaku selama menjadi anggota aktif.
        </div>

        <div class="kode-badge">{{ $member->kode_anggota }}</div>
    </div>

    <div class="card card-back">
        <div class="title-back">KETENTUAN PENGGUNAAN</div>
        <ol class="rules">
            <li>Kartu wajib dibawa saat layanan.</li>
            <li>Peminjaman buku maks 2 buah / 7 hari.</li>
            <li>Kerusakan buku tanggung jawab anggota.</li>
            <li>Kembalikan ke Pustaka Cendil Belitung Timur jika ditemukan.</li>
        </ol>
        <div class="contact-info">
            <strong>PUSTAKA CENDIL TIGE KUBOK</strong><br>
            Desa Cendil, Kec. Kelapa Kampit, Kab. Belitung Timur
        </div>
    </div>

</body>
</html>