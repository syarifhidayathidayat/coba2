@extends('layouts.app')

@section('title', 'Daftar SP dan Barang')

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <div class="d-flex justify-content-between flex-wrap align-items-center">
            <div>
                <h1 class="h3 text-gray-800">{{ $pageTitle ?? 'Surat Pesanan' }}</h1>
                <x-breadcrumb :items="[
                    ['label' => 'Dashboard', 'url' => route('dashboard')],
                    ['label' => 'Semua Surat Pesanan', 'active' => true],
                ]" />
            </div>

            <div class="btn-group mt-3 mt-md-0">
                @if (request('belum_bast'))
                    <a href="{{ route('sp.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan Semua</a>
                @else
                    <a href="{{ route('sp.index', ['belum_bast' => 1]) }}" class="btn btn-outline-primary btn-sm">SP Belum BAST</a>
                @endif
                <a href="{{ route('sp.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Tambah SP</a>
                <a href="{{ route('barang.semua') }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-shopping-cart me-1"></i>Barang</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table id="tabel-sp" class="table table-hover table-bordered table-striped w-100">
                <thead class="table-light">
                    <tr>
                        <th>Status</th>
                        <th>Nomor SP</th>
                        <th>Penyedia</th>
                        <th>Nama Paket</th>
                        <th>Tanggal</th>
                        <th>Total Kontrak</th>
                        <th>Akhir</th>
                        <th>Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sps as $sp)
                        <tr>
                            @php
                                $color = match ($sp->status_label) {
                                    'SP Dibuat' => 'success',
                                    'BAST Dibuat' => 'warning',
                                    'BAST Dicetak' => 'info',
                                    'Sudah Dibayar' => 'danger',
                                    default => 'secondary',
                                };
                            @endphp
                            <td><span class="badge bg-{{ $color }}">{{ $sp->status_label }}</span></td>
                            <td>{{ $sp->nomor_sp }}</td>
                            <td>{{ $sp->penyedia->nama_penyedia ?? '-' }}</td>
                            <td>{{ $sp->nama_paket }}</td>
                            <td>{{ \Carbon\Carbon::parse($sp->tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="text-success fw-bold">Rp {{ number_format($sp->total_kontrak, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($sp->akhir_pekerjaan)->translatedFormat('d M Y') }}</td>
                            <td>
                                <a href="{{ route('sp.show', $sp->id) }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye me-1"></i>{{ $sp->barangs->sum('qty') }} Qty, {{ $sp->barangs->groupBy('nama_barang')->count() }} Jenis
                                </a>
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('sp.edit', $sp->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('sp.destroy', $sp->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus SP?')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('barang.create', $sp->id) }}" class="btn btn-sm btn-info" title="Tambah Barang">
                                    <i class="fas fa-plus"></i>
                                </a>
                                @if (!$sp->bast)
                                    <a href="{{ route('bast.create', $sp->id) }}" class="btn btn-sm btn-success" title="Buat BAST">
                                        <i class="fas fa-plus"></i> BAST
                                    </a>
                                @endif
                                @if ($sp->metode === 'Pengadaan Langsung' && $sp->dokumenPemilihan)
                                    <a href="{{ route('dokumen-pemilihan.cetak.undangan', $sp->dokumen_pemilihan_id) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="Cetak Undangan">
                                        <i class="fas fa-print"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#tabel-sp').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                searching: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [[ 4, 'desc' ]],
            });
        });
    </script>
@endpush
