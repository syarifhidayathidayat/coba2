@extends('layouts.app')
@section('title', 'Detail BAST')
@section('content')
<div class="container-fluid">
    <h4>Detail BAST</h4>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nomor SP:</strong> {{ $bast->sp->nomor_sp }}</p>
                    <p><strong>Tanggal BAST:</strong> {{ $bast->tanggal_bast->format('d-m-Y') }}</p>
                    <p><strong>Nomor BAP:</strong> {{ $bast->nomor_bap }}</p>
                    <p><strong>Nomor BAST:</strong> {{ $bast->nomor_bast }}</p>
                    <p><strong>Nomor BAPEM:</strong> {{ $bast->nomor_bapem }}</p>
                    <div class="info-item">
                        <div class="info-label">Nomor Kwitansi</div>
                        <div class="info-value">: {{ $bast->no_kwitansi }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p><strong>Status:</strong> {{ ucfirst($bast->status) }}</p>
                    <p><strong>Keterangan:</strong> {{ $bast->keterangan ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Detail Barang</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Serah Terima</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $grouped = $bast->barangs->groupBy('nama_barang');
                        $no = 1;
                    @endphp
                    @foreach ($grouped as $namaBarang => $items)
                        @php
                            $totalSerah = $items->sum(fn($item) => $item->pivot->jumlah_serah_terima);
                            $kondisi = $items->pluck('pivot.kondisi')->unique()->implode(', ');
                            $keterangan = $items->pluck('pivot.keterangan')->unique()->implode(', ');
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $namaBarang }}</td>
                            <td>{{ $totalSerah }}</td>
                            <td>{{ $kondisi }}</td>
                            <td>{{ $keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('bast.print.bap', $bast->id) }}" class="btn btn-outline-primary" target="_blank">
            <i class="fas fa-print"></i> BAP
        </a>
        <a href="{{ route('bast.print.bast', $bast->id) }}" class="btn btn-outline-secondary" target="_blank">
            <i class="fas fa-print"></i> BAST
        </a>
        <a href="{{ route('bast.print.bapem', $bast->id) }}" class="btn btn-outline-danger" target="_blank">
            <i class="fas fa-print"></i> BAPEM
        </a>
        <a href="{{ route('bast.print.kwitansi', $bast->id) }}" class="btn btn-outline-warning" target="_blank">
            <i class="fas fa-print"></i> Kwitansi
        </a>
        <a href="{{ route('bast.print.ssp', $bast->id) }}" class="btn btn-outline-success" target="_blank">
            <i class="fas fa-print"></i> SSP
        </a>
        <a href="{{ route('bast.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
            Kembali</a>
    </div>
</div>
@endsection
