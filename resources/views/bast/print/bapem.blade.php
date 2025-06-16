<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Berita Acara Pembayaran - {{ $bast->sp->penyedia->nama_penyedia }} No.SP {{ $bast->sp->nomor_sp }}</title>
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
        .document-numbers {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #000;
        }
        .document-numbers p {
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
        <h2>BERITA ACARA PEMBAYARAN</h2>
        <p>Nomor: {{ $bast->nomor_bapem }}</p>
    </div>

    <div class="document-numbers">
        <p><strong>Nomor BAST:</strong> {{ $bast->nomor_bast }}</p>
        <p><strong>Nomor BAP:</strong> {{ $bast->nomor_bap }}</p>
        @if($bast->nomor_ssp)
        <p><strong>Nomor SSP:</strong> {{ $bast->nomor_ssp }}</p>
        @endif
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        <ol>
            <li>Nama: {{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}<br>
                Jabatan: Direktur {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}<br>
                Dalam hal ini bertindak untuk dan atas nama {{ $bast->sp->penyedia->nama_penyedia ?? '-' }}<br>
                Selanjutnya disebut sebagai "PIHAK PERTAMA"</li>
            <li>Nama: [Nama Bendahara]<br>
                Jabatan: [Jabatan Bendahara]<br>
                Dalam hal ini bertindak untuk dan atas nama [Nama Instansi]<br>
                Selanjutnya disebut sebagai "PIHAK KEDUA"</li>
        </ol>

        <p>Pada hari ini {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('dddd') }} tanggal {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('d') }} bulan {{ \Carbon\Carbon::parse($bast->tanggal_bast)->locale('id')->isoFormat('MMMM') }} tahun {{ \Carbon\Carbon::parse($bast->tanggal_bast)->format('Y') }}, telah dilakukan pembayaran dengan ketentuan sebagai berikut:</p>
        <pre>
   SP: {{ json_encode($bast->sp) }}
   </pre>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if($bast->sp && $bast->sp->total_kontrak)
                <tr>
                    <td>1</td>
                    <td>Total Kontrak</td>
                    <td>Rp {{ number_format($bast->sp->total_kontrak, 0, ',', '.') }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>PPN (11%)</td>
                    <td>Rp {{ number_format($bast->sp->total_kontrak * 0.11, 0, ',', '.') }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>PPh Pasal 22 (1.5%)</td>
                    <td>Rp {{ number_format($bast->sp->total_kontrak * 0.015, 0, ',', '.') }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Total Pembayaran</td>
                    <td>Rp {{ number_format($bast->sp->total_kontrak - ($bast->sp->total_kontrak * 0.015), 0, ',', '.') }}</td>
                    <td></td>
                </tr>
                @else
                <tr>
                    <td colspan="4" class="text-center">Data total kontrak tidak tersedia</td>
                </tr>
                @endif
            </tbody>
        </table>

        <p>Pembayaran dilakukan melalui:</p>
        <p>Bank: {{ $bast->sp->penyedia->rekening_bank ?? '-' }}<br>
        Cabang: {{ $bast->sp->penyedia->cabang_bank ?? '-' }}<br>
        No. Rekening: {{ $bast->sp->penyedia->rekening_atas_nama ?? '-' }}</p>

        <p>Demikian Berita Acara Pembayaran ini dibuat dengan sebenarnya dan ditandatangani oleh kedua belah pihak.</p>
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
            <p>( [Nama Bendahara] )</p>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html> 