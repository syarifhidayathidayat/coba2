@extends('layouts.app')
@section('title', 'Daftar Dokumen Pemilihan')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
            <h3>Dokumen Pemilihan - Pengadaan Langsung</h3>
            <a href="{{ route('dokumen-pemilihan.create') }}" class="btn btn-primary">+ Tambah Dokumen</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table id="tabel-dok_pemilihan" class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>No Undangan</th>
                            <th>Tanggal</th>
                            <th>HPS</th>
                            <th>No BA Hasil</th>
                            <th>Uraian Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dokumens as $i => $dok)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $dok->undangan_nomor }}</td>
                                <td>{{ \Carbon\Carbon::parse($dok->undangan_tanggal)->format('d-m-Y') }}</td>
                                <td>Rp {{ number_format($dok->hps, 0, ',', '.') }}</td>
                                <td>{{ $dok->ba_hasil_nomor }}</td>
                                <td>{{ $dok->uraian_paket }}</td>
                                {{-- <td>{{ $dok->nota_dinas_nomor }}</td> --}}
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada dokumen pemilihan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#tabel-dok_pemilihan').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                searching: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                // order: [
                //     [3, 'desc']
                // ],
            });
        });
    </script>
@endpush
