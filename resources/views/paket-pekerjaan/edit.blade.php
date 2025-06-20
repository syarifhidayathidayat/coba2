@extends('layouts.app')

@section('title', 'Edit Paket Pekerjaan')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Paket Pekerjaan</h5>
                    <a href="{{ route('paket-pekerjaan.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('paket-pekerjaan.update', $paketPekerjaan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_paket">Nama Paket</label>
                                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $paketPekerjaan->nama_paket) }}" required>
                                    @error('nama_paket')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tahun_anggaran">Tahun Anggaran</label>
                                    <input type="number" class="form-control @error('tahun_anggaran') is-invalid @enderror" id="tahun_anggaran" name="tahun_anggaran" value="{{ old('tahun_anggaran', $paketPekerjaan->tahun_anggaran) }}" required>
                                    @error('tahun_anggaran')
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
                                    <label for="jenis_akun">Jenis Akun</label>
                                    <select class="form-control @error('jenis_akun') is-invalid @enderror" id="jenis_akun" name="jenis_akun" required>
                                        <option value="">-- Pilih Jenis Akun --</option>
                                        <option value="52" {{ old('jenis_akun', $paketPekerjaan->jenis_akun) == '52' ? 'selected' : '' }}>52 | Belanja Barang</option>
                                        <option value="53" {{ old('jenis_akun', $paketPekerjaan->jenis_akun) == '53' ? 'selected' : '' }}>53 | Belanja Modal</option>
                                        <option value="lainnya" {{ old('jenis_akun', $paketPekerjaan->jenis_akun) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_akun')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>
                        <div class="form-group text-end mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 