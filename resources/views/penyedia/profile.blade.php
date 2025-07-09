@extends('layouts.app')
@section('title', 'Profil Penyedia')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Profil Penyedia</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('penyedia.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Nama Penyedia --}}
                <div class="mb-3">
                    <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                    <input type="text" name="nama_penyedia" id="nama_penyedia" class="form-control"
                        value="{{ old('nama_penyedia', $penyedia->nama_penyedia) }}">
                </div>
                {{-- Nama Direktur --}}
                <div class="mb-3">
                    <label for="nama_direktur_penyedia" class="form-label">Nama Direktur</label>
                    <input type="text" name="nama_direktur_penyedia" id="nama_direktur_penyedia" class="form-control"
                        value="{{ old('nama_direktur_penyedia', $penyedia->nama_direktur_penyedia) }}">
                </div>
                {{-- Alamat --}}
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $penyedia->alamat) }}</textarea>
                </div>
                {{-- Telepon --}}
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control"
                        value="{{ old('telepon', $penyedia->telepon) }}">
                </div>
                {{-- Email Perusahaan --}}
                <div class="mb-3">
                    <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                    <input type="email" name="email_perusahaan" id="email_perusahaan" class="form-control"
                        value="{{ old('email_perusahaan', $penyedia->email_perusahaan) }}">
                </div>
                {{-- Website --}}
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" name="website" id="website" class="form-control"
                        value="{{ old('website', $penyedia->website) }}">
                </div>
                {{-- NPWP --}}
                <div class="mb-3">
                    <label for="npwp" class="form-label">NPWP</label>
                    <input type="text" name="npwp" id="npwp" class="form-control"
                        value="{{ old('npwp', $penyedia->npwp) }}">
                </div>
                {{-- Rekening Bank --}}
                <div class="mb-3">
                    <label for="rekening_bank" class="form-label">Rekening Bank</label>
                    <input type="text" name="rekening_bank" id="rekening_bank" class="form-control"
                        value="{{ old('rekening_bank', $penyedia->rekening_bank) }}">
                </div>
                {{-- Cabang Bank --}}
                <div class="mb-3">
                    <label for="cabang_bank" class="form-label">Cabang Bank</label>
                    <input type="text" name="cabang_bank" id="cabang_bank" class="form-control"
                        value="{{ old('cabang_bank', $penyedia->cabang_bank) }}">
                </div>
                {{-- Rekening Atas Nama --}}
                <div class="mb-3">
                    <label for="rekening_atas_nama" class="form-label">Rekening Atas Nama</label>
                    <input type="text" name="rekening_atas_nama" id="rekening_atas_nama" class="form-control"
                        value="{{ old('rekening_atas_nama', $penyedia->rekening_atas_nama) }}">
                </div>
                {{-- Dokumen NPWP --}}
                <div class="mb-3">
                    <label for="dokumen_npwp" class="form-label">Dokumen NPWP</label>
                    <input type="file" name="dokumen_npwp" id="dokumen_npwp" class="form-control">
                    @if ($penyedia->dokumen_npwp)
                        <small class="text-muted">Tersimpan: <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}"
                                target="_blank">Lihat</a></small>
                    @endif
                </div>
                {{-- Dokumen KTP --}}
                <div class="mb-3">
                    <label for="dokumen_ktp" class="form-label">Dokumen KTP</label>
                    <input type="file" name="dokumen_ktp" id="dokumen_ktp" class="form-control">
                    @if ($penyedia->dokumen_ktp)
                        <small class="text-muted">Tersimpan: <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}"
                                target="_blank">Lihat</a></small>
                    @endif
                </div>
                {{-- Dokumen Rekening Koran --}}
                <div class="mb-3">
                    <label for="dokumen_rekening_koran" class="form-label">Dokumen Rekening Koran</label>
                    <input type="file" name="dokumen_rekening_koran" id="dokumen_rekening_koran"
                        class="form-control">
                    @if ($penyedia->dokumen_rekening_koran)
                        <small class="text-muted">Tersimpan: <a
                                href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}"
                                target="_blank">Lihat</a></small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
