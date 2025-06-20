@extends('layouts.app')

@section('title', 'Tambah Penempatan Barang')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Penempatan Barang</h1> 

    <form action="{{ route('penempatan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Penempatan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penempatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
