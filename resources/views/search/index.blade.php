@extends('layouts.app')
@section('title', 'Hasil Pencarian')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Hasil Pencarian: <strong>"{{ $q }}"</strong></h5>
            <span class="badge bg-primary">Total:
                {{ $basts->count() + $sps->count() + $pegawais->count() + $penyedias->count() }} hasil</span>
        </div>

        {{-- BAST --}}
        @if ($basts->count())
            <div class="card mb-4">
                <div class="card-header">
                    <strong>BAST</strong> <span class="badge bg-info text-white">{{ $basts->count() }}</span>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nomor BAST</th>
                                <th>Nomor BAP</th>
                                <th>Penyedia</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($basts as $bast)
                                <tr>
                                    <td>{{ $bast->nomor_bast }}</td>
                                    <td>{{ $bast->nomor_bap }}</td>
                                    <td>{{ $bast->sp->penyedia->nama_penyedia ?? '-' }}</td>
                                    <td><a href="{{ route('bast.show', $bast) }}"
                                            class="btn btn-sm btn-outline-primary">Lihat</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- SP --}}
        @if ($sps->count())
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Surat Pesanan (SP)</strong> <span class="badge bg-info text-white">{{ $sps->count() }}</span>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nomor SP</th>
                                <th>Nama Paket</th>
                                <th>Penyedia</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sps as $sp)
                                <tr>
                                    <td>{{ $sp->nomor_sp }}</td>
                                    <td>{{ $sp->nama_paket }}</td>
                                    <td>{{ $sp->penyedia->nama_penyedia ?? '-' }}</td>
                                    <td><a href="{{ route('sp.show', $sp->id) }}"
                                            class="btn btn-sm btn-outline-primary">Lihat</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Pegawai --}}
        @if ($pegawais->count())
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Pegawai</strong> <span class="badge bg-info text-white">{{ $pegawais->count() }}</span>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->nip }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Penyedia --}}
        @if ($penyedias->count())
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Penyedia</strong> <span class="badge bg-info text-white">{{ $penyedias->count() }}</span>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Penyedia</th>
                                <th>Rekening Bank</th>
                                <th>NPWP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyedias as $p)
                                <tr>
                                    <td>{{ $p->nama_penyedia }}</td>
                                    <td>{{ $p->rekening_bank }}</td>
                                    <td>{{ $p->npwp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if ($barangs->count())
            <div class="card mb-4">
                <div class="card-header">Barang</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($barangs as $barang)
                            <li class="list-group-item">
                                <strong>{{ $barang->nama_barang }}</strong> (Rp{{ number_format($barang->harga) }}) <br>

                                @if ($barang->sp)
                                    <small class="text-muted">
                                        SP: {{ $barang->sp->nomor_sp }} |
                                        Paket: {{ $barang->sp->nama_paket }} |
                                        Penyedia: {{ $barang->sp->penyedia->nama_penyedia ?? '-' }}
                                    </small><br>
                                @endif

                                @if ($barang->penempatan)
                                    <small class="text-muted">Penempatan: {{ $barang->penempatan->nama ?? '-' }}</small>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif



        {{-- Tidak ada hasil --}}
        @if ($basts->isEmpty() && $sps->isEmpty() && $pegawais->isEmpty() && $penyedias->isEmpty())
            <div class="alert alert-warning text-center">
                Tidak ditemukan hasil pencarian untuk "<strong>{{ $q }}</strong>".
            </div>
        @endif
    </div>
@endsection
