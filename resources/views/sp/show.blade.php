@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail SP: {{ $sp->nomor_sp }}</h4>
        <div>
            <a href="{{ route('sp.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('sp.cetak', $sp->id) }}" class="btn btn-primary btn-sm" target="_blank">
                <i class="fas fa-print"></i> Tanda Terima Barang
            </a>
        </div>
    </div>
    
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
                <th>Penempatan</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Group barangs by nama_barang
                $groupedBarangs = $sp->barangs->groupBy('nama_barang');
                $totalHarga = $groupedBarangs->sum(function($barangs) {
                    return $barangs->sum(function($b) { return $b->qty * $b->harga; });
                });
                $totalOngkir = $groupedBarangs->sum(function($barangs) {
                    return $barangs->first()->ongkos_kirim ?? 0;
                });
                $totalKontrak = $groupedBarangs->sum(function($barangs) {
                    $harga = $barangs->first()->harga;
                    $ongkir = $barangs->first()->ongkos_kirim ?? 0;
                    $qtyTotal = $barangs->sum('qty');
                    return ($qtyTotal * $harga) + $ongkir;
                });
            @endphp
            @foreach($groupedBarangs as $namaBarang => $barangs)
                @php
                    $qtyTotal = $barangs->sum('qty');
                    $harga = $barangs->first()->harga;
                    $ongkos_kirim = $barangs->first()->ongkos_kirim;
                    $total = ($qtyTotal * $harga) + $ongkos_kirim;
                    $penempatanList = $barangs->map(function($b) {
                        return ($b->penempatan ? $b->penempatan->nama : '-') . ' (' . $b->qty . ')';
                    })->implode(', ');
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $namaBarang }}</td>
                    <td>{{ $qtyTotal }}</td>
                    <td>{{ number_format($harga, 0, ',', '.') }}</td>
                    <td>{{ number_format($ongkos_kirim, 0, ',', '.') }}</td>
                    <td>{{ $penempatanList }}</td>
                    <td>{{ number_format($total, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('barang.edit', ['nama_barang' => $namaBarang, 'sp_id' => $sp->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Ringkasan --}}
    <div class="mt-4 p-3 border rounded bg-light">
        <h6>Ringkasanss:</h6>
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
