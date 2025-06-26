@extends('layouts.app')

@section('title', 'Institusi & Pejabat')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Institusi & Pejabat</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('institusi.create') }}" class="btn btn-primary mb-3">+ Tambah Institusi</a>


        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Periode</th>
                            <th>PPK 52</th>
                            <th>PPK 53</th>
                            <th>Pejabat Pengadaan 52</th>
                            <th>Pejabat Pengadaan 53</th>
                            <th>Bendahara</th>
                            <th>DIPA</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($institusis as $i => $institusi)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <!-- <td>{{ $institusi->nama_institusi }}</td> -->
                                <!-- <td>{{ $institusi->alamat }}</td> -->
                                <td>
                                    @if ($institusi->tanggal_mulai && $institusi->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($institusi->tanggal_mulai)->format('d-m-Y') }} s/d
                                        {{ \Carbon\Carbon::parse($institusi->tanggal_selesai)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $institusi->nama_ppk_52 }}<br><small>{{ $institusi->nip_ppk_52 }}</small></td>
                                <td>{{ $institusi->nama_ppk_53 }}<br><small>{{ $institusi->nip_ppk_53 }}</small></td>
                                <td>{{ $institusi->nama_pejabat_pengadaan_52 }}<br><small>{{ $institusi->nip_pejabat_pengadaan_52 }}</small>
                                </td>
                                <td>{{ $institusi->nama_pejabat_pengadaan_53 }}<br><small>{{ $institusi->nip_pejabat_pengadaan_53 }}</small>
                                </td>
                                <td>{{ $institusi->nama_bendahara }}<br><small>{{ $institusi->nip_bendahara }}</small>
                                </td>
                                <td>{{ $institusi->dipa }}<br><small>
                                        @if ($institusi->sp_dipa)
                                            <a href="{{ asset('storage/' . $institusi->sp_dipa) }}" target="_blank">
                                                <i class="fas fa-eye"></i> Lihat SP DIPA
                                            </a>
                                        @else
                                            <small class="text-muted">Belum diupload</small>
                                        @endif

                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <a href="{{ route('institusi.edit', $institusi) }}"
                                            class="btn btn-sm btn-warning w-100" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('institusi.destroy', $institusi) }}" method="POST"
                                            onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger w-100" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if ($institusis->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Data kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="accordion mt-4" id="accordionKeterangan">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingKeterangan">
                            <button class="accordion-button collapsed bg-info text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseKeterangan" aria-expanded="false"
                                aria-controls="collapseKeterangan">
                                <i class="fas fa-info-circle me-2"></i> Keterangan Tentang PPK, Pengadaan, Bendahara, dan
                                Akun 52/53
                            </button>
                        </h2>
                        <div id="collapseKeterangan" class="accordion-collapse collapse" aria-labelledby="headingKeterangan"
                            data-bs-parent="#accordionKeterangan">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><i class="fas fa-user-tie text-primary me-2"></i>Pejabat Pembuat Komitmen (PPK)
                                        </h5>
                                        <ul>
                                            <li>Menandatangani dan mengendalikan kontrak pengadaan.</li>
                                            <li>Mengawasi pelaksanaan pekerjaan penyedia barang/jasa.</li>
                                            <li>Memeriksa hasil pekerjaan dan menguji kebenaran tagihan.</li>
                                            <li>Menyusun dokumen pendukung pembayaran.</li>
                                        </ul>

                                        <h5 class="mt-4"><i class="fas fa-user-check text-success me-2"></i>Pejabat
                                            Pengadaan</h5>
                                        <ul>
                                            <li>Melaksanakan pemilihan penyedia untuk paket pengadaan tertentu (nilai ≤ 200
                                                juta).</li>
                                            <li>Membuat dan menetapkan dokumen pemilihan.</li>
                                            <li>Menunjuk penyedia berdasarkan hasil evaluasi.</li>
                                            <li>Melaporkan proses pemilihan kepada PPK atau KPA.</li>
                                        </ul>

                                        <h5 class="mt-4"><i class="fas fa-wallet text-warning me-2"></i>Bendahara
                                            Pengeluaran</h5>
                                        <ul>
                                            <li>Mengelola dana kas kecil dan pembayaran berdasarkan SPM.</li>
                                            <li>Melakukan pencatatan transaksi keuangan negara secara akuntabel.</li>
                                            <li>Menyimpan bukti transaksi dan menyusun laporan pertanggungjawaban keuangan.
                                            </li>
                                        </ul>

                                        <h5 class="mt-4"><i class="fas fa-book-open text-info me-2"></i>Akun 52 – Belanja
                                            Barang</h5>
                                        <ul>
                                            <li>Digunakan untuk kebutuhan operasional seperti ATK, honorarium, sewa,
                                                konsumsi, dan jasa lainnya.</li>
                                            <li>Tidak menghasilkan aset tetap.</li>
                                        </ul>

                                        <h5 class="mt-4"><i class="fas fa-building text-danger me-2"></i>Akun 53 – Belanja
                                            Modal</h5>
                                        <ul>
                                            <li>Digunakan untuk pengadaan barang atau aset bernilai ekonomis dan tahan lama
                                                (lebih dari 1 tahun).</li>
                                            <li>Contoh: komputer, alat laboratorium, kendaraan, dan gedung.</li>
                                            <li>Menambah nilai aset negara dan dicatat dalam neraca pemerintah.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection

@vite(['resources/js/app.js'])

<script>
    // No custom JS needed if using Bootstrap's collapse with correct data attributes
    // If you use CoreUI, ensure CoreUI JS is loaded and attributes are correct
</script>




