@extends('layouts.app')

@section('content')
<div class="container-fluid">
 
    <div>
        <h1 class="h3 text-gray-800">{{ $pageTitle ?? 'Daftar Semua Barang' }}</h1>
        <x-breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Surat Pesanan', 'url' => route('sp.index')],
            ['label' => 'Barang', 'url' => route('barang.semua')],
        ]" />
    </div>
    <table class="table table-bordered table-striped" id="tabel-barang">
        <thead>
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
