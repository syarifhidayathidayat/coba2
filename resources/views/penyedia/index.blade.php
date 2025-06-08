@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Daftar Penyedia</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('penyedia.create') }}" class="btn btn-primary mb-3">Tambah Penyedia</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyedia</th>
                <th>NPWP</th>
                <th>Rekening</th>
                <th>Alamat</th>
                <th>NPWP Doc</th>
                <th>KTP Doc</th>
                <th>Rek. Koran Doc</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penyedias as $index => $penyedia)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $penyedia->nama_penyedia }}</td>
                <td>{{ $penyedia->npwp }}</td>
                <td>{{ $penyedia->rekening }}</td>
                <td>{{ $penyedia->alamat }}</td>

                {{-- Tampilkan link file jika tersedia --}}
                <td>
                    @if($penyedia->dokumen_npwp)
                        <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}" target="_blank" title="Lihat NPWP">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($penyedia->dokumen_ktp)
                        <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}" target="_blank" title="Lihat KTP">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($penyedia->dokumen_rekening_koran)
                        <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}" target="_blank" title="Lihat Rekening Koran">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    @else
                        -
                    @endif
                </td>

                <td>
                    <a href="{{ route('penyedia.edit', $penyedia->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('penyedia.destroy', $penyedia->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
