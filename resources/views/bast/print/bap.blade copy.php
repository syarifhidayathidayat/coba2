<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BAP - {{ $bast->nomor_bap }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .content {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .footer {
            margin-top: 50px;
        }
        .signature {
            float: left;
            width: 45%;
            text-align: center;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>BERITA ACARA PEMERIKSAAN</h2>
        <p>Nomor: {{ $bast->nomor_bap }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        <ol>
            <li>Nama: {{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}<br>
                Jabatan: Direktur {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}<br>
                Dalam hal ini bertindak untuk dan atas nama {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}<br>
                Selanjutnya disebut sebagai "PIHAK PERTAMA"</li>
            <li>Nama: [Nama Pemeriksa]<br>
                Jabatan: [Jabatan Pemeriksa]<br>
                Dalam hal ini bertindak untuk dan atas nama [Nama Instansi]<br>
                Selanjutnya disebut sebagai "PIHAK KEDUA"</li>
        </ol>

        <p>Pada hari ini {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('dddd') }} tanggal {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d') }} bulan {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('MMMM') }} tahun {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('Y') }}, telah dilakukan pemeriksaan barang dengan ketentuan sebagai berikut:</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bast->barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->pivot->jumlah_serah_terima }}</td>
                    <td>{{ $barang->pivot->kondisi }}</td>
                    <td>{{ $barang->pivot->keterangan ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>Hasil Pemeriksaan:</p>
        <p>[Hasil pemeriksaan barang]</p>

        <p>Demikian Berita Acara Pemeriksaan ini dibuat dengan sebenarnya dan ditandatangani oleh kedua belah pihak.</p>
    </div>

    <div class="footer">
        <div class="signature">
            <p>PIHAK PERTAMA</p>
            <br><br><br>
            <p>( {{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }} )</p>
        </div>
        <div class="signature">
            <p>PIHAK KEDUA</p>
            <br><br><br>
            <p>( [Nama Pemeriksa] )</p>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html> 