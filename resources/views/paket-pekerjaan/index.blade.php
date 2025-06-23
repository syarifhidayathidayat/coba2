@extends('layouts.admin')
@section('title', 'Daftar Paket Pekerjaan')
@section('content')
<div class="container-fluid">
    <div>
        <h1 class="h3 text-gray-800">{{ $pageTitle ?? 'Daftar Paket Pekerjaan' }}</h1>
        <x-breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Surat Pesanan', 'url' => route('sp.index')],
            ['label' => 'Paket Pekerjaan', 'active' => true],
        ]" />
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    
                    <a href="{{ route('paket-pekerjaan.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Paket Pekerjaan
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>MAX</th>
                                    <th>Kode RUP</th>
                                    <th>Pagu</th>
                                    <th>Qty</th>
                                    <th>Outstanding Kontrak</th>
                                    <th>Realisasi</th>
                                    <th>Sisa Pagu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paketPekerjaan as $key => $paket)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $paket->nama_paket }}</td>
                                    <td>{{ $paket->max }}</td>
                                    <td>{{ $paket->kode_rup }}</td>
                                    <td>Rp {{ number_format($paket->pagu, 0, ',', '.') }}</td>
                                    <td>{{ $paket->qty }}</td>
                                    <td>Rp {{ number_format($paket->outstanding_kontrak, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($paket->realisasi, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($paket->sisa_pagu, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex gap-4">
                                            <a href="{{ route('paket-pekerjaan.show', $paket->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('paket-pekerjaan.edit', $paket->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('paket-pekerjaan.destroy', $paket->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $paketPekerjaan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 