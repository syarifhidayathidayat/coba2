@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Paket Pekerjaan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('paket-pekerjaan.update', $paketPekerjaan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama_paket">Nama Paket</label>
                            <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $paketPekerjaan->nama_paket) }}" required>
                            @error('nama_paket')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="max">MAX</label>
                            <input type="text" class="form-control @error('max') is-invalid @enderror" id="max" name="max" value="{{ old('max', $paketPekerjaan->max) }}" required>
                            @error('max')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="kode_rup">Kode RUP</label>
                            <input type="text" class="form-control @error('kode_rup') is-invalid @enderror" id="kode_rup" name="kode_rup" value="{{ old('kode_rup', $paketPekerjaan->kode_rup) }}" required>
                            @error('kode_rup')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="pagu">Pagu</label>
                            <input type="number" step="0.01" class="form-control @error('pagu') is-invalid @enderror" id="pagu" name="pagu" value="{{ old('pagu', $paketPekerjaan->pagu) }}" required>
                            @error('pagu')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty', $paketPekerjaan->qty) }}" required>
                            @error('qty')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="outstanding_kontrak">Outstanding Kontrak</label>
                            <input type="number" step="0.01" class="form-control @error('outstanding_kontrak') is-invalid @enderror" id="outstanding_kontrak" name="outstanding_kontrak" value="{{ old('outstanding_kontrak', $paketPekerjaan->outstanding_kontrak) }}" required>
                            @error('outstanding_kontrak')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="realisasi">Realisasi</label>
                            <input type="number" step="0.01" class="form-control @error('realisasi') is-invalid @enderror" id="realisasi" name="realisasi" value="{{ old('realisasi', $paketPekerjaan->realisasi) }}" required>
                            @error('realisasi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sisa_pagu">Sisa Pagu</label>
                            <input type="number" step="0.01" class="form-control @error('sisa_pagu') is-invalid @enderror" id="sisa_pagu" name="sisa_pagu" value="{{ old('sisa_pagu', $paketPekerjaan->sisa_pagu) }}" required>
                            @error('sisa_pagu')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('paket-pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 