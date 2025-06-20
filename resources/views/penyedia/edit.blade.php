@extends('layouts.app')

@section('title', 'Edit Penyedia')
@section('content')
<div class="container-fluid">
    <h2>Edit Penyedia</h2>

    <form action="{{ route('penyedia.update', $penyedia) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                    <input type="text" name="nama_penyedia" class="form-control"
                        value="{{ old('nama_penyedia', $penyedia->nama_penyedia) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_direktur_penyedia" class="form-label">Nama Direktur</label>
                    <input type="text" name="nama_direktur_penyedia" class="form-control"
                        value="{{ old('nama_direktur_penyedia', $penyedia->nama_direktur_penyedia) }}" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control"
                        value="{{ old('telepon', $penyedia->telepon) }}" required>
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" name="website" class="form-control"
                        value="{{ old('website', $penyedia->website) }}">
                </div>

                <div class="mb-3">
                    <label for="fax" class="form-label">Fax</label>
                    <input type="text" name="fax" class="form-control"
                        value="{{ old('fax', $penyedia->fax) }}">
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $penyedia->email) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="rekening_bank" class="form-label">Rekening Bank</label>
                            <input type="text" name="rekening_bank" class="form-control"
                                value="{{ old('rekening_bank', $penyedia->rekening_bank) }}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="cabang_bank" class="form-label">Cabang Bank</label>
                            <input type="text" name="cabang_bank" class="form-control"
                                value="{{ old('cabang_bank', $penyedia->cabang_bank) }}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="rekening_atas_nama" class="form-label">Atas Nama</label>
                            <input type="text" name="rekening_atas_nama" class="form-control"
                                value="{{ old('rekening_atas_nama', $penyedia->rekening_atas_nama) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="npwp" class="form-label">NPWP</label>
                    <input type="text" name="npwp" class="form-control"
                        value="{{ old('npwp', $penyedia->npwp) }}" required>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat', $penyedia->alamat) }}</textarea>
        </div>

        <!-- Upload Dokumen -->
        <div class="row">
            <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
                <label for="dokumen_rekening_koran" class="form-label">Upload Rekening Koran</label>
                <input type="file" name="dokumen_rekening_koran" class="form-control">
                @if ($penyedia->dokumen_rekening_koran)
                    <p class="mt-1">
                        <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}" target="_blank" title="Lihat Rekening Koran">
                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                        </a>
                    </p>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('penyedia.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
