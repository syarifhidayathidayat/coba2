<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kwitansi - {{ $bast->no_kwitansi }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .header {
            margin-bottom: 30px;
        }
        .header p {
            margin: 5px 0;
        }
        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }
        .content {
            margin-bottom: 30px;
        }
        .content p {
            margin: 8px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
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
        .terbilang {
            font-style: italic;
            margin: 10px 0;
        }
        .info-item {
            margin: 5px 0;
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
            margin: 20px 0;
            padding: 10px;
            border: 1px solid red;
            background-color: #fff0f0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="info-item">
            <span class="info-label">TA</span>
            <span class="info-value">: {{ date('Y') }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">No Bukti</span>
            <span class="info-value">: {{ $bast->no_kwitansi }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Mata Anggaran</span>
            <span class="info-value">: {{ $bast->sp->akun ?? '-' }}</span>
        </div>
    </div>

    <div class="title">
        KUITANSI
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
                <span class="info-value">: {{ ucwords(\App\Helpers\Terbilang::make($bast->sp->total_kontrak )) }} Rupiah</span>
            </div>
            <div class="info-item">
                <span class="info-label">Untuk Pembayaran</span>
                <span class="info-value">: {{ $bast->sp->nama_paket }} Tahun anggaran {{ date('Y') }}, Sesuai Surat Perjanjian No {{ $bast->sp->nomor_sp }}, Tanggal {{ \Carbon\Carbon::parse($bast->sp->tanggal)->format('d-m-Y') }}</span>
            </div>

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

    <div class="footer">
        <div class="signature">
            <p>a.n Kuasa Pengguna Anggaran </p>
            <p>Pejabat Pembuat Komitmen</p>
            <br><br><br>
            <p>( [Nama Pembayar] )</p>
           
            
        </div>
        <div class="signature">
            <br><br>
            <p> {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}</p>
            <br><br><br>
            <p> <b>{{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }} </b> </p>
            <p> Direktur</p>
        </div>
        
        <div class="clear"></div>
    </div>
</body>
</html> 