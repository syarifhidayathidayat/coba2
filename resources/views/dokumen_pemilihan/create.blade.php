@extends('layouts.app')
@section('title', 'Tambah Dokumen Pemilihan')

@section('content')
<div class="container mt-3"> ">
    <h4>Tambah Dokumen Pemilihan – Pengadaan Langsung</h4>

    <form action="{{ route('dokumen-pemilihan.store') }}" method="POST">
        @csrf

        @include('dokumen_pemilihan.partials.undangan')
        @include('dokumen_pemilihan.partials.ba_pembukaan')
        @include('dokumen_pemilihan.partials.ba_klarifikasi')
        @include('dokumen_pemilihan.partials.ba_hasil')
        @include('dokumen_pemilihan.partials.nota_dinas')

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Dokumen</button>
            <a href="{{ route('dokumen-pemilihan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
