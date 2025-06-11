@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Tambah Penyedia</h3>

    <form action="{{ route('penyedia.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                    <input type="text" name="nama_penyedia" class="form-control" value="{{ old('nama_penyedia') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_direktur_penyedia" class="form-label">Nama Direktur</label>
                    <input type="text" name="nama_direktur_penyedia" class="form-control" value="{{ old('nama_direktur_penyedia') }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ old('website') }}" required>
                </div>

                <div class="mb-3">
                    <label for="fax" class="form-label">Fax</label>
                    <input type="text" name="fax" class="form-control" value="{{ old('fax') }}" required>
                </div>
            </div>

            <!-- Kolom kanan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="rekening_bank" class="form-label">Rekening Bank</label>
                    <input type="text" name="rekening_bank" class="form-control" value="{{ old('rekening_bank') }}" required>
                </div>

                <div class="mb-3">
                    <label for="cabang_bank" class="form-label">Cabang Bank</label>
                    <input type="text" name="cabang_bank" class="form-control" value="{{ old('cabang_bank') }}" required>
                </div>

                <div class="mb-3">
                    <label for="rekening_atas_nama" class="form-label">Rekening Atas Nama</label>
                    <input type="text" name="rekening_atas_nama" class="form-control" value="{{ old('rekening_atas_nama') }}" required>
                </div>

                <div class="mb-3">
                    <label for="npwp" class="form-label">NPWP</label>
                    <input type="text" name="npwp" class="form-control" value="{{ old('npwp') }}" required>
                </div>
            </div>
        </div>

        <!-- Dokumen Upload -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="dokumen_npwp" class="form-label">Upload NPWP</label>
                    <input type="file" name="dokumen_npwp" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="dokumen_ktp" class="form-label">Upload KTP</label>
                    <input type="file" name="dokumen_ktp" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="dokumen_rekening_koran" class="form-label">Upload Rekening Koran</label>
                    <input type="file" name="dokumen_rekening_koran" class="form-control">
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penyedia.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
