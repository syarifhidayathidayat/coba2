@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Pegawai</h1>

    <form action="{{ route('pegawai.update', $pegawai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" required>
        </div>

        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}">
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $pegawai->email }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
