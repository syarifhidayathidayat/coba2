@extends('layouts.app')

@section('title', 'Semua Barang')

@section('content')
<div class="container-fluid px-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📦 Semua Barang</h2>
        <x-breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Surat Pesanan', 'url' => route('sp.index')],
            ['label' => 'Semua Barang', 'active' => true],
        ]" />
    </div>

    <!-- Card for Table -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <strong>Daftar Barang yang Telah Dipesan</strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped mb-0" id="tabel-barang">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>SP</th>
                            <th>Penempatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedBarangs = $barangs->groupBy('nama_barang');
                        @endphp
                        @foreach ($groupedBarangs as $namaBarang => $barangsGroup)
                            @php
                                $qtyTotal = $barangsGroup->sum('qty');
                                $sp = $barangsGroup->first()->sp;
                                $penempatanList = $barangsGroup->map(function($b) {
                                    return ($b->penempatan ? $b->penempatan->nama : '-') . ' (' . $b->qty . ')';
                                })->implode(', ');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $namaBarang }}</td>
                                <td>{{ $qtyTotal }}</td>
                                <td>{{ $sp->nomor_sp ?? '-' }}</td>
                                <td>{{ $penempatanList }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabel-barang').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100]
        });
    });
</script>
@endpush
