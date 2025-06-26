@extends('layouts.app')
@section('title', 'Tambah Dokumen Pemilihan')

@section('content')
<div class="container">
    <h4>Tambah Dokumen Pemilihan</h4>

    <form action="{{ route('dokumen-pemilihan.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label>No. Undangan</label>
                <input type="text" name="undangan_nomor" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Tanggal Undangan</label>
                <input type="date" name="undangan_tanggal" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>HPS (Harga Perkiraan Sendiri)</label>
            <input type="number" name="hps" step="0.01" class="form-control" required>
        </div>

        {{-- Field tambahan lainnya menyusul secara bertahap --}}

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
