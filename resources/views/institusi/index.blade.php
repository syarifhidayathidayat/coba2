@extends('layouts.app')

@section('title', 'Institusi & Pejabat')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Institusi & Pejabat</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('institusi.create') }}" class="btn btn-primary mb-3">+ Tambah Institusi</a>
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Periode</th>
                            <th>PPK 52</th>
                            <th>PPK 53</th>
                            <th>Pejabat Pengadaan 52</th>
                            <th>Pejabat Pengadaan 53</th>
                            <th>Bendahara</th>
                            <th>DIPA</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($institusis as $i => $institusi)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <!-- <td>{{ $institusi->nama_institusi }}</td> -->
                                <!-- <td>{{ $institusi->alamat }}</td> -->
                                <td>
                                    @if ($institusi->tanggal_mulai && $institusi->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($institusi->tanggal_mulai)->format('d-m-Y') }} s/d
                                        {{ \Carbon\Carbon::parse($institusi->tanggal_selesai)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $institusi->nama_ppk_52 }}<br><small>{{ $institusi->nip_ppk_52 }}</small></td>
                                <td>{{ $institusi->nama_ppk_53 }}<br><small>{{ $institusi->nip_ppk_53 }}</small></td>
                                <td>{{ $institusi->nama_pejabat_pengadaan_52 }}<br><small>{{ $institusi->nip_pejabat_pengadaan_52 }}</small>
                                </td>
                                <td>{{ $institusi->nama_pejabat_pengadaan_53 }}<br><small>{{ $institusi->nip_pejabat_pengadaan_53 }}</small>
                                </td>
                                <td>{{ $institusi->nama_bendahara }}<br><small>{{ $institusi->nip_bendahara }}</small>
                                </td>
                                <td>{{ $institusi->dipa }}<br><small>
                                        @if ($institusi->sp_dipa)
                                            <a href="{{ asset('storage/' . $institusi->sp_dipa) }}" target="_blank">
                                                <i class="fas fa-eye"></i> Lihat SP DIPA
                                            </a>
                                        @else
                                            <small class="text-muted">Belum diupload</small>
                                        @endif

                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="{{ route('institusi.edit', $institusi) }}" class="btn btn-sm btn-warning w-100" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                        
                                                <form action="{{ route('institusi.destroy', $institusi) }}" method="POST"
                                                      onsubmit="return confirm('Hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger w-100" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                            </tr>
                        @endforeach
                        @if ($institusis->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Data kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
