@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Detail SP: {{ $sp->nomor_sp }}</h4>
    <p><strong>Nama Paket:</strong> {{ $sp->nama_paket }}</p>
    <p><strong>Penyedia:</strong> {{ $sp->penyedia->nama_penyedia ?? '-' }}</p>

    <hr>
    <h5>Daftar Barang</h5>
    <table class="table table-bordered" id="barang-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sp->barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('sp.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#barang-table').DataTable();
    });
</script>
@endpush
