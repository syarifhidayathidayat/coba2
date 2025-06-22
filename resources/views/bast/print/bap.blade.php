<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Berita Acara Pemeriksaan  {{ $bast->sp->penyedia->nama_penyedia }} No.SP {{ $bast->sp->nomor_sp }}</title>
    <style>
        @page {
            size: 215mm 330mm;
            margin: 10mm 20mm 20mm 30mm;
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
<img src="{{ public_path('sb-admin-2/img/KOP_2025.jpg') }}" alt="Kop Surat" style="width:110%;max-width:900px;margin-bottom:0px;">        <h3>BERITA ACARA PEMERIKSAAN HASIL PEKERJAAN</h3>
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
                    <span class="info-value">: {{ $bast->nomor_bap }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label2">Tanggal</span>
                    <span class="info-value">: {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d-m-Y') }}</span>
                </div>
            </td>
        </tr>
    </table>
    <div class="content">
              @php
            $tanggal = \Carbon\Carbon::parse($bast->tanggal_bast);
            $hari = $tanggal->locale('id')->isoFormat('dddd');
            $tgl = trim(terbilang((int)$tanggal->format('d')));
            $bulan = strtolower($tanggal->locale('id')->isoFormat('MMMM'));
            $tahun = trim(terbilang((int)$tanggal->format('Y')));
        @endphp
        <p>Pada hari ini {{ $hari }} tanggal {{ $tgl }} bulan {{ $bulan }} tahun {{ $tahun }}, kami yang bertanda tangan di bawah ini:</p>

    <ol style="padding-left: 20px;">
            <li>
                <div class="info-item">
                    <span class="info-label">Nama</span>
                    <span class="info-value">: {{ $institusi->nama_ppk_53 ?? '-' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Jabatan</span>
                    <span class="info-value">: Pejabat Pembuat Komitmen</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Alamat</span>
                    <span class="info-value">: {{ $institusi->alamat ?? '-' }}</span>
                </div>
                <div style="margin-bottom: 12px;">Selanjutnya disebut sebagai <strong>PIHAK PERTAMA</strong></div>
            </li>
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
                    <span class="info-value2">: {{ $bast->sp->penyedia->alamat ?? '-' }}</span>
                </div>
                <div style="margin-bottom: 12px;">Selanjutnya disebut sebagai <strong>PIHAK KEDUA</strong></div>
            </li>
        </ol>

<p>PIHAK PERTAMA dengan ini menyatakan :</p>
<ol style="padding-left: 20px;">
    <li>
        Telah mengadakan Pemeriksaan Pekerjaan:
        <div class="info-item"><span class="info-label">Pekerjaan</span><span class="info-value">: {{ $bast->sp->nama_paket ?? '-' }}</span></div>
        <div class="info-item"><span class="info-label">Lokasi</span><span class="info-value">: Banjarbaru</span></div>
        <div class="info-item"><span class="info-label">Instansi</span><span class="info-value">: Kementerian Kesehatan R.I.</span></div>
        <div class="info-item"><span class="info-label">DIPA</span><span class="info-value">: {{ $institusi->dipa ?? '-'}} </span></div>
        <div class="info-item"><span class="info-label">Penyedia</span><span class="info-value">: {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}</span></div>
        <div class="info-item"><span class="info-label">No SP</span><span class="info-value">: {{ $bast->sp->nomor_sp ?? '-' }}</span></div>
        <div class="info-item"><span class="info-label">Hasil Pemeriksaan</span><span class="info-value">: Terlampir</span></div>
    </li>
    <li style="margin-top: 2px;">
        Berdasarkan pemeriksaan tersebut, Penyedia/Pelaksana Pekerjaan yang bersangkutan telah menyelesaikan seluruh pelaksanaan pekerjaan dengan baik, sesuai dengan kontrak pekerjaan dengan segala perubahan dan kelengkapannya seperti dimaksud dalam Surat Pesanan.
    </li>
    <li style="margin-top: 2px;">
        Berdasarkan Surat Pesanan tersebut diatas selanjutnya dapat diadakan Serah Terima atas seluruh pekerjaan {{ $bast->sp->nama_paket ?? '-' }} Tahun anggaran {{ date('Y') }}.
    </li>
</ol>
<p>Demikian Berita Acara ini dibuat dan ditanda tangani di Banjarbaru pada tanggal tersebut di atas, dalam rangkap 3 (Tiga) untuk dipergunakan seperlunya.</p>
 <p style="margin-top: 20px;"></p>

    </div>

    <div class="footer">
    <div class="signature">
            <div>PIHAK PERTAMA</div>
            <div>PEJABAT PEMBUAT KOMITMEN</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_ppk_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_ppk_53 ?? '-' }}</div>
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

    <div style="page-break-before: always;"></div>
   

    <div class="info-item">
        <span class="info-label">Lampiran</span>
        <span class="info-value">: Berita Acara Pemeriksaan Hasil Pekerjaan</span>
    </div>
 
    <div class="info-item">
        <span class="info-label">Nomor</span>
        <span class="info-value">: {{ $bast->nomor_bap ?? '-' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Tanggal</span>
        <span class="info-value">: {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d-m-Y') }}</span>
    </div>

    <p style="margin-bottom: 20px;"></p>
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
<p style="margin-top: 20px;"></p>
        <div class="footer">
        
        <div class="signature">
            <div>PIHAK PERTAMA</div>
            <div>PEJABAT PEMBUAT KOMITMEN</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_ppk_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_ppk_53 ?? '-' }}</div>
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