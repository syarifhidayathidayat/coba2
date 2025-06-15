@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h4>Daftar SP dan Barang</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('sp.create') }}" class="btn btn-primary mb-3">Tambah SP</a>
        <a href="{{ route('barang.semua') }}" class="btn btn-primary mb-3">
            <i class="fas fa-box"></i> Lihat Semua Barang
        </a>

        <table class="table table-bordered " id="tabel-sp">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor SP</th>
                    <th>Penyedia</th>
                    <th>Nama Paket</th>
                    <th>Tanggal</th>
                    <th>Total Kontrak</th>
                    <th>Mulai</th>
                    <th>Day</th>
                    <th>Akhir</th>
                    <th>Metode</th>
                    <!--<th>Total Pagu</th>-->
                    <th>Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sps as $index => $sp)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sp->nomor_sp }}</td>
                        <td>{{ $sp->penyedia->nama_penyedia ?? '-' }}</td>
                        <td>{{ $sp->nama_paket }}</td>
                        <td>{{ $sp->tanggal }}</td>
                        <td>Rp {{ number_format($sp->total_kontrak, 0, ',', '.') }}</td>

                        <td>{{ $sp->mulai_pekerjaan }}</td>
                        <td>{{ $sp->masa }} </td>
                        <td>{{ \Carbon\Carbon::parse($sp->akhir_pekerjaan)->format('d-m-Y') }}</td>
                        <td>{{ $sp->metode }}</td>
                        <!--<td>{{ number_format($sp->total_pagu, 0, ',', '.') }}</td>-->
                        <td>
                            {{ $sp->barangs->count() }}
                            <a href="{{ route('sp.show', $sp->id) }}" class="btn btn-sm btn-info ms-2" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>

                        <td class="text-nowrap">
                            <a href="{{ route('sp.edit', $sp->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('sp.destroy', $sp->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus SP?')" class="btn btn-sm btn-danger"
                                    title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                            <a href="{{ route('barang.create', $sp->id) }}" class="btn btn-sm btn-info"
                                title="Tambah Barang">
                                <i class="fas fa-plus"></i>
                            </a>

                            @if(!$sp->bast)
                            <a href="{{ route('bast.create', $sp->id) }}" class="btn btn-sm btn-success"
                                title="Buat BAST">
                                <i class="fas fa-file-alt"></i> BAST
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabel-sp').DataTable({
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
