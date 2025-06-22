@extends('layouts.app')

@section('title', 'Pencarian: ' . $q)
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Hasil Pencarian: <em>{{ $q }}</em></h1>
        <div class="row">
            <div class="col-md-12">
                <h5>BAST</h5>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Nomor BAST</th>
                            <th>Nomor BAP</th>
                            <th>Nomor SP</th>
                            <th>Penyedia</th>                            
                            <th>Aksi</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($basts as $bast)
                            <tr>
                                <td>{{ $bast->nomor_bast }}</td>
                                <td>{{ $bast->nomor_bap }}</td>
                                <td>{{ $bast->nomor_bapem }}</td>
                                <td>{{ $bast->sp->penyedia->nama_penyedia ?? 'Tidak Diketahui' }}</td>
                                <td><a href="{{ route('bast.show', $bast) }}" class="btn btn-sm btn-info">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5>SP</h5>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Nomor SP</th>
                            <th>Nama Paket</th>
                            <th>Nama Penyedia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sps as $sp)
                            <tr>
                                <td>{{ $sp->nomor_sp }}</td>
                                <td>{{ $sp->nama_paket }}</td>
                                <td>{{ $sp->penyedia->nama_penyedia ?? 'Tidak Diketahui' }}</td>
                                <td><a href="{{ route('sp.show', $sp) }}" class="btn btn-sm btn-info">Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada hasil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5>Pegawai</h5>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pegawais as $pegawai)
                            <tr>
                                <td>{{ $pegawai->nama }}</td>
                                <td>{{ $pegawai->nip }}</td>
                                <td><a href="{{ route('pegawai.show', $pegawai) }}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada hasil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5>Penyedia</h5>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Rekening Bank</th>
                            <th>NPWP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penyedias as $penyedia)
                            <tr>
                                <td>{{ $penyedia->nama_penyedia }}</td>
                                <td>{{ $penyedia->rekening_bank }}</td>
                                <td>{{ $penyedia->npwp }}</td>
                                <td><a href="{{ route('penyedia.show', $penyedia) }}"
                                        class="btn btn-sm btn-info">Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada hasil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
