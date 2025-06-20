@extends('layouts.app')

@section('title', 'Detail Paket Pekerjaan')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Paket Pekerjaan</h5>
                    <a href="{{ route('paket-pekerjaan.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <strong>Nama Paket:</strong>
                            <div class="text-primary">{{ $paketPekerjaan->nama_paket }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Tahun Anggaran:</strong>
                            <div>{{ $paketPekerjaan->tahun_anggaran }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>MAX:</strong>
                            <div>{{ $paketPekerjaan->max }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Kode RUP:</strong>
                            <div>{{ $paketPekerjaan->kode_rup }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Jenis Akun:</strong>
                            <div>
                                @if($paketPekerjaan->jenis_akun == '52')
                                    52 | Belanja Barang
                                @elseif($paketPekerjaan->jenis_akun == '53')
                                    53 | Belanja Modal
                                @elseif($paketPekerjaan->jenis_akun == 'lainnya')
                                    Lainnya
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Pagu:</strong>
                            <div class="fw-bold text-success">Rp {{ number_format($paketPekerjaan->pagu, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Qty:</strong>
                            <div>{{ $paketPekerjaan->qty }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Outstanding Kontrak:</strong>
                            <div>Rp {{ number_format($paketPekerjaan->outstanding_kontrak, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Realisasi:</strong>
                            <div>Rp {{ number_format($paketPekerjaan->realisasi, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Sisa Pagu:</strong>
                            <div class="fw-bold text-danger">Rp {{ number_format($paketPekerjaan->sisa_pagu, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="form-group text-end mt-4">
                        <a href="{{ route('paket-pekerjaan.edit', $paketPekerjaan->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 