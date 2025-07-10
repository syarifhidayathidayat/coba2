@extends('layouts.app')
@section('title', 'Daftar BAST')
@section('content')
    <div class="container-fluid">

        <h3>{{ $pageTitle ?? 'Surat Pesanan' }}</h3>



        <div class="card">
            <div class="card-body">
                <table id="tabel-bast" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor SP</th>
                            <th>Nomor BAP</th>
                            <th>Nomor BAST</th>
                            <th>Nomor BAPEM</th>
                            <th>Nomor Kwitansi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($basts as $index => $bast)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $bast->sp->nomor_sp }}</td>
                                <td>{{ $bast->nomor_bap }}</td>
                                <td>{{ $bast->nomor_bast }}</td>
                                <td>{{ $bast->nomor_bapem }}</td>
                                <td>{{ $bast->no_kwitansi }}</td>
                                <td>{{ $bast->tanggal_bast->format('d-m-Y') }}</td>
                                <td>{{ ucfirst($bast->status) }}</td>
                                <td>
                                    <a href="{{ route('bast.show', $bast->id) }}" class="btn btn-sm btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            $('#tabel-bast').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                searching: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [4, 'desc']
                ],
            });
        });
    </script>
@endpush
