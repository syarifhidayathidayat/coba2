@extends('layouts.app')

@section('title', 'Daftar Pegawai')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">+ Tambah Pegawai</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $i => $pegawai)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $pegawai->nama }}</td>
                            <td>{{ $pegawai->nip }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                            <td>{{ $pegawai->email }}</td>
                            <td>
                                @foreach($pegawai->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('pegawai.edit', $pegawai) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pegawai.destroy', $pegawai) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pegawai ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($pegawais->isEmpty())
                        <tr><td colspan="6" class="text-center">Data kosong</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabel-barang').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100]
        });
    });
</script>
@endpush
