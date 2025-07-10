@extends('layouts.app')

@section('title', 'Profil Penyedia')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if ($basts->isNotEmpty())
                <div class="card mt-4">
                    <div class="card-header">
                        <strong>Riwayat BAST</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor BAST</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($basts as $bast)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bast->nomor_bast }}</td>
                                        <td>{{ $bast->tanggal_bast->format('d-m-Y') }}</td>
                                        <td>{{ ucfirst($bast->status) }}</td>
                                        <td>
                                            <a href="{{ route('bast.show', $bast->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-info mt-4 mb-0 text-center">
                    <i class="fas fa-info-circle"></i> Anda belum memiliki riwayat BAST.
                </div>
            @endif
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Edit Profil Penyedia</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('penyedia.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                                <input type="text" name="nama_penyedia" class="form-control"
                                    value="{{ old('nama_penyedia', $penyedia->nama_penyedia) }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_direktur_penyedia" class="form-label">Nama Direktur</label>
                                <input type="text" name="nama_direktur_penyedia" class="form-control"
                                    value="{{ old('nama_direktur_penyedia', $penyedia->nama_direktur_penyedia) }}">
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="text" name="telepon" class="form-control"
                                    value="{{ old('telepon', $penyedia->telepon) }}">
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
                                    value="{{ old('email', $penyedia->email) }}">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="rekening_bank" class="form-label">Rekening Bank</label>
                                        <input type="text" name="rekening_bank" class="form-control"
                                            value="{{ old('rekening_bank', $penyedia->rekening_bank) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="cabang_bank" class="form-label">Cabang Bank</label>
                                        <input type="text" name="cabang_bank" class="form-control"
                                            value="{{ old('cabang_bank', $penyedia->cabang_bank) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="rekening_atas_nama" class="form-label">Atas Nama</label>
                                        <input type="text" name="rekening_atas_nama" class="form-control"
                                            value="{{ old('rekening_atas_nama', $penyedia->rekening_atas_nama) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" name="npwp" class="form-control"
                                    value="{{ old('npwp', $penyedia->npwp) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control">{{ old('alamat', $penyedia->alamat) }}</textarea>
                    </div>

                    <!-- Upload Dokumen -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="dokumen_npwp" class="form-label">Upload NPWP</label>
                            <input type="file" name="dokumen_npwp" class="form-control">
                            @if ($penyedia->dokumen_npwp)
                                <p class="mt-1">
                                    <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}" target="_blank"
                                        title="Lihat NPWP">
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
                                    <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}" target="_blank"
                                        title="Lihat KTP">
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
                                    <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}" target="_blank"
                                        title="Lihat Rekening Koran">
                                        <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Profil</button>
                </form>
            </div>


        </div>
    </div>





@endsection
