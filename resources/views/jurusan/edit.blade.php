@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Jurusan</h1>

    <form action="{{ route('jurusan.update', $jurusan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama" class="form-control" value="{{ $jurusan->nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
