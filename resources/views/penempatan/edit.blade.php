@extends('layouts.admin')
@section('title', 'Edit Penempatan Barang')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Penempatan</h1>

    <form action="{{ route('penempatan.update', $penempatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Penempatan</label>
            <input type="text" name="nama" class="form-control" value="{{ $penempatan->nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('penempatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
    
</div>
@endsection
