@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Detail Paket Pekerjaan</h5>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Nama Paket:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $paketPekerjaan->nama_paket }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>MAX:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $paketPekerjaan->max }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Kode RUP:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $paketPekerjaan->kode_rup }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Pagu:</strong>
                        </div>
                        <div class="col-md-9">
                            Rp {{ number_format($paketPekerjaan->pagu, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Qty:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $paketPekerjaan->qty }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Outstanding Kontrak:</strong>
                        </div>
                        <div class="col-md-9">
                            Rp {{ number_format($paketPekerjaan->outstanding_kontrak, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Realisasi:</strong>
                        </div>
                        <div class="col-md-9">
                            Rp {{ number_format($paketPekerjaan->realisasi, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Sisa Pagu:</strong>
                        </div>
                        <div class="col-md-9">
                            Rp {{ number_format($paketPekerjaan->sisa_pagu, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('paket-pekerjaan.edit', $paketPekerjaan->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('paket-pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 