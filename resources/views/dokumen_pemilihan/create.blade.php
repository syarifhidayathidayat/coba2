@extends('layouts.app')
@section('title', 'Tambah Dokumen Pemilihan')
@section('content')
    <div class="container-fluid mt-3">
        <h4>Tambah Dokumen Pemilihan – Pengadaan Langsung</h4>
        <form action="{{ route('dokumen-pemilihan.store') }}" method="POST">
            @csrf
            @include('dokumen_pemilihan.partials.undangan')
            @include('dokumen_pemilihan.partials.ba_pembukaan')
            @include('dokumen_pemilihan.partials.ba_klarifikasi')
            @include('dokumen_pemilihan.partials.ba_hasil')
            @include('dokumen_pemilihan.partials.nota_dinas')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary mb-3">Simpan Dokumen</button>
                <a href="{{ route('dokumen-pemilihan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputUndangan = document.querySelector('input[name="undangan_nomor"]');
    const inputBAPembukaan = document.querySelector('input[name="ba_pembukaan_nomor"]');
    const inputBAKlarifikasi = document.querySelector('input[name="ba_klarifikasi_nomor"]');
    const inputBAHasil = document.querySelector('input[name="ba_hasil_nomor"]');
    const inputNotaDinas = document.querySelector('input[name="nota_dinas_nomor"]');
    function incrementNomor(nomor, tambah = 1) {
        const parts = nomor.split('/');
        const current = parseInt(parts[3]); // index ke-3 adalah "130"
        if (!isNaN(current)) {
            parts[3] = current + tambah;
            return parts.join('/');
        }
        return nomor;
    }
    function setNomorJikaDummy() {
        const nomor = inputUndangan.value;
        if (nomor.length > 0) {
            if (inputBAPembukaan.value.includes('xxxxx')) {
                inputBAPembukaan.value = incrementNomor(nomor, 1);
            }
            if (inputBAKlarifikasi.value.includes('xxxxx')) {
                inputBAKlarifikasi.value = incrementNomor(nomor, 2);
            }
            if (inputBAHasil.value.includes('xxxxx')) {
                inputBAHasil.value = incrementNomor(nomor, 3);
            }
            if (inputNotaDinas.value.includes('xxxxx')) {
                inputNotaDinas.value = incrementNomor(nomor, 4);
            }
        }
    }
    inputUndangan.addEventListener('input', setNomorJikaDummy);
    setNomorJikaDummy();
});
</script>
@endpush
