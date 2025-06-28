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
                        <div class="form-group">
                            <label class="form-label">Nama Institusi</label>
                            <input type="text" name="nama_institusi" class="form-control" required 
                                   value="{{ old('nama_institusi', $institusi->nama_institusi) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required 
                                   value="{{ old('alamat', $institusi->alamat) }}">
                        </div>
                    </div>
                </div>
                <h5 class="mb-3">PPK</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama PPK 52</label>
                            <input type="text" name="nama_ppk_52" class="form-control" 
                                   value="{{ old('nama_ppk_52', $institusi->nama_ppk_52) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">NIP PPK 52</label>
                            <input type="text" name="nip_ppk_52" class="form-control" 
                                   value="{{ old('nip_ppk_52', $institusi->nip_ppk_52) }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama PPK 53</label>
                            <input type="text" name="nama_ppk_53" class="form-control" 
                                   value="{{ old('nama_ppk_53', $institusi->nama_ppk_53) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">NIP PPK 53</label>
                            <input type="text" name="nip_ppk_53" class="form-control" 
                                   value="{{ old('nip_ppk_53', $institusi->nip_ppk_53) }}">
                        </div>
                    </div>
                </div>
                <h5 class="mb-3">Pejabat Pengadaan</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Pejabat Pengadaan 52</label>
                            <input type="text" name="nama_pejabat_pengadaan_52" class="form-control" 
                                   value="{{ old('nama_pejabat_pengadaan_52', $institusi->nama_pejabat_pengadaan_52) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">NIP Pejabat Pengadaan 52</label>
                            <input type="text" name="nip_pejabat_pengadaan_52" class="form-control" 
                                   value="{{ old('nip_pejabat_pengadaan_52', $institusi->nip_pejabat_pengadaan_52) }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Pejabat Pengadaan 53</label>
                            <input type="text" name="nama_pejabat_pengadaan_53" class="form-control" 
                                   value="{{ old('nama_pejabat_pengadaan_53', $institusi->nama_pejabat_pengadaan_53) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">NIP Pejabat Pengadaan 53</label>
                            <input type="text" name="nip_pejabat_pengadaan_53" class="form-control" 
                                   value="{{ old('nip_pejabat_pengadaan_53', $institusi->nip_pejabat_pengadaan_53) }}">
                        </div>
                    </div>
                </div>
                <h5 class="mb-3">Bendahara</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Bendahara</label>
                            <input type="text" name="nama_bendahara" class="form-control" 
                                   value="{{ old('nama_bendahara', $institusi->nama_bendahara) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">NIP Bendahara</label>
                            <input type="text" name="nip_bendahara" class="form-control" 
                                   value="{{ old('nip_bendahara', $institusi->nip_bendahara) }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">DIPA</label>
                            <input type="text" name="dipa" class="form-control" 
                                   value="{{ old('dipa', $institusi->dipa) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Upload SP DIPA (PDF)</label>
                            <input type="file" name="sp_dipa" class="form-control" accept="application/pdf">
                            @if($institusi->sp_dipa)
                                <small class="form-text text-muted">File saat ini: 
                                    <a href="{{ asset('storage/' . $institusi->sp_dipa) }}" target="_blank">Lihat SP DIPA</a>
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Periode Mulai (Tanggal SK Pejabat Mulai)</label>
                            <input type="date" name="tanggal_mulai" class="form-control" 
                                   value="{{ old('tanggal_mulai', $institusi->tanggal_mulai) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Periode Selesai (Tanggal SK Pejabat Selesai)</label>
                            <input type="date" name="tanggal_selesai" class="form-control" 
                                   value="{{ old('tanggal_selesai', $institusi->tanggal_selesai) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('institusi.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection