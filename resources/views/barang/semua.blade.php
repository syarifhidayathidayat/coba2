@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Daftar Semua Barang</h3>
    <table class="table table-bordered table-striped" id="tabel-barang">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>SP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->qty }}</td>
                    <td>{{ $barang->sp->nomor_sp ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabel-barang').DataTable();
    });
</script>
@endpush
