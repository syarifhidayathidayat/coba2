@extends('layouts.app')

@section('title', 'Daftar SP dan Barang')

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <div>
                    <h1 class="h3 text-gray-800">{{ $pageTitle ?? 'Judul Halaman' }}</h1>
                    <x-breadcrumb :items="[
                        ['label' => 'Dashboard', 'url' => route('dashboard')],
                        ['label' => 'Surat Pesanan', 'url' => route('sp.index')],
                    ]" />
                </div>
        
                <div class="btn-group mt-3 mt-md-0" role="group">
                    @if (request('belum_bast'))
                        <a href="{{ route('sp.index') }}" class="btn btn-outline-secondary btn-sm">Tampilkan Semua</a>
                    @else
                        <a href="{{ route('sp.index', ['belum_bast' => 1]) }}" class="btn btn-primary btn-sm">Tampilkan SP Belum BAST</a>
                    @endif
        
                    <a href="{{ route('sp.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah SP
                    </a>
        
                    <a href="{{ route('barang.semua') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-shopping-cart"></i> Lihat Semua Barang
                    </a>
                </div>
            </div>
        </div>
        
        

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered " id="tabel-sp">
            <thead>
                <tr>
                    <!-- <th>No</th> -->
                    <th>Status</th>
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
                        <!-- <td>{{ $index + 1 }}</td> -->
                        @php
                            $color = match ($sp->status_label) {
                                'SP Dibuat' => 'success',
                                'BAST Dibuat' => 'warning',
                                'BAST Dicetak' => 'info',
                                'Sudah Dibayar' => 'danger',
                                default => 'dark',
                            };
                        @endphp
                        <td><span class="badge bg-{{ $color }} text-white">{{ $sp->status_label }}</span></td>
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
                            {{ $sp->barangs->sum('qty') }} ({{ $sp->barangs->groupBy('nama_barang')->count() }} jenis)
                            <a href="{{ route('sp.show', $sp->id) }}" class="btn btn-sm btn-info ms-2"
                                title="Lihat Detail">
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

                            @if (!$sp->bast)
                                <a href="{{ route('bast.create', $sp->id) }}" class="btn btn-sm btn-success"
                                    title="Buat BAST">
                                    <i class="fas fa-plus"></i> BAST
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
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endpush
