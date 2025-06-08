@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Jurusan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">+ Tambah Jurusan</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurusans as $i => $jurusan)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $jurusan->nama }}</td>
                            <td>
                                <a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('jurusan.destroy', $jurusan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus jurusan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($jurusans->isEmpty())
                        <tr><td colspan="3" class="text-center">Data kosong</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
