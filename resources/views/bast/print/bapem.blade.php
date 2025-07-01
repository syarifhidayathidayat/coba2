<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Berita Acara Pembayaran {{ $bast->sp->penyedia->nama_penyedia ?? '-' }} No.SP {{ $bast->sp->nomor_sp }}
    </title>
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

        .clear {
            clear: both;
        }

        .info-item {
            /* margin: 5px 0; */
        }

        .info-label {
            display: inline-block;
            width: 150px;
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
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat"
            style="width:120%;max-width:1200px;margin-bottom:0px;">
        <h3>BERITA ACARA PEMBAYARAN</h3>
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
                    <span class="info-value">: {{ $bast->nomor_bapem }}</span>
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
            $tgl = trim(terbilang((int) $tanggal->format('d')));
            $bulan = strtolower($tanggal->locale('id')->isoFormat('MMMM'));
            $tahun = trim(terbilang((int) $tanggal->format('Y')));
        @endphp
        <p>Pada hari ini {{ $hari }} tanggal {{ $tgl }} bulan {{ $bulan }} tahun
            {{ $tahun }}, kami yang bertanda tangan di bawah ini:</p>
        <ol style="padding-left: 20px;">
            <li>@php
                $jenisAkun = $bast->sp->paketPekerjaan->jenis_akun ?? 'ppk tidak ditemukan'; // default 53 jika tidak ditemukan
            @endphp
                <div class="info-item">
                    @php
                        $jenisAkun = $bast->sp->paketPekerjaan->jenis_akun ?? 'ppk tidak ditemukan';
                    @endphp
                    <span class="info-label">Namas</span>
                    <span class="info-value">:
                        {{ $jenisAkun == '52' ? $institusi->nama_ppk_52 ?? '-' : $institusi->nama_ppk_53 ?? '-' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Jabatan</span>
                    <span class="info-value">: Pejabat Pembuat Komitmen</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Alamat</span>
                    <span class="info-value2">: {{ $institusi->alamat ?? '-' }}</span>
                </div>
                <div style="margin-bottom: 12px;">Berdasarkan Keputusan Direktur
                    {{ $institusi->nama_institusi ?? '-' }} {{ $institusi->dipa ?? '-' }}, dalam hal ini bertindak
                    untuk dan atas nama pemerintah RI.
                    Selanjutnya disebut sebagai <strong>PIHAK PERTAMA</strong></div>
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
                <div style="margin-bottom: 12px;">Dalam hal ini bertindak untuk dan atas nama
                    {{ $bast->sp->penyedia->nama_penyedia ?? '-' }} Selanjutnya disebut sebagai <strong>PIHAK
                        KEDUA</strong></div>
            </li>
        </ol>
        <p>Berdasarkan :</p>
        <ol style="padding-left: 20px;">
            <li>
                <div class="info-item"><span class="info-label">Nomor dan tanggal DIPA</span><span class="info-value">:
                        {{ $institusi->dipa ?? '-' }}</span></div>
            </li>
            <li>
                <div class="info-item"><span class="info-label">Nomor dan tanggal SP</span><span class="info-value">:
                        {{ $bast->sp->nomor_sp }} tanggal {{ $bast->sp->tanggal }}</span></div>
            </li>
            <li>
                <div class="info-item"><span class="info-label">Addendum SP</span><span class="info-value">: Kementerian
                        Kesehatan R.I.</span></div>
            </li>
            <li>
                <div>Prestasi Pekerjaan Pengadaan {{ $bast->sp->nama_paket ?? '-' }} Tahun Anggaran
                    {{ date('Y') }} telah mencapai 100% yang dibuktikan dengan Berita Acara Pemeriksaan Hasil
                    Pekerjaan No : {{ $bast->nomor_bap ?? '-' }} tanggal
                    {{ \Carbon\Carbon::parse($bast->tanggal_bap)->format('d-m-Y') }}</div>
            </li>
        </ol>
        <p>Sesuai Surat Perjanjian tersebut di atas, maka PIHAK KEDUA berhak menerima pembayaran sebesar <strong> Rp
                {{ number_format($bast->sp->total_kontrak, 0, ',', '.') }} </strong> dari PIHAK PERTAMA</p>
        <p>PIHAK KEDUA sepakat atas jumlah pembayaran tersebut, dan dibayarkan pada rekening
            <strong>Bank {{ $bast->sp->penyedia->cabang_bank ?? '-' }} </strong>Nomor Rekening
            <strong>{{ $bast->sp->penyedia->rekening_bank ?? '-' }}</strong> an.
            <strong>{{ $bast->sp->penyedia->rekening_atas_nama ?? '-' }}</strong>. Demikian Berita Acara
            Pembayaran ini dibuat dengan sebenarnya dan ditandatangani oleh kedua belah pihak pada hari dan tanggal
            tersebut di atas untuk dapat dipergunakan sebagaimana mestinya.
        </p>
        <p style="margin-top: 20px;"></p>
    </div>
    <div class="footer">
        <div class="signature">
            <div>Yang menerima</div>
            <div>PIHAK KEDUA</div>
            <div>{{ $bast->sp->penyedia->nama_penyedia }}</div>
            <br><br><br><br>
            <div><strong>{{ $bast->sp->penyedia->nama_direktur_penyedia ?? '-' }}</strong> </div>
            <div>Direktur</div>
        </div>
        <div class="signature">
            @php
                $jenisAkun = $bast->sp->paketPekerjaan->jenis_akun ?? 'ppk tidak ditemukan';
            @endphp
            <div>Yang menyerahkan</div>
            <div>PIHAK PERTAMA</div>
            <div>PEJABAT PEMBUAT KOMITMEN</div>
            <br><br><br><br>
            <div>
                <strong>{{ $jenisAkun == '52' ? $institusi->nama_ppk_52 ?? '-' : $institusi->nama_ppk_53 ?? '-' }}</strong>
            </div>
            <div>NIP. {{ $jenisAkun == '52' ? $institusi->nip_ppk_52 ?? '-' : $institusi->nip_ppk_53 ?? '-' }}</div>
        </div>
        <div class="clear"></div>
    </div>
</body>

</html>
