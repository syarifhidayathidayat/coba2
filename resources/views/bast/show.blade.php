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
                    @foreach($bast->barangs as $index => $barang)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->pivot->jumlah_serah_terima }}</td>
                        <td>{{ $barang->pivot->kondisi }}</td>
                        <td>{{ $barang->pivot->keterangan ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        
        
        <a href="{{ route('bast.print.bap', $bast->id) }}" class="btn btn-info" target="_blank">
            <i class="fas fa-print"></i> Cetak BAP
        </a>
        <a href="{{ route('bast.print.bast', $bast->id) }}" class="btn btn-primary" target="_blank">
            <i class="fas fa-print"></i> Cetak BAST
        </a>
        <a href="{{ route('bast.print.bapem', $bast->id) }}" class="btn btn-success" target="_blank">
            <i class="fas fa-print"></i> Cetak BAPEM
        </a>
        <a href="{{ route('bast.print.kwitansi', $bast->id) }}" class="btn btn-warning" target="_blank">
            <i class="fas fa-print"></i> Cetak Kwitansi
        </a>
        <a href="{{ route('bast.print.ssp', $bast->id) }}" class="btn btn-warning" target="_blank">
            <i class="fas fa-print"></i> Cetak SSP
        </a>
        <a href="{{ route('bast.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection 