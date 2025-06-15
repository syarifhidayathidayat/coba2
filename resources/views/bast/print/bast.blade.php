<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BAST  {{ $bast->sp->penyedia->nama_penyedia }} No.SP {{ $bast->sp->nomor_sp }}</title>
    <style>
        @page {
            size: 215mm 330mm;
            margin: 20mm 20mm 20mm 30mm;
        }
        body {
            font-family: Times New Roman, sans-serif;
            margin: 10px;
            text-align: justify;
            font-size: 13px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px 10px 10px 10px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
        }
        
        .content {
            margin-bottom: 10px;
            line-height: 1.5;
            
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
            width: 70%;
            text-align: left;
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
        .info-label2 {
            display: inline-block;
            width: 100px;
        }
        .info-value {
            display: inline-block;
        }
        .info-value2 {
            /* display: inline-block; */
            width: 100px;
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
                <div class="info-item">
                    <span class="info-label2">Pekerjaan</span>
                    <span class="info-value2">: {{ $bast->sp->nama_paket }} Tahun anggaran {{ date('Y') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label2">Lokasi</span>
                    <span class="info-value">: Banjarbaru</span>
                </div>
            </td>
            <td style="width:50%; vertical-align:top; ">
                <div class="info-item">
                    <span class="info-label2">Nomor</span>
                    <span class="info-value">: {{ $bast->nomor_bast }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label2">Tanggal</span>
                    <span class="info-value">: {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d-m-Y') }}</span>
                </div>
            </td>
        </tr>
    </table>
    <div class="content">
    <p>Pada hari ini {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('dddd') }} tanggal {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d') }} bulan {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('MMMM') }} tahun {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('Y') }}, kami yang bertanda tangan di bawah ini:</p>

    <ol style="padding-left: 20px;">
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
        <div style="margin-bottom: 12px;">Selanjutnya disebut sebagai <strong>PIHAK PERTAMA</strong></div>
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
      <div>Selanjutnya disebut sebagai <strong>PIHAK KEDUA</strong></div>
    </li>
</ol>
<p>Kedua belah pihak berdasarkan Surat Pesanan Nomor : {{ $bast->sp->nomor_sp ?? '-' }} tanggal {{ \Carbon\Carbon::parse($bast->sp->tanggal_sp)->format('d-m-Y') }} dan Berita Acara Pemeriksaan Hasil Pekerjaan  No  : {{ $bast->nomor_bast ?? '-' }} tanggal {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d-m-Y') }} </p>
<p>Dengan ini telah setuju dan sepakat untuk melakukan Serah Terima Pelaksanaan Pengadaan {{ $bast->sp->nama_paket ?? '-' }} pada Poltekkes Kemenkes Banjarmasin Tahun anggaran {{ date('Y') }}.</p>

<p>PIHAK KEDUA menyerahkan kepada PIHAK PERTAMA dan PIHAK PERTAMA menerima dari PIHAK KEDUA seluruh hasil pekerjaan tersebut untuk :</p>
<ol style="padding-left: 20px;">
    
        
        <li><div class="info-item"><span class="info-label">Pekerjaan</span><span class="info-value">: {{ $bast->sp->nama_paket ?? '-' }}</span></div></li>
        <li><div class="info-item"><span class="info-label">Lokasi</span><span class="info-value">: Banjarbaru</span></div></li>    
        <li><div class="info-item"><span class="info-label">Instansi</span><span class="info-value">: Kementerian Kesehatan R.I.</span></div></li>
        <li><div class="info-item"><span class="info-label">DIPA</span><span class="info-value">: </span></div></li>
        
        </ol>
   <p>
    Demikian Berita Acara ini dibuat dan ditandatangani di Banjarbaru pada tanggal tersebut diatas oleh kedua belah pihak dalam rangkap 3 (tiga) untuk dipergunakan seperlunya.    </li>
   

 <p style="margin-top: 20px;"></p>

    </div>

    <div class="footer">
    <div class="signature">
            <div>PIHAK PERTAMA</div>
            <div>PEJABAT PEMBUAT KOMITMEN</div>
            <br><br><br><br>
            <div> <strong>Nama Penerima</strong> </div>
            <div>NIP. 19630310 198803 1 001</div>
        </div>
        <div class="signature">
            <div>PIHAK KEDUA</div>
            <div>{{ $bast->sp->penyedia->nama_penyedia }}</div>
            <br><br><br><br>
            <div><strong>{{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}</strong> </div>
            <div>Direktur</div>
        </div>
        <div class="clear"></div>
    </div>

    
        
</body>
</html> 