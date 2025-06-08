@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4">{{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai</h1>

<form method="POST" action="{{ isset($pegawai) ? route('pegawai.update', $pegawai->id) : route('pegawai.store') }}">
    @csrf
    @if(isset($pegawai)) @method('PUT') @endif
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $pegawai->nama ?? '') }}">
    </div>
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ old('nip', $pegawai->nip ?? '') }}">
    </div>
    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $pegawai->jabatan ?? '') }}">
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
