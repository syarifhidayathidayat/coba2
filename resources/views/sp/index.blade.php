@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h4>Daftar SP dan Barang</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('sp.create') }}" class="btn btn-primary mb-3">Tambah SP</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor SP</th>
                    <th>Penyedia</th>
                    <th>Nama Paket</th>
                    <th>Tanggal</th>
                    <th>Total Kontrak</th>
                    <th>Mulai</th>
                    <th>Masa</th>
                    <th>Akhir</th>
                    <th>Metode</th>
                    <th>Total Pagu</th>
                    <th>Akun</th>
                    <th>Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sp as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nomor_sp }}</td>
                        <td>{{ $item->penyedia->nama_penyedia ?? '-' }}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ number_format($item->total_kontrak, 0, ',', '.') }}</td>
                        <td>{{ $item->mulai_pekerjaan }}</td>
                        <td>{{ $item->masa }} hari</td>
                        <td>{{ $item->akhir_pekerjaan }}</td>
                        <td>{{ $item->metode }}</td>
                        <td>{{ number_format($item->total_pagu, 0, ',', '.') }}</td>
                        <td>{{ $item->akun }}</td>
                        <td>
                            @if ($item->barangs->isEmpty())
                                <em>Belum ada</em>
                            @else
                                <ul class="mb-0">
                                    @foreach ($item->barangs as $barang)
                                        <li>{{ $barang->nama_barang }} ({{ $barang->qty }})</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('sp.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        
                            <form action="{{ route('sp.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus SP?')" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        
                            <a href="{{ route('barang.create', $item->id) }}" class="btn btn-sm btn-info" title="Tambah Barang">
                                <i class="fas fa-plus"></i>
                            </a>
                        </td>
                        
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
