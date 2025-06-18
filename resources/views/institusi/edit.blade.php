@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Institusi & Pejabat</h1>
    <form action="{{ route('institusi.update', $institusi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Institusi</label>
            <input type="text" name="nama_institusi" class="form-control" required value="{{ old('nama_institusi', $institusi->nama_institusi) }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required value="{{ old('alamat', $institusi->alamat) }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nama PPK 52</label>
                <input type="text" name="nama_ppk_52" class="form-control" value="{{ old('nama_ppk_52', $institusi->nama_ppk_52) }}">
            </div>
            <div class="form-group col-md-6">
                <label>NIP PPK 52</label>
                <input type="text" name="nip_ppk_52" class="form-control" value="{{ old('nip_ppk_52', $institusi->nip_ppk_52) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nama PPK 53</label>
                <input type="text" name="nama_ppk_53" class="form-control" value="{{ old('nama_ppk_53', $institusi->nama_ppk_53) }}">
            </div>
            <div class="form-group col-md-6">
                <label>NIP PPK 53</label>
                <input type="text" name="nip_ppk_53" class="form-control" value="{{ old('nip_ppk_53', $institusi->nip_ppk_53) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nama Pejabat Pengadaan 52</label>
                <input type="text" name="nama_pejabat_pengadaan_52" class="form-control" value="{{ old('nama_pejabat_pengadaan_52', $institusi->nama_pejabat_pengadaan_52) }}">
            </div>
            <div class="form-group col-md-6">
                <label>NIP Pejabat Pengadaan 52</label>
                <input type="text" name="nip_pejabat_pengadaan_52" class="form-control" value="{{ old('nip_pejabat_pengadaan_52', $institusi->nip_pejabat_pengadaan_52) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nama Pejabat Pengadaan 53</label>
                <input type="text" name="nama_pejabat_pengadaan_53" class="form-control" value="{{ old('nama_pejabat_pengadaan_53', $institusi->nama_pejabat_pengadaan_53) }}">
            </div>
            <div class="form-group col-md-6">
                <label>NIP Pejabat Pengadaan 53</label>
                <input type="text" name="nip_pejabat_pengadaan_53" class="form-control" value="{{ old('nip_pejabat_pengadaan_53', $institusi->nip_pejabat_pengadaan_53) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nama Bendahara</label>
                <input type="text" name="nama_bendahara" class="form-control" value="{{ old('nama_bendahara', $institusi->nama_bendahara) }}">
            </div>
            <div class="form-group col-md-6">
                <label>NIP Bendahara</label>
                <input type="text" name="nip_bendahara" class="form-control" value="{{ old('nip_bendahara', $institusi->nip_bendahara) }}">
            </div>
        </div>
        <div class="form-group">
            <label>DIPA</label>
            <input type="text" name="dipa" class="form-control" value="{{ old('dipa', $institusi->dipa) }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Periode Mulai (Tanggal SK Pejabat Mulai)</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $institusi->tanggal_mulai) }}">
            </div>
            <div class="form-group col-md-6">
                <label>Periode Selesai (Tanggal SK Pejabat Selesai)</label>
                <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $institusi->tanggal_selesai) }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('institusi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection