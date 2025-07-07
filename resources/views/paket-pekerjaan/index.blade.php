@extends('layouts.app')
@section('title', 'Daftar Paket Pekerjaan')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap align-items-center">
            <div>
                <h4>{{ $pageTitle ?? 'Daftar Paket Pekerjaan' }} TA <strong>{{ $tahun }}</strong></h4>
                <x-breadcrumb :items="[
                    ['label' => 'Dashboard', 'url' => route('dashboard')],
                    ['label' => 'Surat Pesanan', 'url' => route('sp.index')],
                    ['label' => 'Paket Pekerjaan', 'active' => true],
                ]" />
            </div>
            <div class="btn-group mt-3 mt-md-0">
                <a href="{{ route('paket-pekerjaan.create') }}" class="btn btn-primary">+ Tambah Dokumen</a>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="tabel-paket_pekerjaan"class="table table-bordered table-hover">
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
                                    @foreach ($paketPekerjaan as $key => $paket)
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
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                        id="paketActionDropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fas fa-cog"></i> Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="paketActionDropdown">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('paket-pekerjaan.show', $paket->id) }}">
                                                                <i class="fas fa-eye me-2"></i> Detail
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('paket-pekerjaan.edit', $paket->id) }}">
                                                                <i class="fas fa-edit me-2"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('paket-pekerjaan.destroy', $paket->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    <i class="fas fa-trash me-2"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tabel-paket_pekerjaan').DataTable({
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
