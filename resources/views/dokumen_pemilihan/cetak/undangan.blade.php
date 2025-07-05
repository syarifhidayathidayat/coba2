<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Undangan</title>
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

        .no-spacing {
            margin: 0;
            padding: 0;
            line-height: 1;
            /* Optional: Menyamakan tinggi garis */
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
            line-height: 1.25;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-bottom: 10px; */
        }

        th,
        td {
            border: 1px solid #000;
            padding: 2px 5px;
            text-align: left;
        }

        .no-padding {
            padding: 0 !important;
        }

        .no-border {
            border: none !important;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            /* margin-top: 50px; */
        }

        .signature {
            float: left;
            width: 65%;
            text-align: left;
        }

        .clear {
            clear: both;
        }

        .info-item {
            margin: 5px 0;
        }

        .info-label2 {
            display: inline-block;
            width: 100px;
        }

        .info-label {
            display: inline-block;
            width: 170px;
        }

        .info-value {
            display: inline-block;
        }

        .info-value2 {
            /* display: inline-block; */
            text-align: left;
        }

        .no-wrap {
            white-space: nowrap;
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

{{-- <body class="content">
    <div class="header">
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat"
            style="width:110%;max-width:900px;margin-bottom:0px;">
        <h2>Undangan</h2>
    </div>
    <table padding="0" cellspacing="0" class="no-border">
        <tr>
            <td class=no-border style="vertical-align:top; padding-left: 0; ">
                <div class="info-item">
                    <span class="info-label2">Nomor</span>
                    <span class="info-value2">: {{ $dokumen->undangan_nomor ?? 'ULP/Pejabat Pengadaan/xxxx/2025' }}</p>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label2">Lampiran</span>
                    <span class="info-value">: 1 (satu) berkas</span>
                </div>
            </td>
            <td class=no-border style="width:30%; vertical-align:top; ">
                <div class="info-item"align="right">
                    <span class="info-value"> Banjarbaru,
                        {{ \Carbon\Carbon::parse($dokumen->undangan_tanggal)->translatedFormat('d F Y') }}</span>
                </div>
            </td>
        </tr>
    </table>
    <p style="margin-top: 20px;"></p>
    <p>Kepada Yth.<br>
        {{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}<br>
        Di Tempat</p>
    <p style="margin-top: 20px;"></p>
    <p>Perihal : {{ $dokumen->uraian_paket ?? '[Uraian Paket]' }}</p>
    <p>
        Dengan ini Saudara kami undang untuk mengikuti proses Pengadaan Langsung paket pekerjaan sebagai berikut:
    </p>
    <ol style=" padding-left: 15px;">
        <li>
            <div class="info-item">
                <p><strong>Pekerjaan</strong> </p>
                <span class="info-label">Nama Paket</span>
                <span class="info-value">: {{ $dokumen->$institusi }}{{ $dokumen->uraian_paket ?? '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Lingkup Pekerjaan</span>
                <span class="info-value">: {{ $institusi->alamat ?? '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Nilai Total HPS</span>
                <span class="info-value">: {{ $dokumen->hps ?? '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Sumber Pendanaan</span>
                <span class="info-value">: DIPA {{ $institusi->nama_institusi }} {{ $institusi->dipa ?? '-' }}</span>
            </div>
        <li>
            <div class="info-item">
                <p><strong>Pelaksanaan Pengadaan</strong></p>
                <span class="info-label">Tempat</span>
                <span class="info-value2 ">: Direktorat
                    {{ $institusi->nama_institusi ?? '-' }} </span>
            </div>
            <div class="info-item">
                <span class="info-label">Alamat</span>
                <span class="info-value2 ">: {{ $institusi->alamat }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Telepon/Fax</span>
                <span class="info-value">: {{ $institusi->no_telp ?? '' }} | {{ $institusi->fax ?? '' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Website</span>
                <span class="info-value">: https://poltekkes-banjarmasin.ac.id</span>
            </div>
        </li>
    </ol>
    <div> Saudara diminta untuk memasukkan penawaran administrasi, teknis dan harga, secara langsung sesuai dengan
        jadwal pelaksanaan sebagai berikut: </div>
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
            <tr class="no-padding">
                <td>a.</td>
                <td>Pemasukan Dokumen Penawaran</td>
                <td>{{ $dokumen->undangan_pemasukan_hari ?? '' }}
                    {{ \Carbon\Carbon::parse($dokumen->undangan_pemasukan_tgl_mulai)->translatedFormat('d F Y') }} -
                    {{ \Carbon\Carbon::parse($dokumen->undangan_pemasukan_tgl_selesai)->translatedFormat('d F Y') }}
                </td>
                <td>
                    {{ $dokumen->undangan_pemasukan_jam ? \Carbon\Carbon::parse($dokumen->undangan_pemasukan_jam)->format('H:i') . ' WITA' : '' }}
                </td>
            </tr>
            <tr>
                <td>b.</td>
                <td>Pembukaan Dokumen Penawaran</td>
                <td>{{ $dokumen->ba_klarifikasi_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->ba_pembukaan_tanggal)->translatedFormat('d F Y') }}</td>
                <td>10.00 WITA</td>
            </tr>
            <tr>
                <td>c.</td>
                <td>Klarifikasi Teknis dan Negosiasi Harga</td>
                <td>{{ $dokumen->ba_klarifikasi_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->ba_klarifikasi_tanggal)->translatedFormat('d F Y') }}</td>
                <td>10.00 WITA</td>
            </tr>
            <tr>
                <td>d.</td>
                <td>Penandatanganan SPK</td>
                <td>{{ $dokumen->undangan_spk_hari ?? '-' }} /
                    {{ \Carbon\Carbon::parse($dokumen->undangan_spk_tanggal)->translatedFormat('d F Y') }}</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
    <p>Apabila Saudara butuh keterangan dan penjelasan lebih lanjut, dapat menghubungi PejabatPengadaan sesuai alamat
        tersebut di atas sampai dengan batas akhir pemasukan Dokumen Penawaran..</p>
    <p style="padding-top: 20px"></p>
    <div class="footer">
        <div class="signature">
            <div>Demikian disampaikan untuk diketahui.</div>
            <div>Pejabat Pengadaan pada {{ $institusi->nama_institusi }}</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_pejabat_pengadaan_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_pejabat_pengadaan_53 ?? '-' }}</div>
        </div>
        <div class="clear"></div>
    </div>
</body>

<body class="content">
    <div class="header">
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat"
            style="width:110%;max-width:900px;margin-bottom:0px;">
        <h3 class="no-spacing">BERITA ACARA PEMBUKAAN PENAWARAN</h3>
        <div class="no-spacing">Nomor : {{ $dokumen->ba_pembukaan_nomor ?? '' }}</div>
    </div>
    @php
        $tanggal = \Carbon\Carbon::parse($dokumen->ba_pembukaan_tanggal);
        $hari = $tanggal->locale('id')->isoFormat('dddd');
        $tgl = trim(terbilang((int) $tanggal->format('d')));
        $bulan = strtolower($tanggal->locale('id')->isoFormat('MMMM'));
        $tahun = trim(terbilang((int) $tanggal->format('Y')));
    @endphp
    <p>Pada hari {{ $hari }} tanggal {{ $tgl }}
        bulan
        {{ $bulan }} tahun {{ $tahun }} pukul
        {{ $dokumen->undangan_pemasukan_jam ?? '' }} WITA, kami yang bertanda tangan di bawah ini adalah Pejabat
        Pengadaan
        Barang/Jasa, yang dibentuk dalam Surat Keputusan Kuasa Direktur {{ $institusi->nama_institusi ?? '' }} tanggal
        {{ $institusi->tanggal_sk_pejabat }}, melaksanakan pembukaan penawaran untuk pelaksanaan pekerjaan
        {{ $dokumen->uraian_paket ?? '' }} TA
        {{ $paket_pekerjaan->tahun_anggaran ?? 'xxxx' }}, di biayai dari dana DIPA Tahun Anggaran
        {{ $paket_pekerjaan->tahun_anggaran ?? 'xxxx' }} Nomor SP {{ $institusi->dipa ?? '' }} dengan Harga Perkiraan
        Sendiri (HPS) sebesar Rp.
        {{ $dokumen->hps ?? '' }} ({{ ucwords(\App\Helpers\Terbilang::make($dokumen->hps)) }} Rupiah) dengan hasil
        Pembukaan Penawaran sebagai berikut :</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NAMA PERUSAHAAN</th>
                <th>SURAT PENAWARAN</th>
                <th>DOKUMEN TEKNIS</th>
                <th>PERSYARATAN LAIN YANG DIMINTA</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <tr class="no-padding">
                <td>1</td>
                <td>{{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}</td>
                <td>{{ $dokumen->ba_pembukaan_surat_penawaran == 1 ? 'Ada' : 'Tidak Ada' }}</td>
                <td>{{ $dokumen->ba_pembukaan_dok_teknis == 1 ? 'Ada' : 'Tidak Ada' }}</td>
                <td>{{ $dokumen->ba_pembukaan_lain == 1 ? 'Ada' : 'Tidak Ada' }}</td>
                <td>{{ $dokumen->ba_pembukaan_keterangan ?? '-' }}</td>
            </tr>
        </tbody>
    </table>
    <p>Demikian Berita Acara ini di buat untuk di pergunakan sebagai bahan pertimbangan dalam pelaksanaan pengadaan
        langsung.</p>
    <p style="margin-top: 20px"></p>
    <div class="footer">
        <div class="signature">
            <div>Pejabat Pengadaan <br> {{ $institusi->nama_institusi }}</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_pejabat_pengadaan_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_pejabat_pengadaan_53 ?? '-' }}</div>
        </div>
        <div class="clear"></div>
    </div>
</body>

<body class="content">
    <div class="header">
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat"
            style="width:110%;max-width:900px;margin-bottom:0px;">
        <h3 class="no-spacing">BERITA ACARA KLARIFIKASI DAN NEGOSIASI</h3>
        <div class="no-spacing">Nomor : {{ $dokumen->ba_klarifikasi_nomor ?? '' }}</div>
    </div>
    @php
        $tanggal = \Carbon\Carbon::parse($dokumen->ba_klarifikasi_tanggal);
        $hari = $tanggal->locale('id')->isoFormat('dddd');
        $tgl = trim(terbilang((int) $tanggal->format('d')));
        $bulan = strtolower($tanggal->locale('id')->isoFormat('MMMM'));
        $tahun = trim(terbilang((int) $tanggal->format('Y')));
    @endphp
    <p>Pada hari {{ $hari }} tanggal {{ $tgl }}
        bulan
        {{ $bulan }} tahun {{ $tahun }} pukul
        {{ $dokumen->undangan_pemasukan_jam ?? '' }} WITA, kami yang bertanda tangan di bawah ini adalah Pejabat
        Pengadaan
        Barang/Jasa, yang dibentuk dalam Surat Keputusan Kuasa Direktur {{ $institusi->nama_institusi ?? '' }} tanggal
        {{ $institusi->tanggal_sk_pejabat }} No {{ $institusi->no_sk_pejabat ?? '' }}, melaksanakan pembukaan
        penawaran
        untuk pelaksanaan pekerjaan {{ $dokumen->uraian_paket ?? '' }} TA
        XXXX , di biayai dari dana DIPA Tahun Anggaran
        XXXX Nomor SP DIPA {{ $institusi->dipa ?? '' }} tanggal {{ $institusi->tanggal_sp_dipa ?? ''}} dengan Harga Perkiraan
        Sendiri
        (HPS) sebesar Rp.
        {{ $dokumen->hps ?? 'XXXX' }} ({{ ucwords(\App\Helpers\Terbilang::make($dokumen->hps)) }} Rupiah) dengan
        hasil Pembukaan Penawaran sebagai berikut :</p>
    <p>Melakukan klarifikasi dan negosiasi terhadap penawaran yang diajukan oleh : {{ $dokumen->sp?->penyedia?->nama_penyedia ?? '' }} dengan hasil
        seperti terdapat dalam lampiran.</p>
    <p>Dari hasil klarifikasi dan negosiasi harga, ditetapkan sebagai penyedia yaitu :</p>
    <div class="info-item">
        <span class="info-label">Nama Perusahaan</span>
        <span class="info-value">: {{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Nama Penanggungjawab</span>
        <span class="info-value">: {{ $dokumen->sp?->penyedia?->nama_direktur_penyedia ?? '[Nama Penyedia]' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Alamat Perusahaan</span>
        <span class="info-value2">: {{ $dokumen->sp?->penyedia?->alamat ?? '[Nama Penyedia]' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Nomor Pokok Wajib Pajak</span>
        <span class="info-value2">: {{ $dokumen->sp?->penyedia?->npwp ?? '[Nama Penyedia]' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Pekerjaan</span>
        <span class="info-value2">: {{ $dokumen->uraian_paket ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Harga penawaran</span>
        <span class="info-value2">: {{ $dokumen->ba_klarifikasi_harga_penawaran ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label">Harga negosiasi</span>
        <span class="info-value2">: {{ $dokumen->ba_klarifikasi_harga_negosiasi ?? '' }}</span>
    </div>
    <div>Demikian pertimbangan bahwa spesifikasi teknis sesuai dengan ketentuan dan harga dapat dipertanggungjawabkan.
    </div>
    <p>Demikian Berita Acara ini di buat untuk di pergunakan sebagai bahan pertimbangan dalam pelaksanaan pengadaan
        langsung.</p>
    <p style="padding-top: 20px"></p>
    <div class="footer">
        <div class="signature">
            <div>{{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}</div>
            <br><br><br><br>
            <div><strong>{{ $dokumen->sp?->penyedia?->nama_direktur_penyedia ?? '[Nama Penyedia]' }}</strong> </div>
            <div>Direktur</div>
        </div>
        <div class="signature">
            <div>Pejabat Pengadaan Barang/Jasa</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_pejabat_pengadaan_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_pejabat_pengadaan_53 ?? '-' }}</div>
        </div>
        <div class="clear"></div>
    </div>
</body> --}}

<body class="content">
    <div class="header">
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat"
            style="width:110%;max-width:900px;margin-bottom:0px;">
        <h3 class="no-spacing">BERITA ACARA HASIL PENGADAAN LANGSUNG</h3>
    </div>
    <p style="padding-top: 5px"></p>
    <table padding="0" cellspacing="0" class="no-border">
        <tr>
            <td style="width:40%; vertical-align:top; padding-left: 15px; ">
                <div class="info-item">
                    <span class="info-label2">Pekerjaan</span>
                    <span class="info-value2">: {{ $dokumen->uraian_paket ?? '' }}</p>
                    </span>
                </div>
            </td>
            <td style="width:60%; vertical-align:top; ">
                <div class="info-item">
                    <span class="info-label2"> Nomor </span>
                    <span class="info-value2">: {{ $dokumen->ba_hasil_nomor ?? '' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label2">Tanggal</span>
                    <span class="info-value2">: {{ $dokumen->ba_hasil_tanggal }}</span>
                </div>
            </td>
        </tr>
    </table>
    @php
        $tanggal = \Carbon\Carbon::parse($dokumen->ba_hasil_tanggal);
        $hari = $tanggal->locale('id')->isoFormat('dddd');
        $tgl = trim(terbilang((int) $tanggal->format('d')));
        $bulan = strtolower($tanggal->locale('id')->isoFormat('MMMM'));
        $tahun = trim(terbilang((int) $tanggal->format('Y')));
    @endphp
    <p>Pada hari {{ $hari }} tanggal {{ $tgl }}
        bulan
        {{ $bulan }} tahun {{ $tahun }} pukul
        {{ $dokumen->undangan_pemasukan_jam ?? '' }} WITA, dengan mengambil tempat di kantor
        {{ $institusi->nama_institusi ?? '' }} telah disusun Berita Acara Hasil Pengadaan Langsung untuk pekerjaan
        tersebut diatas.
    <div>Dari hasil klarifikasi dan negosiasi harga, ditetapkan sebagai penyedia yaitu :</div>
    <ol style="list-style-type: upper-roman; padding-left: 17px;">
        <li>Bahwa dalam proses pengadaan langsung Pekerjaan Pemeliharaan Laboratorium Terpadu telah diundang calon
            penyedia yaitu :
            <ol style="list-style-type: decimal; padding-left: 17px;">
                <li>
                    <div class="info-item">
                        <span class="info-label"> Nama Penanggung jawab </span>
                        <span class="info-value">:
                            {{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}</span>
                    </div>
                </li>
                <li>
                    <div class="info-item">
                        <span class="info-label"> Alamat Perusahaan </span>
                        <span class="info-value2">: {{ $dokumen->sp?->penyedia?->alamat ?? '[Nama Penyedia]' }}</span>
                    </div>
                </li>
            </ol>
        </li>
        <p>Setelah dilakukan penilaian kualifikasi/ kompetensi badan usaha maka penyedia tersebut dianggap mampu untuk
            melaksanakan pekerjaan pengadaan langsung tersebut</p>
        <li>Setelah penyedia menyampaikan penawaran (administrasi, teknis dan harga) maka dilakukan pembukaan
            penawaran. Dalam pembukaan penawaran di peroleh hasil sebagai berikut :
            <ol style="list-style-type: decimal; padding-left: 19px;">
                <li>
                    <table border="1" cellspacing="0" cellpadding="5"
                        style="border-collapse: collapse; text-align: center;">
                        <tr>
                            <th style="text-align: center" colspan="3">PENAWARAN</th>
                            <th style="text-align: center"rowspan="2">KETERANGAN</th>
                        </tr>
                        <tr>
                            <th style="text-align: center">ADMINISTRASI</th>
                            <th style="text-align: center">TEKNIS</th>
                            <th style="text-align: center">BIAYA</th>
                        </tr>
                        <tr>
                            <td style="text-align: center">
                                {{ $dokumen->ba_hasil_penawaran_admin == 1 ? 'ADA' : 'TIDAK ADA' }}</td>
                            <td style="text-align: center">
                                {{ $dokumen->ba_hasil_penawaran_teknis == 1 ? 'ADA' : 'TIDAK ADA' }}</td>
                            <td style="text-align: center">
                                {{ $dokumen->ba_hasil_penawaran_biaya == 1 ? 'ADA' : 'TIDAK ADA' }}</td>
                            <td style="text-align: center">
                                {{ $dokumen->ba_hasil_penawaran_keterangan == 1 ? 'LENGKAP' : 'TIDAK LENGKAP' }}</td>
                        </tr>
                    </table>
                </li>
                <li>
                    <div class="info-item">
                        <span class="info-label"> Harga Penawaran </span>
                        <span class="info-value">:
                            {{ $dokumen->ba_hasil_penawaran_keterangan ?? '' }}</span>
                    </div>
                </li>
                <li>
                    <div class="info-item">
                        <span class="info-label"> Harga penawaran setelah
                            Koreksi aritmetik </span>
                        <span class="info-value">:
                            {{ $dokumen->ba_hasil_harga_koreksi ?? '' }}</span>
                    </div>
                </li>
                <li>
                    <div class="info-item">
                        <span class="info-label"> Harga Setelah Negosiasi </span>
                        <span class="info-value">:
                            {{ $dokumen->ba_hasil_harga_final ?? '' }}</span>
                    </div>
                </li>
            </ol>
        </li>
        <li>Selanjutnya dilakukan evaluasi dengan unsur – unsur evaluasi sebagai berikut :
            <ol style="list-style-type: decimal; padding-left: 17px;">
                <li>Evaluasi Administrasi</li>
                <li>Evaluasi Teknis</li>
                <li>Evaluasi Kewajaran Harga
                    <div>Unsur – unsur selengkapnya sebagai berikut :</div>
                    <ol>
                        <li>EVALUASI ADMINISTRASI
                            <br>Evaluasi Administrasi meliputi :
                            <br>a. Surat Penawaran
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">UNSUR YANG DIEVALUASI</th>
                                        <th style="text-align: center">KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Syarat – syarat substansial yang diminta berdasarkan dokumen pemilihan yang
                                            dipenuhi/ dilengkapi</td>
                                        <td>Memenuhi syarat</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Surat Penawaran</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="sub-item">- Ditandatangani oleh yang berhak</td>
                                        <td>MemenuhiSyarat</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="sub-item">- Jangka waktu berlakunya surat penawaran</td>
                                        <td>MemenuhiSyarat</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="sub-item">- Jangka waktu pelaksanaan</td>
                                        <td>MemenuhiSyarat</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li>EVALUASI TEKNIS
                            <div>Apabila penawaran memenuhi syarat administrasi tersebut diatas dilakukan evaluasi
                                teknis, unsur
                                evaluasi teknis meliputi :</div>
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center">UNSUR YANG DIEVALUASI</th>
                                        <th style="text-align: center">KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Metode pelaksanaan pekerjaan</td>
                                        <td>Memenuhi Syarat</td>
                                    </tr>
                                    <tr>
                                        <td>Jadwal waktu pelaksanaan pekerjaan</td>
                                        <td>Memenuhi Syarat</td>
                                    </tr>
                                    <tr>
                                        <td>Spesifikasi teknis</td>
                                        <td>Memenuhi Syarat</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li>EVALUASI KEWAJARAN HARGA</li>
                    </ol>
                </li>
            </ol>
        </li>

        <li>Untuk selanjutnya Berita Acara Hasil Pengadaan Langsung ini akan disampaikan kepada Pejabat Pembuat
            Komitmen untuk proses pengadaan langsung selanjutnya.</li>
    </ol>
    <p>Demikian Berita Acara ini di buat untuk di pergunakan sebagai bahan pertimbangan dalam pelaksanaan pengadaan
        langsung.</p>
    <p style="padding-top: 20px"></p>
    <div class="footer">
        <div class="signature">
            <div>Pejabat Pengadaan Barang/Jasa</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_pejabat_pengadaan_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_pejabat_pengadaan_53 ?? '-' }}</div>
        </div>
        <div class="clear"></div>
    </div>
</body>

{{-- <body class="content">
    <div class="header">
        <img src="{{ public_path('assets/img/KOP_2025.jpg') }}" alt="Kop Surat"
            style="width:110%;max-width:900px;margin-bottom:0px;">
        <h3 class="no-spacing">NOTA DINAS</h3>
    </div>
    <p style="padding-top: 5px"></p>




    <div class="info-item">
        <span class="info-label"> Kepada </span>
        <span class="info-value">: Yth. Pejabat Pembuat Komitmen {{ $institusi->nama_institusi ?? '' }}</span>
    </div>

    <div class="info-item">
        <span class="info-label"> Dari </span>
        <span class="info-value2">: Pejabat Pengadaan Barang/Jasa {{ $institusi->nama_institusi ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Tanggal </span>
        <span class="info-value2">: {{ $dokumen->nota_dinas_tanggal ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Nomor </span>
        <span class="info-value2">: {{ $dokumen->nota_dinas_nomor ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Sifat </span>
        <span class="info-value2">: Segera</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Lampiran </span>
        <span class="info-value2">: 8 (Delapan) berkas</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Hal </span>
        <span class="info-value2">: Penyampaian Berita Acara Pengadaan Langsung</span>
    </div>


    <div>Sesuai dengan Berita Acara Hasil Pengadaan Langsung Nomor : ULP/Pejabat Pengadaan/X/462/2022 Tanggal 2 November
        2022 untuk pekerjaan Pengadaan Pemeliharaan Laboratorium Terpadu maka bersama ini kami sampaikan administrasi
        proses pengadaan langsung yang telah selesai dilaksanakan terhadap :</div>
    <div class="info-item">
        <span class="info-label"> Nama Perusahaan </span>
        <span class="info-value">: {{ $dokumen->sp?->penyedia?->nama_penyedia ?? '[Nama Penyedia]' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Alamat </span>
        <span class="info-value">: {{ $dokumen->sp?->penyedia?->alamat ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> NPWP </span>
        <span class="info-value">: {{ $dokumen->sp?->penyedia?->npwp ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Harga </span>
        <span class="info-value">: Yth. Pejabat Pembuat Komitmen {{ $institusi->nama_institusi ?? '' }}</span>
    </div>
    <div class="info-item">
        <span class="info-label"> Setelah negosiasi </span>
        <span class="info-value">: Yth. Pejabat Pembuat Komitmen {{ $institusi->nama_institusi ?? '' }}</span>
    </div>
    </li>
    <p>Demikian atas perhatiannya diucapkan terima kasih.</p>
    <p style="padding-top: 20px"></p>
    <div class="footer">
        <div class="signature">
            <div>Pejabat Pengadaan Barang/Jasa</div>
            <br><br><br><br>
            <div> <strong>{{ $institusi->nama_pejabat_pengadaan_53 ?? '-' }}</strong> </div>
            <div>NIP. {{ $institusi->nip_pejabat_pengadaan_53 ?? '-' }}</div>
        </div>
        <div class="clear"></div>
    </div>
</body> --}}

</html>
