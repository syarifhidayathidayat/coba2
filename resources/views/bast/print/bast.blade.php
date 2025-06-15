<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BAST - {{ $bast->nomor_bast }}</title>
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
        <img src="/sb-admin-2/img/KOP_2025.jpg" alt="Kop Surat" style="width:100%;max-width:900px;margin-bottom:20px;">
        <h3>BERITA ACARA SERAH TERIMA BARANG</h3>
    </div>
    <table style="width:100%; margin-bottom: 20px;">
        <tr>
            <td style="width:50%; vertical-align:top;">
                <strong>Pekerjaan</strong> : {{ $bast->sp->nama_paket }} Tahun anggaran {{ date('Y') }}<br>
                <strong>Lokasi</strong>    : Banjarbaru
            </td>
            <td style="width:50%; vertical-align:top; text-align:right;">
                <strong>Nomor</strong>   : {{ $bast->nomor_bast }}<br>
                <strong>Tanggal</strong> : {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d-m-Y') }}
            </td>
        </tr>
    </table>
    <div class="content">
        <p>Pada hari ini {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('dddd') }} tanggal {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d') }} bulan {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('MMMM') }} tahun {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('Y') }}, kami yang bertanda tangan di bawah ini:</p>
        
        <ol>
            <li>Nama: [Nama Penerima]<br>
                Jabatan: [Jabatan Penerima]<br>
                Dalam hal ini bertindak untuk dan atas nama [Nama Instansi]<br>
                Selanjutnya disebut sebagai "PIHAK PERTAMA"</li>
            <li>Nama: {{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}<br>
                Jabatan: Direktur {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}<br>
                Dalam hal ini bertindak untuk dan atas nama {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}<br>
                Selanjutnya disebut sebagai "PIHAK KEDUA"</li>
            
        </ol>
<p>
PIHAK PERTAMA dengan ini menyatakan :<br>
1.   Telah mengadakan Pemeriksaan Pekerjaan :
    <ol type="a" style="margin-left: 0; padding-left: 20px;">
        <li><strong>Pekerjaan</strong> : {{ $bast->sp->nama_paket ?? '-' }}</li>
        <li><strong>Lokasi</strong> : Banjarbaru</li>
        <li><strong>Instansi</strong> : Kementerian Kesehatan R.I.</li>
        <li><strong>DIPA</strong> : </li>
        <li><strong>Penyedia</strong> : {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}</li>
        <li><strong>No SP</strong> : {{ $bast->sp->nomor_sp ?? '-' }}</li>
        <li><strong>Hasil Pemeriksaan</strong> : Terlampir</li>
    </ol>
2.  Berdasarkan pemeriksaan tersebut, Penyedia/Pelaksana Pekerjaan yang bersangkutan telah menyelesaikan seluruh pelaksanaan pekerjaan dengan baik, sesuai dengan kontrak pekerjaan dengan segala perubahan dan kelengkapannya seperti dimaksud dalam Surat Pesanan.<br><br>
3.  Berdasarkan Surat Pesanan tersebut diatas selanjutnya dapat diadakan Serah Terima atas seluruh pekerjaan ({{ $bast->sp->nama_paket ?? '-' }}) Tahun anggaran {{ date('Y') }}<br><br>
Demikian Berita Acara ini dibuat dan ditanda tangani di Banjarbaru pada tanggal tersebut diatas, dalam rangkap 3 (Tiga) untuk dipergunakan seperlunya.
        

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
            <p>( [Nama Penerima] )</p>
        </div>
        <div class="clear"></div>
    </div>

    <div style="page-break-before: always;"></div>
    <p style="margin-top:40px;">Lampiran : Berita Acara Pemeriksaan Hasil Pekerjaan</p>
    <p>Nomor    : KN.01.04/5.2/01907/2023</p>
    <p>Tanggal  : 21 Maret 2023</p>

    
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

        <div class="footer">
        <div class="signature">
            <p>PIHAK PERTAMA</p>
            <br><br><br>
            <p>( {{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }} )</p>
        </div>
        <div class="signature">
            <p>PIHAK KEDUA</p>
            <br><br><br>
            <p>( [Nama Penerima] )</p>
        </div>
        <div class="clear"></div>
    </div>
        
</body>
</html> 