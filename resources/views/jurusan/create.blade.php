@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Jurusan</h1>

    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
