<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Undangan</title>
    <style>
        @page {
            size: A4;
            margin: 30mm 20mm 30mm 30mm;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 13px;
            text-align: justify;
        }

        .kop img {
            width: 100%;
            max-width: 100%;
        }

        .center {
            text-align: center;
        }

        .mt-3 { margin-top: 1rem; }
        .mb-3 { margin-bottom: 1rem; }

        .table-kegiatan {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .table-kegiatan th,
        .table-kegiatan td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        .signature {
            margin-top: 3rem;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="kop">
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat">
    </div>

    <p><strong>UNDANGAN</strong></p>
    <p>
        Nomor : {{ $dokumen->undangan_nomor ?? 'ULP/Pejabat Pengadaan/xxxx/2025' }}<br>
        Lampiran : 1 (satu) berkas<br>
        Banjarbaru, {{ \Carbon\Carbon::parse($dokumen->undangan_tanggal)->translatedFormat('d F Y') }}
    </p>

    <p>Kepada Yth.<br>
    {{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}<br>
    Di Tempat</p>

    <p><strong>Perihal: Pengadaan Langsung untuk paket pekerjaan {{ $dokumen->uraian_paket ?? '[Uraian Paket]' }}</strong></p>

    <p>
        Dengan ini Saudara kami undang untuk mengikuti proses Pengadaan Langsung paket pekerjaan sebagai berikut:
    </p>

    <ol>
        <li>
            <strong>Paket Pekerjaan</strong><br>
            Nama Paket: {{ $dokumen->uraian_paket ?? '-' }}<br>
            Lingkup: -<br>
            Nilai total HPS: Rp {{ number_format($dokumen->hps, 0, ',', '.') }}<br>
            Sumber Dana: DIPA POLTEKKES KEMENKES BANJARMASIN Tahun Anggaran {{ date('Y') }}
        </li>

        <li class="mt-3">
            <strong>Pelaksanaan Pengadaan</strong><br>
            Tempat: Direktorat Poltekkes Kemenkes Banjarmasin, Jl. Mistar Cokrokusumo No.1A Banjarbaru<br>
            Telepon/Fax: (0511) 4780516 / 4772288<br>
            Website: https://poltekkes-banjarmasin.ac.id
        </li>
    </ol>

    <p>Saudara diminta untuk memasukkan penawaran administrasi, teknis dan harga, secara langsung sesuai jadwal pelaksanaan sebagai berikut:</p>

    <table class="table-kegiatan">
        <thead>
            <tr>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Hari/Tanggal</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>a</td>
                <td>Pemasukan Dokumen Penawaran</td>
                <td>{{ $dokumen->undangan_pemasukan_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->undangan_pemasukan_tgl_mulai)->translatedFormat('d F Y') }} -
                    {{ \Carbon\Carbon::parse($dokumen->undangan_pemasukan_tgl_selesai)->translatedFormat('d F Y') }}
                </td>
                <td>{{ $dokumen->undangan_pemasukan_jam ?? '10:00' }}</td>
            </tr>
            <tr>
                <td>b</td>
                <td>Pembukaan Dokumen Penawaran</td>
                <td>{{ $dokumen->ba_pembukaan_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->ba_pembukaan_tanggal)->translatedFormat('d F Y') }}</td>
                <td>10.00 WITA</td>
            </tr>
            <tr>
                <td>c</td>
                <td>Klarifikasi Teknis dan Negosiasi Harga</td>
                <td>{{ $dokumen->ba_klarifikasi_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->ba_klarifikasi_tanggal)->translatedFormat('d F Y') }}</td>
                <td>10.00 WITA</td>
            </tr>
            <tr>
                <td>d</td>
                <td>Penandatanganan SPK</td>
                <td>{{ $dokumen->undangan_spk_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->undangan_spk_tanggal)->translatedFormat('d F Y') }}</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>

    <p>
        Apabila Saudara butuh keterangan dan penjelasan lebih lanjut, dapat menghubungi Pejabat Pengadaan
        sesuai alamat tersebut di atas sampai dengan batas akhir pemasukan Dokumen Penawaran.
    </p>

    <p>Demikian disampaikan untuk diketahui.</p>

    <div class="signature">
        Pejabat Pengadaan<br>
        pada Poltekkes Kemenkes Banjarmasin<br><br><br><br>
        <strong>Syarif Hidayat, S.Kom</strong><br>
        NIP.198604222015031001
    </div>
</body>
</html>
