@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Penempatan Barang</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('penempatan.create') }}" class="btn btn-primary mb-3">+ Tambah Penempatan</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Penempatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurusans as $i => $penempatan)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $penempatan->nama }}</td>
                            <td>
                                <a href="{{ route('penempatan.edit', $penempatan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('penempatan.destroy', $penempatan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus penempatan ini?')">
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
