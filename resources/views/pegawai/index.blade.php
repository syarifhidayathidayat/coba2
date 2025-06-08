@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
<a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->nip }}</td>
            <td>{{ $row->jabatan }}</td>
            <td>
                <a href="{{ route('pegawai.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pegawai.destroy', $row->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
