@extends('layouts.app')
@section('title', 'Institusi & Pejabat')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Institusi & Pejabat</h1>
            <a href="{{ route('institusi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Institusi
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Institusi</h6>
                <a href="{{ route('institusi.create') }}" class="d-sm-none btn btn-sm btn-primary">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Periode</th>
                                <th width="12%">PPK 52</th>
                                <th width="12%">PPK 53</th>
                                <th width="12%">Pengadaan 52</th>
                                <th width="12%">Pengadaan 53</th>
                                <th width="12%">Bendahara</th>
                                <th width="10%">DIPA</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($institusis as $i => $institusi)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td>
                                        @if ($institusi->tanggal_mulai && $institusi->tanggal_selesai)
                                            {{ \Carbon\Carbon::parse($institusi->tanggal_mulai)->format('d-m-Y') }}<br>
                                            <small>s/d</small><br>
                                            {{ \Carbon\Carbon::parse($institusi->tanggal_selesai)->format('d-m-Y') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $institusi->nama_ppk_52 }}</strong><br>
                                        <small class="text-muted">{{ $institusi->nip_ppk_52 ?: '-' }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $institusi->nama_ppk_53 }}</strong><br>
                                        <small class="text-muted">{{ $institusi->nip_ppk_53 ?: '-' }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $institusi->nama_pejabat_pengadaan_52 }}</strong><br>
                                        <small class="text-muted">{{ $institusi->nip_pejabat_pengadaan_52 ?: '-' }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $institusi->nama_pejabat_pengadaan_53 }}</strong><br>
                                        <small class="text-muted">{{ $institusi->nip_pejabat_pengadaan_53 ?: '-' }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $institusi->nama_bendahara }}</strong><br>
                                        <small class="text-muted">{{ $institusi->nip_bendahara ?: '-' }}</small>
                                    </td>
                                    <td>
                                        {{ $institusi->dipa ?: '-' }}<br>
                                        {{-- Link SP DIPA --}}
                                        @if ($institusi->sp_dipa)
                                            <a href="{{ asset('storage/' . $institusi->sp_dipa) }}" target="_blank"
                                                class="badge bg-primary text-white mb-1 d-inline-block">
                                                <i class="fas fa-file-pdf"></i> SP DIPA
                                            </a>
                                        @else
                                            <span class="badge bg-secondary d-inline-block mb-1">Belum upload SP DIPA</span>
                                        @endif
                                        <br>
                                        {{-- Link SK Pejabat --}}
                                        @if ($institusi->upload_sk_pejabat)
                                            <a href="{{ asset('storage/' . $institusi->upload_sk_pejabat) }}"
                                                target="_blank" class="badge bg-success text-white d-inline-block">
                                                <i class="fas fa-file-pdf"></i> SK Pejabat
                                            </a>
                                        @else
                                            <span class="badge bg-secondary d-inline-block">Belum upload SK</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cog"></i> Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('institusi.edit', $institusi) }}">
                                                        <i class="fas fa-edit me-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('institusi.destroy', $institusi) }}"
                                                        method="POST" onsubmit="return confirm('Hapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="fas fa-trash-alt me-2"></i> Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    {{-- <td class="text-center">
                                        <div class="d-flex flex-column flex-sm-row gap-1 justify-content-center">
                                            <a href="{{ route('institusi.edit', $institusi) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('institusi.destroy', $institusi) }}" method="POST"
                                                onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">Tidak ada data yang tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion mb-4" id="infoAccordion">
            <div class="accordion-item border-0 shadow">
                <h2 class="accordion-header" id="headingInfo">
                    <button class="accordion-button collapsed " type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseInfo" aria-expanded="false"
                        aria-controls="collapseInfo">
                        <i class="fas fa-info-circle me-2"></i> Keterangan Tentang PPK, Pengadaan, Bendahara, dan Akun 52/53
                    </button>
                </h2>
                <div id="collapseInfo" class="accordion-collapse collapse" aria-labelledby="headingInfo"
                    data-bs-parent="#infoAccordion">
                    <div class="accordion-body bg-light">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="fas fa-user-tie me-2"></i>Pejabat Pembuat Komitmen
                                        (PPK)</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">Menandatangani dan mengendalikan kontrak
                                            pengadaan</li>
                                        <li class="list-group-item bg-light">Mengawasi pelaksanaan pekerjaan penyedia
                                            barang/jasa</li>
                                        <li class="list-group-item bg-light">Memeriksa hasil pekerjaan dan menguji kebenaran
                                            tagihan</li>
                                        <li class="list-group-item bg-light">Menyusun dokumen pendukung pembayaran</li>
                                    </ul>
                                </div>
                                <div class="mb-4">
                                    <h5 class="text-success"><i class="fas fa-user-check me-2"></i>Pejabat Pengadaan</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">Melaksanakan pemilihan penyedia untuk paket
                                            pengadaan tertentu (nilai ≤ 200 juta)</li>
                                        <li class="list-group-item bg-light">Membuat dan menetapkan dokumen pemilihan</li>
                                        <li class="list-group-item bg-light">Menunjuk penyedia berdasarkan hasil evaluasi
                                        </li>
                                        <li class="list-group-item bg-light">Melaporkan proses pemilihan kepada PPK atau
                                            KPA
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-4">
                                    <h5 class="text-warning"><i class="fas fa-wallet me-2"></i>Bendahara Pengeluaran</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">Mengelola dana kas kecil dan pembayaran
                                            berdasarkan SPM</li>
                                        <li class="list-group-item bg-light">Melakukan pencatatan transaksi keuangan negara
                                            secara akuntabel</li>
                                        <li class="list-group-item bg-light">Menyimpan bukti transaksi dan menyusun laporan
                                            pertanggungjawaban keuangan</li>
                                    </ul>
                                </div>
                                <div class="mb-4">
                                    <h5 class="text-info"><i class="fas fa-book-open me-2"></i>Akun 52 – Belanja Barang
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">Digunakan untuk kebutuhan operasional seperti
                                            ATK, honorarium, sewa, konsumsi, dan jasa lainnya</li>
                                        <li class="list-group-item bg-light">Tidak menghasilkan aset tetap</li>
                                    </ul>
                                </div>
                                <div class="mb-4">
                                    <h5 class="text-danger"><i class="fas fa-building me-2"></i>Akun 53 – Belanja Modal
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-light">Digunakan untuk pengadaan barang atau aset
                                            bernilai ekonomis dan tahan lama (lebih dari 1 tahun)</li>
                                        <li class="list-group-item bg-light">Contoh: komputer, alat laboratorium,
                                            kendaraan, dan gedung</li>
                                        <li class="list-group-item bg-light">Menambah nilai aset negara dan dicatat dalam
                                            neraca pemerintah</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Initialize tooltips if needed
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        })
    </script>
@endpush
