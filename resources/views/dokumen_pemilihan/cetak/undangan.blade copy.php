<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Undangan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            margin: 30px;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 2rem;
        }
        .ttd {
            margin-top: 60px;
            width: 300px;
            float: right;
            text-align: center;
        }
        .underline {
            text-decoration: underline;
        }
        table {
            width: 100%;
            margin-top: 1rem;
        }
        th, td {
            vertical-align: top;
            padding: 4px 8px;
        }
    </style>
</head>
<body>

    <div class="text-center">
        <h3 class="underline">UNDANGAN</h3>
        <p>Nomor: {{ $dokumen->undangan_nomor }}</p>
    </div>

    <p>Kepada Yth.</p>
    <p>{{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}</p>
    <p>Di Tempat</p>

    <p class="mt-4">
        Sehubungan dengan pelaksanaan kegiatan <strong>{{ $dokumen->uraian_paket ?? '[Uraian Paket]' }}</strong>, kami mengundang saudara untuk mengikuti proses Pengadaan Langsung dengan ketentuan sebagai berikut:
    </p>

    <table border="0">
        <tr>
            <td width="30%">Tanggal Undangan</td>
            <td>: {{ \Carbon\Carbon::parse($dokumen->undangan_tanggal)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>HPS</td>
            <td>: Rp {{ number_format($dokumen->hps, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Pemasukan Penawaran</td>
            <td>: {{ \Carbon\Carbon::parse($dokumen->undangan_pemasukan_tgl_mulai)->translatedFormat('d F Y') }} s.d {{ \Carbon\Carbon::parse($dokumen->undangan_pemasukan_tgl_selesai)->translatedFormat('d F Y') }} pukul {{ $dokumen->undangan_pemasukan_jam }} WITA</td>
        </tr>
        <tr>
            <td>Evaluasi dan Klarifikasi</td>
            <td>: {{ \Carbon\Carbon::parse($dokumen->undangan_evaluasi_tgl_mulai)->translatedFormat('d F Y') }} s.d {{ \Carbon\Carbon::parse($dokumen->undangan_evaluasi_tgl_selesai)->translatedFormat('d F Y') }} pukul {{ $dokumen->undangan_evaluasi_jam }} WITA</td>
        </tr>
        <tr>
            <td>Penandatanganan SPK</td>
            <td>: {{ $dokumen->undangan_spk_hari }}, {{ \Carbon\Carbon::parse($dokumen->undangan_spk_tanggal)->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <p class="mt-4">
        Demikian undangan ini kami sampaikan. Atas perhatian dan kerja sama Saudara, kami ucapkan terima kasih.
    </p>

    <div class="ttd">
        <p>Banjarmasin, {{ \Carbon\Carbon::parse($dokumen->undangan_tanggal)->translatedFormat('d F Y') }}</p>
        <p>Pejabat Pengadaan</p>
        <br><br><br>
        <p><strong><u>[Nama Pejabat]</u></strong></p>
        <p>NIP. [NIP Pejabat]</p>
    </div>

</body>
</html>
