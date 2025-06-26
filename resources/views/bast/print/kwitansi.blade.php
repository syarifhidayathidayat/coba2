<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kwitansi - {{ $bast->no_kwitansi }}</title>
    <style>
        @page {
            size: 215mm 330mm;
            margin: 20mm 30mm 20mm 30mm;
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

        th,
        td {
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
        .signature2 {
            float: center;
            width: 100%;
            text-align: left;
        }
        .signature3 {
            float: left;
            width: 50%;
            text-align: left;
        }

        .clear {
            clear: both;
        }

        .info-item {
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
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat" style="width:120%;max-width:1200px;margin-bottom:0px;">
        
    </div>
    <div class="info">
        <div class="info-item">
            <span class="info-label2">TA</span>
            <span class="info-value">: {{ date('Y') }}</span>
        </div>
        <div class="info-item">
            <span class="info-label2">No Bukti</span>
            <span class="info-value">: {{ $bast->no_kwitansi }}</span>
        </div>
        <div class="info-item">
            <span class="info-label2">Mata Anggaran</span>
            <span class="info-value">: {{ $bast->sp->akun ?? '-' }}</span>
        </div>
    </div>

    <p style="margin-top: 30px;"></p>
    <div class="title" align="center">
       <h3>KUITANSI</h3>
    </div>

    <div class="content">
        @if($bast->sp)
            <div class="info-item">
                <span class="info-label">Sudah Terima Dari</span>
                <span class="info-value">: Pejabat Pembuat Komitmen Poltekkes Kemenkes Banjarmasin</span>
            </div>
            <div class="info-item">
                <span class="info-label">Jumlah Uang</span>
                <span class="info-value">: Rp {{ number_format($bast->sp->total_kontrak , 0, ',', '.') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Terbilang</span>
                <span class="info-value2">: {{ ucwords(\App\Helpers\Terbilang::make($bast->sp->total_kontrak )) }} Rupiah</span>
            </div>
            <div class="info-item">
                <span class="info-label">Untuk Pembayaran</span>
                <span class="info-value2">: {{ $bast->sp->nama_paket }} Tahun anggaran {{ date('Y') }}, Sesuai Surat Perjanjian No {{ $bast->sp->nomor_sp }}, Tanggal {{ \Carbon\Carbon::parse($bast->sp->tanggal)->format('d-m-Y') }}</span>
            </div>
            <p style="margin-top: 20px;"></p>
            @if($bast->barangs && count($bast->barangs) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Vol</th>
                            <th>Harga Satuan</th>
                            <th>Ongkos Kirim</th>
                            <th>Jumlah Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bast->barangs as $index => $barang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->pivot->jumlah_serah_terima }}</td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($barang->ongkos_kirim, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($barang->total + $barang->ongkos_kirim, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" style="text-align: right;"><strong>Total</strong></td>
                            <td><strong>Rp {{ number_format($bast->sp->total_kontrak, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div class="error-message">
                    Data barang tidak tersedia
                </div>
            @endif

          
        @else
            <div class="error-message">
                Data SP tidak tersedia. Silakan periksa kembali data BAST ini.
            </div>
        @endif
    </div>

    
    <p style="margin-top: 30px;"></p>

    <div class="footer">
        <div class="signature">
            <div>a.n Kuasa Pengguna Anggaran</div>
            <div>PEJABAT PEMBUAT KOMITMEN</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_ppk_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_ppk_53 ?? '-' }}</div>
        </div>
        <div class="signature">
            <div>__________,_____________</div>
            <div>{{ $bast->sp->penyedia->nama_penyedia }}</div>
            <br><br><br><br>
            <div><strong>{{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}</strong> </div>
            <div>Direktur</div>
        </div>
        <div class="clear"></div>
        <div>_________________________________________________________________________________</div>
        <p style="margin-top: 10px;"></p>
        <div class="signature2">
            <div>Pekerjaan tersebut telah di terima/diselesaikan dengan lengkap dan baik</div>
            <div>PEJABAT PENGADAAN</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_pejabat_pengadaan_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_pejabat_pengadaan_53 ?? '-' }}</div>
        </div>
        
    </div>
</body>
</html> 