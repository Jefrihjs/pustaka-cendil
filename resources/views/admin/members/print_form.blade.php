@php
    \Carbon\Carbon::setLocale('id');
    
    $path = public_path('img/logo-pustaka.png');
    $base64 = '';
    if(file_exists($path)){
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        @page { margin: 0.5cm 1.5cm; }
        body { font-family: 'Arial', sans-serif; line-height: 1.1; color: #000; font-size: 11pt; }
        
        /* HEADER TABLE */
        .table-header { width: 100%; border-bottom: 2px solid #000; margin-bottom: 10px; }
        .text-cell { text-align: center; padding-bottom: 5px; }
        .text-cell h2 { margin: 0; font-size: 14pt; }
        .text-cell h1 { margin: 2px 0; font-size: 15pt; }
        .text-cell p { margin: 0; font-size: 9pt; }

        .title { text-align: center; text-decoration: underline; font-weight: bold; margin: 15px 0; font-size: 12pt; }

        /* FORM DATA TABLE */
        .form-table { width: 100%; border-collapse: collapse; }
        .form-table td { padding: 3px 0; vertical-align: top; }
        .label { width: 220px; }
        .colon { width: 15px; }
        .value { border-bottom: 1px dotted #000; font-weight: bold; }

        /* PEKERJAAN DENGAN CHECKBOX */
        .work-table { width: 100%; margin-left: 20px; margin-top: 5px; }
        .box { width: 14px; height: 14px; border: 1px solid #000; display: inline-block; text-align: center; line-height: 12px; font-weight: bold; }
        .dotted-line { border-bottom: 1px dotted #000; display: inline-block; min-width: 250px; }

        /* TANDA TANGAN */
        .sig-table { width: 100%; margin-top: 30px; }
        .sig-cell { width: 50%; text-align: center; vertical-align: top; }
        .spacer { height: 60px; }
        .underline { border-bottom: 1px solid #000; font-weight: bold; display: inline-block; min-width: 180px; }
    </style>
</head>
<body>

    <table class="table-header">
        <tr>
            <td width="80">
                @if($base64) <img src="{{ $base64 }}" width="70"> @endif
            </td>
            <td class="text-cell">
                <h2>PUSTAKA CENDIL TIGE KUBOK</h2>
                <h1>DESA CENDIL KECAMATAN KELAPA KAMPIT</h1>
                <h1>KABUPATEN BELITUNG TIMUR</h1>
                <p>Alamat : Jln. Sijuk Desa Cendil Kec. Kelapa Kampit Kab. Belitung Timur 33571</p>
            </td>
        </tr>
    </table>

    <div class="title">FORMULIR PENDAFTARAN ANGGOTA</div>

    <p style="margin-bottom: 5px;">Yang bertanda tangan dibawah ini :</p>

    <table class="form-table">
        <tr>
            <td class="label">Nama</td>
            <td class="colon">:</td>
            <td class="value">{{ $member->nama }}</td>
        </tr>
        <tr>
            <td class="label">Tempat/Tgl. Lahir</td>
            <td class="colon">:</td>
            <td class="value">{{ $member->tempat_lahir }}, {{ \Carbon\Carbon::parse($member->tanggal_lahir)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td class="colon">:</td>
            <td class="value">{{ $member->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td class="label">Pekerjaan</td>
            <td class="colon">:</td>
            <td></td>
        </tr>
    </table>

    <table class="work-table">
        <tr>
            <td width="25"><div class="box">{{ $member->kategori_pekerjaan == 'umum' ? 'V' : '' }}</div></td>
            <td>Umum <span class="dotted-line"></span></td>
        </tr>
        <tr>
            <td><div class="box">{{ $member->kategori_pekerjaan == 'asn' ? 'V' : '' }}</div></td>
            <td>PNS di <span class="dotted-line">{{ $member->kategori_pekerjaan == 'asn' ? $member->instansi : '' }}</span></td>
        </tr>
        <tr>
            <td><div class="box">{{ $member->kategori_pekerjaan == 'mahasiswa' ? 'V' : '' }}</div></td>
            <td>Mahasiswa <span class="dotted-line">{{ $member->kategori_pekerjaan == 'mahasiswa' ? $member->instansi : '' }}</span></td>
        </tr>
        <tr>
            <td></td>
            <td>Fakultas <span class="dotted-line">{{ $member->fakultas ?? '' }}</span></td>
        </tr>
        <tr>
            <td><div class="box">{{ $member->kategori_pekerjaan == 'siswa' ? 'V' : '' }}</div></td>
            <td>Siswa di <span class="dotted-line">{{ $member->kategori_pekerjaan == 'siswa' ? $member->instansi : '' }}</span> Kls <span class="dotted-line" style="min-width:60px">{{ $member->kelas ?? '' }}</span></td>
        </tr>
    </table>

    <table class="form-table" style="margin-top:10px;">
        <tr>
            <td class="label">Alamat Kantor/Kampus/Sekolah</td>
            <td class="colon">:</td>
            <td class="value">{{ $member->alamat_instansi ?? '' }}</td>
        </tr>
        <tr>
            <td class="label">Alamat Rumah</td>
            <td class="colon">:</td>
            <td class="value">{{ $member->alamat_rumah ?? '' }}</td>
        </tr>
        <tr>
            <td></td><td></td>
            <td style="font-size: 10pt;">RT. <strong>{{ $member->rt ?? '...' }}</strong> RW. <strong>{{ $member->rw ?? '...' }}</strong> Desa. <strong>{{ $member->desa ?? '...' }}</strong></td>
        </tr>
        <tr>
            <td class="label">Telp. Rumah/Hp</td>
            <td class="colon">:</td>
            <td class="value">{{ $member->no_hp }}</td>
        </tr>
    </table>

    <div style="margin-top: 15px;">
        <p style="margin-bottom: 5px;">Dengan ini menyatakan sanggup dan berjanji :</p>
        <ol style="margin: 0; padding-left: 20px;">
            <li>Menuruti/Memenuhi segala syarat-syarat dan peraturan yang telah ditentukan oleh Perpustakaan Desa Cendil.</li>
            <li>Mengganti kerugian atas hilang atau rusaknya buku-buku yang saya pinjam.</li>
            <li>Memberi tahu setiap perubahan alamat dengan segera.</li>
        </ol>
        <p style="margin-top: 5px;">Demikian pernyataan ini saya buat dengan sebenarnya.</p>
    </div>

    <table class="sig-table">
        <tr>
            <td class="sig-cell">
                Diketahui oleh :<br>
                Ketua Kepala Perpustakaan
                <div class="spacer"></div>
                <span class="underline">EKA RIA LESTARI</span>
            </td>
            <td class="sig-cell">
                Cendil, {{ now()->translatedFormat('d F Y') }}<br>
                Yang bersangkutan,
                <div class="spacer"></div>
                <span class="underline">{{ $member->nama }}</span>
            </td>
        </tr>
    </table>

</body>
</html>