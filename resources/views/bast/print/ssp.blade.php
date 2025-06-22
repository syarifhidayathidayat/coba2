<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Header SSP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 40px;
        }

        .header-ssp {
            display: table;
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
            border-bottom: none;
        }

        .header-cell {
            display: table-cell;
            border-right: 1px solid #000;
            padding: 10px;
            vertical-align: middle;
            height: 90px;
        }

        .header-cell:last-child {
            border-right: none;
        }

        .logo-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logo-box img {
            width: 40px;
        }

        .logo-text {
            font-size: 11px;
            line-height: 1.2;
            text-align: left;
            font-weight: bold;
        }

        .title {
            text-align: center;
        }

        .ssp {
            font-weight: bold;
            font-size: 22px;
            margin-top: 4px;
        }

        .lembar {
            text-align: center;
            font-size: 12px;
        }

        .box-number {
            border: 2px solid #000;
            font-size: 18px;
            font-weight: bold;
            width: 30px;
            height: 30px;
            line-height: 30px;
            margin: 4px auto;
        }

        .identitas-box {
            border: 1px solid #000000;
            border-bottom: 0px;
            padding: 10px;
            font-size: 13px;
        }

        .identitas-box .label {
            width: 70px;
            display: inline-block;
            font-weight: bold;
        }

        .npwp-row {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .npwp-boxes {
            display: flex;
            gap: 2px;
            margin-left: 5px;
        }

        .npwp-boxes div {
            border: 1px solid #000000;
            width: 20px;
            height: 28px;
            text-align: center;
            line-height: 28px;
            font-weight: bold;
        }

        .npwp-note {
            font-size: 11px;
            font-style: italic;
            /* margin-left: 72px; */
            margin-bottom: 8px;
        }

        .identitas-line {
            margin-bottom: 5px;
        }

        .identitas-line .label {
            vertical-align: top;
        }

        .kode-pembayaran {
            display: table;
            width: 100%;
            border: 1px solid #000000;
            border-bottom: 0px;
            border-collapse: collapse;
            font-size: 13px;
        }

        .kode-cell {
            display: table-cell;
            border-right: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        .kode-cell:last-child {
            border-right: none;
        }

        .label-bold {
            font-weight: bold;
            margin-bottom: 4px;
            display: block;
        }

        .kode-boxes {
            display: flex;
            gap: 2px;
            margin-top: 5px;
        }

        .kode-boxes div {
            border: 1px solid #000;
            width: 20px;
            height: 28px;
            text-align: center;
            line-height: 28px;
            font-weight: bold;
        }

        .uraian {
            padding-top: 4px;
            font-size: 13px;
        }

        .masa-tahun {
            display: table;
            width: 100%;
            border: 1px solid #000;
            border-bottom: 0px;
            border-collapse: collapse;
            font-size: 13px;
            /* margin-top: 10px; */
        }

        .masa-cell {
            display: table-cell;
            vertical-align: top;
            border-right: 1px solid #000;
            padding: 0;
        }

        .masa-cell:last-child {
            border-right: none;
        }

        .masa-title {
            text-align: center;
            font-weight: bold;
            padding: 6px 0;
            border-bottom: 1px solid #000;
        }

        .bulan-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            text-align: center;
            border-bottom: 1px solid #000;
        }

        .bulan-grid div {
            border-right: 1px solid #000;
            padding: 8px 0;
            font-weight: bold;
        }

        .bulan-grid div:last-child {
            border-right: none;
        }

        .masa-note {
            font-size: 11px;
            font-style: italic;
            text-align: center;
            padding: 4px 0;
        }

        .tahun-box {
            text-align: center;
            padding: 6px;
        }

        .tahun-boxes {
            display: flex;
            justify-content: center;
            gap: 2px;
            margin: 6px 0;
        }

        .tahun-boxes div {
            border: 1px solid #000;
            width: 25px;
            height: 30px;
            line-height: 30px;
            font-weight: bold;
        }

        .tahun-note {
            font-size: 11px;
            font-style: italic;
            text-align: center;
        }

        .nomor-ketetapan {
            border: 1px solid #000;
            border-bottom: 0px;
            padding: 10px;
            font-size: 13px;
        }

        .nomor-row {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .nomor-label {
            font-weight: bold;
            width: 110px;
        }

        .nomor-boxes {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
            margin-left: 10px;
        }

        .nomor-box {
            border: 1px solid #000;
            width: 24px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
        }

        .slash {
            font-weight: bold;
            font-size: 20px;
            line-height: 30px;
            margin: 0 4px;
        }

        .nomor-note {
            font-size: 11px;
            font-style: italic;
            /* margin-left: 110px; */
        }

        .jumlah-terbilang {
            display: table;
            width: 100%;
            border: 1px solid #000;
            border-bottom: 0px;
            border-collapse: collapse;
            font-size: 13px;
        }

        .jt-cell {
            display: table-cell;
            vertical-align: top;
            border-right: 1px solid #000;
            padding: 10px;
        }

        .jt-cell:last-child {
            border-right: none;
        }

        .label-bold {
            font-weight: bold;
            font-size: 14px;
        }

        .label-italic {
            font-size: 11px;
            font-style: italic;
            margin-bottom: 6px;
        }

        .nominal {
            font-size: 16px;
            font-weight: bold;
            margin-top: 8px;
        }

        .terbilang span {
            font-weight: bold;
        }

        .terbilang-text {
            margin-top: 4px;
            line-height: 1.4;
        }

        .ttd-blok {
            display: table;
            width: 100%;
            border: 1px solid #000;
            border-bottom: 0px;
            border-collapse: collapse;
            font-size: 13px;
        }

        .ttd-cell {
            display: table-cell;
            vertical-align: top;
            border-right: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        .ttd-cell:last-child {
            border-right: none;
        }

        .ttd-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .ttd-note {
            font-size: 11px;
            font-style: italic;
            margin-bottom: 40px;
        }

        .ttd-nama {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        .ttd-nama span {
            font-weight: normal;
            margin-left: 5px;
        }

        .footer-box {
            border: 1px solid #000;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        .footer-box .quote {
            font-style: italic;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .footer-box .validation {
            font-weight: bold;
            font-size: 15px;
        }

        .footer-note {
            font-size: 12px;
            font-style: italic;
            margin-top: 8px;
        }

        .footer-code {
            font-size: 16px;
            font-family: 'Courier New', monospace;
            margin-top: 4px;
        }

        @media print {
            body {
                margin: 20px;
                padding: 20px;
            }

            @page {
                size: A4;
                margin: 20mm;
            }

            .header-ssp,
            .ssp-section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>



<div class="header-ssp">
    <div class="header-cell" style="width: 33%;">
        <div class="logo-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYfQToSwuedPqeYHXXmZe9kYxoiVbPPZEvvNurpktIu4YyvE_uTyiIXt8iMX1AEhMHMVU&usqp=CAU"
                alt="Logo">
            <div class="logo-text">
                KEMENTERIAN KEUANGAN R.I.<br>
                DIREKTORAT JENDERAL PAJAK
            </div>
        </div>
    </div>

    <div class="header-cell title" style="width: 33%;">
        <div>SURAT SETORAN PAJAK</div>
        <div class="ssp">(SSP)</div>
    </div>

    <div class="header-cell lembar" style="width: 33%;">
        <div>LEMBAR</div>
        <div class="box-number">1</div>
        <div>Untuk Arsip Wajib Pajak</div>
    </div>
</div>
{{-- {{ $bast->sp->penyedia->npwp ?? '-' }} --}}
<div class="identitas-box">
    @php
        $npwp = preg_replace('/[^0-9]/', '', $bast->sp->penyedia->npwp ?? '');
    @endphp

    <div class="npwp-row">
        <span class="label">NPWP</span>:
        <div class="npwp-boxes">
            @for ($i = 0; $i < 15; $i++)
                <div>{{ $npwp[$i] ?? '' }}</div>
            @endfor
        </div>
    </div>

    <div class="npwp-note">Diisi sesuai dengan Nomor Pokok Wajib Pajak yang dimiliki</div>

    <div class="identitas-line">
        <span class="label">NAMA WP</span>: {{ $bast->sp->penyedia->nama_penyedia }}
    </div>

    <div class="identitas-line">
        <span class="label">ALAMAT</span>: {{ $bast->sp->penyedia->alamat }}
    </div>
</div>


<div class="kode-pembayaran">
    <div class="kode-cell" style="width: 25%;">
        <span class="label-bold">Kode Akun Pajak</span>
        <div class="kode-boxes">
            <div>4</div>
            <div>1</div>
            <div>1</div>
            <div>2</div>
            <div>1</div>
            <div>1</div>
        </div>
    </div>

    <div class="kode-cell" style="width: 25%;">
        <span class="label-bold">Kode Jenis Setoran</span>
        <div class="kode-boxes">
            <div>9</div>
            <div>1</div>
            <div>0</div>
        </div>
    </div>

    <div class="kode-cell" style="width: 50%;">
        <span class="label-bold">Uraian Pembayaran</span>
        <div class="uraian">PPN {{ $bast->sp->nama_paket }} TA {{ date('Y') }} pada
            {{ $institusi->nama_institusi ?? '-' }}

        </div>
    </div>
</div>
</div>

<div class="masa-tahun">
    <!-- MASA PAJAK -->
    <div class="masa-cell" style="width: 75%;">
        <div class="masa-title">Masa Pajak</div>
        <div class="bulan-grid">
            <div>Jan</div>
            <div>Peb</div>
            <div>Mar</div>
            <div>Apr</div>
            <div>Mei</div>
            <div>Jun</div>
            <div>Jul</div>
            <div>Ags</div>
            <div>Sep</div>
            <div>Okt</div>
            <div>Nop</div>
            <div>Des</div>
        </div>
        <div class="masa-note">Beri tanda silang pada salah satu kolom bulan untuk masa yang berkenaan</div>
    </div>

    <!-- TAHUN PAJAK -->
    <div class="masa-cell" style="width: 25%;">
        @php
            $tahun = str_split(\Carbon\Carbon::parse($bast->sp->tanggal)->format('Y'));
        @endphp

        <div class="masa-title">Tahun Pajak</div>
        <div class="tahun-box">
            <div class="tahun-boxes">
                @foreach ($tahun as $digit)
                    <div>{{ $digit }}</div>
                @endforeach
            </div>
            <div class="tahun-note">Diisi tahun terutangnya pajak</div>
        </div>

    </div>
</div>

<div class="nomor-ketetapan">
    <div class="nomor-row">
        <div class="nomor-label">Nomor<br>Ketetapan</div>
        <div>:</div>
        <div class="nomor-boxes">
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <span class="slash">/</span>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <span class="slash">/</span>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
            <span class="slash">/</span>
            <div class="nomor-box"></div>
            <div class="nomor-box"></div>
        </div>
    </div>
    <div class="nomor-note">Diisi sesuai Nomor Ketetapan: STP, SKPKB, SKPKBT</div>


</div>
<div class="jumlah-terbilang">
    <!-- Kolom Jumlah Pembayaran -->
    <div class="jt-cell" style="width: 35%;">
        <div class="label-bold">Jumlah Pembayaran</div>
        <div class="label-italic">Diisi dengan rupiah penuh</div>
        <div class="nominal">Rp {{ number_format($bast->sp->total_kontrak * (100 / 111) * 0.11, 0, ',', '.') }}</div>
    </div>

    <!-- Kolom Terbilang -->
    <div class="jt-cell" style="width: 65%;">
        <div class="terbilang">
            <span>Terbilang</span> :
            <div class="terbilang-text">
                {{ ucwords(\App\Helpers\Terbilang::make($bast->sp->total_kontrak * (100 / 111) * 0.11)) }} Rupiah


            </div>
        </div>
    </div>
</div>

<div class="ttd-blok">
    <!-- Kolom Kiri -->
    <div class="ttd-cell" style="width: 50%;">
        <div class="ttd-title">Diterima oleh Kantor Penerima Pembayaran</div>
        <div class="ttd-title">Tanggal ……………………………………</div>
        <div class="ttd-note">Cap dan tanda tangan</div>
        <div class="ttd-nama">Nama Jelas :
            <span>.................................................................</span>
        </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="ttd-cell" style="width: 50%;">
        <div class="ttd-title">Wajib Pajak/Penyetor</div>
        <div class="ttd-title">
            Banjarbaru, Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ \Carbon\Carbon::parse($bast->sp->tanggal)->translatedFormat('F Y') }}
        </div>
        <div class="ttd-note">Cap dan tanda tangan</div>
        <div class="ttd-nama">Nama Jelas : <span><strong>{{ $institusi->nama_bendahara ?? '-' }}</strong></span></div>
    </div>
</div>

<div class="footer-box">
    <div class="quote">"Terima Kasih telah membayar Pajak-Pajak Untuk Pembangunan Bangsa"</div>
    <div class="validation">Ruang Validasi Kantor Penerima Pembayaran</div>
</div>

<div class="footer-note">Diisi sesuai buku petunjuk pengisian</div>
<div class="footer-code">F.2.0.32.01</div>
</body>

</html>
