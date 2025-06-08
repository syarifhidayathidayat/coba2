@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Edit Penyedia</h2>

        <form action="{{ route('penyedia.update', $penyedia) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                <input type="text" name="nama_penyedia" class="form-control"
                    value="{{ old('nama_penyedia', $penyedia->nama_penyedia) }}" required>
            </div>

            <div class="mb-3">
                <label for="npwp" class="form-label">NPWP</label>
                <input type="text" name="npwp" class="form-control" value="{{ old('npwp', $penyedia->npwp) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="rekening" class="form-label">Rekening</label>
                <input type="text" name="rekening" class="form-control"
                    value="{{ old('rekening', $penyedia->rekening) }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $penyedia->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="dokumen_npwp" class="form-label">Upload NPWP</label>
                <input type="file" name="dokumen_npwp" class="form-control">
                @if ($penyedia->dokumen_npwp)
                    <p class="mt-1">
                        <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}" target="_blank" title="Lihat NPWP">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    </p>
                @endif
            </div>

            <div class="mb-3">
                <label for="dokumen_ktp" class="form-label">Upload KTP</label>
                <input type="file" name="dokumen_ktp" class="form-control">
                @if ($penyedia->dokumen_ktp)
                    <p class="mt-1">
                        <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}" target="_blank" title="Lihat KTP">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    </p>
                @endif
            </div>

            <div class="mb-3">
                <label for="dokumen_rekening_koran" class="form-label">Upload Rekening Koran</label>
                <input type="file" name="dokumen_rekening_koran" class="form-control">
                @if ($penyedia->dokumen_rekening_koran)
                    <p class="mt-1">
                        <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}" target="_blank"
                            title="Lihat Rekening Koran">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    </p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('penyedia.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
