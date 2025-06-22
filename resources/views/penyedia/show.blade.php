@extends('layouts.app')

@section('title', 'Detail Penyedia')

@section('content')
<div class="container-fluid">
    <h2>Detail Penyedia</h2>

    <a href="{{ route('penyedia.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar</a>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nama Penyedia</dt>
                <dd class="col-sm-9">{{ $penyedia->nama_penyedia }}</dd>

                <dt class="col-sm-3">Nama Direktur</dt>
                <dd class="col-sm-9">{{ $penyedia->nama_direktur_penyedia }}</dd>

                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9">{{ $penyedia->alamat }}</dd>

                <dt class="col-sm-3">Telepon</dt>
                <dd class="col-sm-9">{{ $penyedia->telepon }}</dd>

                <dt class="col-sm-3">Website</dt>
                <dd class="col-sm-9">{{ $penyedia->website }}</dd>

                <dt class="col-sm-3">Fax</dt>
                <dd class="col-sm-9">{{ $penyedia->fax }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $penyedia->email }}</dd>

                <dt class="col-sm-3">Rekening Bank</dt>
                <dd class="col-sm-9">{{ $penyedia->rekening_bank }}</dd>

                <dt class="col-sm-3">Cabang Bank</dt>
                <dd class="col-sm-9">{{ $penyedia->cabang_bank }}</dd>

                <dt class="col-sm-3">Rekening A/n</dt>
                <dd class="col-sm-9">{{ $penyedia->rekening_atas_nama }}</dd>

                <dt class="col-sm-3">NPWP</dt>
                <dd class="col-sm-9">{{ $penyedia->npwp }}</dd>

                <dt class="col-sm-3">Dokumen NPWP</dt>
                <dd class="col-sm-9">
                    @if ($penyedia->dokumen_npwp)
                        <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}" target="_blank" class="text-danger">
                            <i class="fas fa-file-pdf fa-lg"></i> Lihat Dokumen
                        </a>
                    @else
                        -
                    @endif
                </dd>

                <dt class="col-sm-3">Dokumen KTP</dt>
                <dd class="col-sm-9">
                    @if ($penyedia->dokumen_ktp)
                        <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}" target="_blank" class="text-danger">
                            <i class="fas fa-file-pdf fa-lg"></i> Lihat Dokumen
                        </a>
                    @else
                        -
                    @endif
                </dd>

                <dt class="col-sm-3">Dokumen Rekening Koran</dt>
                <dd class="col-sm-9">
                    @if ($penyedia->dokumen_rekening_koran)
                        <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}" target="_blank" class="text-danger">
                            <i class="fas fa-file-pdf fa-lg"></i> Lihat Dokumen
                        </a>
                    @else
                        -
                    @endif
                </dd>
            </dl>
        </div>
    </div>
</div>
@endsection
