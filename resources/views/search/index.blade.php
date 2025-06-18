@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Hasil Pencarian: <em>{{ $q }}</em></h1>
    <div class="row">
        <div class="col-md-12">
            <h5>BAST</h5>
            <table class="table table-bordered table-sm">
                <thead><tr><th>Nomor BAST</th><th>Nomor BAP</th><th>Nomor BAPEM</th><th>Aksi</th></tr></thead>
                <tbody>
                @forelse($basts as $bast)
                    <tr>
                        <td>{{ $bast->nomor_bast }}</td>
                        <td>{{ $bast->nomor_bap }}</td>
                        <td>{{ $bast->nomor_bapem }}</td>
                        <td><a href="{{ route('bast.show', $bast) }}" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Tidak ada hasil</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h5>SP</h5>
            <table class="table table-bordered table-sm">
                <thead><tr><th>Nomor SP</th><th>Nama Paket</th><th>Aksi</th></tr></thead>
                <tbody>
                @forelse($sps as $sp)
                    <tr>
                        <td>{{ $sp->nomor_sp }}</td>
                        <td>{{ $sp->nama_paket }}</td>
                        <td><a href="{{ route('sp.show', $sp) }}" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Tidak ada hasil</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h5>Pegawai</h5>
            <table class="table table-bordered table-sm">
                <thead><tr><th>Nama</th><th>NIP</th><th>Aksi</th></tr></thead>
                <tbody>
                @forelse($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->nip }}</td>
                        <td><a href="{{ route('pegawai.show', $pegawai) }}" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Tidak ada hasil</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 