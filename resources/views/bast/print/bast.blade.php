<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BAST  {{ $bast->sp->penyedia->nama_penyedia }} No.SP {{ $bast->sp->nomor_sp }}</title>
    <style>
        @page {
            size: 215mm 330mm;
            margin: 20mm 20mm 20mm 20mm;
        }
        body {
            font-family: Calibri, sans-serif;
            margin: 10px;
            text-align: justify;
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
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-bottom: 10px; */
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .footer {
            /* margin-top: 50px; */
        }
        .signature {
            float: left;
            width: 45%;
            text-align: center;
        }
        .clear {
            clear: both;
        } .info-item {
            /* margin: 5px 0; */
        }
        .info-label {
            display: inline-block;
            width: 170px;
        }
        .info-value {
            display: inline-block;
        }
        .error-message {
            color: red;
            text-align: center;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid red;
            background-color: #fff0f0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="/sb-admin-2/img/KOP_2025.jpg" alt="Kop Surat" style="width:100%;max-width:900px;margin-bottom:20px;">
        <h3>BERITA ACARA SERAH TERIMA BARANG</h3>
    </div>
    <table style="width:100%; ">
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
    <li>
        <div class="info-item">
            <span class="info-label">Nama</span>
            <span class="info-value">: {{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Jabatan</span>
            <span class="info-value">: Direktur {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Alamat</span>
            <span class="info-value">: {{ $bast->sp->penyedia->alamat ?? '-' }}</span>
        </div>
        <p>Selanjutnya disebut sebagai <strong>PIHAK PERTAMA</strong></p>
    </li>
    <li>
        <div class="info-item">
            <span class="info-label">Nama</span>
            <span class="info-value">: [Nama Penerima]</span>
        </div>
        <div class="info-item">
            <span class="info-label">Jabatan</span>
            <span class="info-value">: [Jabatan Penerima]</span>
        </div>
        <div class="info-item">
            <span class="info-label">Alamat</span>
            <span class="info-value">: [Alamat Penerima]</span>
        </div>
      <p>Selanjutnya disebut sebagai <strong>PIHAK KEDUA</strong></p>
    </li>
</ol>

<p>PIHAK PERTAMA dengan ini menyatakan :</p>
<ol style="padding-left: 20px;">
    <li>
        Telah mengadakan Pemeriksaan Pekerjaan:
        <div class="info-item"><span class="info-label">Pekerjaan</span><span class="info-value">: {{ $bast->sp->nama_paket ?? '-' }}</span></div>
        <div class="info-item"><span class="info-label">Lokasi</span><span class="info-value">: Banjarbaru</span></div>
        <div class="info-item"><span class="info-label">Instansi</span><span class="info-value">: Kementerian Kesehatan R.I.</span></div>
        <div class="info-item"><span class="info-label">DIPA</span><span class="info-value">: </span></div>
        <div class="info-item"><span class="info-label">Penyedia</span><span class="info-value">: {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}</span></div>
        <div class="info-item"><span class="info-label">No SP</span><span class="info-value">: {{ $bast->sp->nomor_sp ?? '-' }}</span></div>
        <div class="info-item"><span class="info-label">Hasil Pemeriksaan</span><span class="info-value">: Terlampir</span></div>
    </li>
    <li style="margin-top: 10px;">
        Berdasarkan pemeriksaan tersebut, Penyedia/Pelaksana Pekerjaan yang bersangkutan telah menyelesaikan seluruh pelaksanaan pekerjaan dengan baik, sesuai dengan kontrak pekerjaan dengan segala perubahan dan kelengkapannya seperti dimaksud dalam Surat Pesanan.
    </li>
    <li style="margin-top: 10px;">
        Berdasarkan Surat Pesanan tersebut diatas selanjutnya dapat diadakan Serah Terima atas seluruh pekerjaan ({{ $bast->sp->nama_paket ?? '-' }}) Tahun anggaran {{ date('Y') }}.
    </li>
</ol>
<p>Demikian Berita Acara ini dibuat dan ditanda tangani di Banjarbaru pada tanggal tersebut di atas, dalam rangkap 3 (Tiga) untuk dipergunakan seperlunya.</p>
 

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