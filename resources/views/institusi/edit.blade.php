@extends('layouts.app')
@section('title', 'Edit Institusi & Pejabat')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Institusi & Pejabat</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('institusi.update', $institusi) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Institusi</label>
                            <input type="text" name="nama_institusi" class="form-control" required
                                value="{{ old('nama_institusi', $institusi->nama_institusi) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required
                                value="{{ old('alamat', $institusi->alamat) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control"
                                value="{{ old('no_telp', $institusi->no_telp) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fax</label>
                            <input type="text" name="fax" class="form-control"
                                value="{{ old('fax', $institusi->fax) }}">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kode Institusi</label>
                                <input type="text" name="kode_institusi" class="form-control"
                                    value="{{ old('kode_institusi', $institusi->kode_institusi) }}">
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-3">PPK</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama PPK 52</label>
                            <input type="text" name="nama_ppk_52" class="form-control"
                                value="{{ old('nama_ppk_52', $institusi->nama_ppk_52) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIP PPK 52</label>
                            <input type="text" name="nip_ppk_52" class="form-control"
                                value="{{ old('nip_ppk_52', $institusi->nip_ppk_52) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama PPK 53</label>
                            <input type="text" name="nama_ppk_53" class="form-control"
                                value="{{ old('nama_ppk_53', $institusi->nama_ppk_53) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIP PPK 53</label>
                            <input type="text" name="nip_ppk_53" class="form-control"
                                value="{{ old('nip_ppk_53', $institusi->nip_ppk_53) }}">
                        </div>
                    </div>
                    <h5 class="mb-3">Pejabat Pengadaan</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pejabat Pengadaan 52</label>
                            <input type="text" name="nama_pejabat_pengadaan_52" class="form-control"
                                value="{{ old('nama_pejabat_pengadaan_52', $institusi->nama_pejabat_pengadaan_52) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIP Pejabat Pengadaan 52</label>
                            <input type="text" name="nip_pejabat_pengadaan_52" class="form-control"
                                value="{{ old('nip_pejabat_pengadaan_52', $institusi->nip_pejabat_pengadaan_52) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pejabat Pengadaan 53</label>
                            <input type="text" name="nama_pejabat_pengadaan_53" class="form-control"
                                value="{{ old('nama_pejabat_pengadaan_53', $institusi->nama_pejabat_pengadaan_53) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIP Pejabat Pengadaan 53</label>
                            <input type="text" name="nip_pejabat_pengadaan_53" class="form-control"
                                value="{{ old('nip_pejabat_pengadaan_53', $institusi->nip_pejabat_pengadaan_53) }}">
                        </div>
                    </div>
                    <h5 class="mb-3">Bendahara</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Bendahara</label>
                            <input type="text" name="nama_bendahara" class="form-control"
                                value="{{ old('nama_bendahara', $institusi->nama_bendahara) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIP Bendahara</label>
                            <input type="text" name="nip_bendahara" class="form-control"
                                value="{{ old('nip_bendahara', $institusi->nip_bendahara) }}">
                        </div>
                    </div>
                    <h5 class="mb-3">DIPA</h5>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">DIPA</label>
                            <input type="text" name="dipa" class="form-control"
                                value="{{ old('dipa', $institusi->dipa) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal SP DIPA</label>
                            <input type="date" name="tanggal_sp_dipa" class="form-control"
                                value="{{ old('tanggal_sp_dipa', $institusi->tanggal_sp_dipa) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Upload SP DIPA (PDF)</label>
                            <input type="file" name="sp_dipa" class="form-control" accept="application/pdf">
                            @if ($institusi->sp_dipa)
                                <small class="form-text text-muted">File saat ini:
                                    <a href="{{ asset('storage/' . $institusi->sp_dipa) }}" target="_blank">Lihat SP
                                        DIPA</a>
                                </small>
                            @endif
                        </div>
                    </div>
                    <h5 class="mb-3">SK Pejabat</h5>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">No. SK Pejabat</label>
                            <input type="text" name="no_sk_pejabat" class="form-control"
                                value="{{ old('no_sk_pejabat', $institusi->no_sk_pejabat) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal SK Pejabat</label>
                            <input type="date" name="tanggal_sk_pejabat" class="form-control"
                                value="{{ old('tanggal_sk_pejabat', $institusi->tanggal_sk_pejabat) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Upload SK Pejabat (PDF)</label>
                            <input type="file" name="upload_sk_pejabat" class="form-control"
                                accept="application/pdf">
                            @if ($institusi->upload_sk_pejabat)
                                <small class="form-text text-muted">File saat ini:
                                    <a href="{{ asset('storage/' . $institusi->upload_sk_pejabat) }}"
                                        target="_blank">Lihat SK</a>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Periode Mulai (Tanggal SK Pejabat Mulai)</label>
                            <input type="date" name="tanggal_mulai" class="form-control"
                                value="{{ old('tanggal_mulai', $institusi->tanggal_mulai) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Periode Selesai (Tanggal SK Pejabat Selesai)</label>
                            <input type="date" name="tanggal_selesai" class="form-control"
                                value="{{ old('tanggal_selesai', $institusi->tanggal_selesai) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('institusi.index') }}" class="btn btn-secondary">< Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
