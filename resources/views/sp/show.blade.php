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
                <th>Harga</th>
                <th>Ongkos Kirim</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHarga = 0;
                $totalOngkir = 0;
                $totalKontrak = 0;
            @endphp
            @foreach($sp->barangs as $index => $barang)
                @php
                    $subtotal = $barang->qty * $barang->harga;
                    $total = $subtotal + $barang->ongkos_kirim;
                    $totalHarga += $subtotal;
                    $totalOngkir += $barang->ongkos_kirim;
                    $totalKontrak += $total;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->qty }}</td>
                    <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>{{ number_format($barang->ongkos_kirim, 0, ',', '.') }}</td>
                    <td>{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Ringkasan --}}
    <div class="mt-4 p-3 border rounded bg-light">
        <h6>Ringkasan:</h6>
        <div class="row">
            <div class="col-md-4">
                <label>Total Harga Barang</label>
                <div class="form-control bg-white" readonly>{{ number_format($totalHarga, 0, ',', '.') }}</div>
            </div>
            <div class="col-md-4">
                <label>Total Ongkos Kirim</label>
                <div class="form-control bg-white" readonly>{{ number_format($totalOngkir, 0, ',', '.') }}</div>
            </div>
            <div class="col-md-4">
                <label>Total Kontrak</label>
                <div class="form-control bg-white" readonly>{{ number_format($totalKontrak, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>

    <a href="{{ route('sp.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#barang-table').DataTable({
            paging: false,
            searching: false,
            ordering: false,
            info: false
        });
    });
</script>
@endpush
