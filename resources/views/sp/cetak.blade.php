<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tanda Terima Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            background-color: #f0f0f0;
        }
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            width: 45%;
            text-align: center;
        }
        .signature-line {
            margin-top: 60px;
            /* border-top: 1px solid #000; */
            padding-top: 5px;
        }
        .info-item {
            display: flex;
            margin-bottom: 5px;
        }
        .info-label {
            width: 150px;
            flex-shrink: 0;
        }
        .info-value {
            flex-grow: 1;
        }
        .checkbox {
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            display: inline-block;
            margin: 0 5px;
        }
        .checkbox-label {
            display: inline-block;
            margin-right: 15px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>TANDA TERIMA BARANG</h2>
        <p>Nomor Surat Pesanan: {{ $sp->nomor_sp }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        
      
        <div class="info-item">
            <div class="info-label">Nama Penyedia</div>
            <div class="info-value">: {{ $sp->penyedia->nama_penyedia }}</div>
        </div>
        <div class="info-item">
            <div class="info-label">Alamat</div>
            <div class="info-value">: {{ $sp->penyedia->alamat }}</div>
        </div>
        <div class="info-item">
            <div class="info-label"></div>
            <div class="info-value">Selanjutnya disebut sebagai "PENYEDIA"</div>
        </div>

        <p>Dengan ini menyatakan bahwa:</p>
        <p>Penerima barang dan pengirim telah melakukan serah terima barang dengan rincian sebagai berikut:</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Penempatan</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sp->barangs as $index => $barang)
                    @php
                        $penempatan = json_decode($barang->penempatan);
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->qty }}</td>
                        <td>{{ $penempatan ? $penempatan->nama : '-' }}</td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div class="signature">
            <p>
                <br>
            </p>
            <p>Pengirim,</p>
            <div class="signature-line">
                <p>(___________________)</p>
            </div>
        </div>
        <div class="signature">
            <p>Banjarbaru, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p>Penerima Barang,</p>
            <div class="signature-line">
                <p>(___________________)</p>
            </div>
        </div>
    </div>

    <div class="no-print" style="margin-top: 20px;">
        <button onclick="window.print()">Cetak</button>
    </div>
</body>
</html>