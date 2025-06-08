@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Penyedia</h3>

    <form action="{{ route('penyedia.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- input lainnya -->
    

        <div class="form-group mb-3">
            <label for="nama_penyedia">Nama Penyedia</label>
            <input type="text" name="nama_penyedia" class="form-control" value="{{ old('nama_penyedia') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="npwp">NPWP</label>
            <input type="text" name="npwp" class="form-control" value="{{ old('npwp') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="rekening">Rekening</label>
            <input type="text" name="rekening" class="form-control" value="{{ old('rekening') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="dokumen_npwp">Upload NPWP</label>
            <input type="file" name="dokumen_npwp" class="form-control-file">
        </div>

        <div class="form-group mb-3">
            <label for="dokumen_ktp">Upload KTP</label>
            <input type="file" name="dokumen_ktp" class="form-control-file">
        </div>

        <div class="form-group mb-3">
            <label for="dokumen_rekening_koran">Upload Rekening Koran</label>
            <input type="file" name="dokumen_rekening_koran" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penyedia.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
