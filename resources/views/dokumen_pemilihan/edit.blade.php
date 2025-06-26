@extends('layouts.app')
@section('title', 'Edit Dokumen Pemilihan')

@section('content')
<div class="container">
    <h4>Edit Dokumen Pemilihan</h4>

    <form action="{{ route('dokumen-pemilihan.update', $dokumen->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('dokumen_pemilihan.partials.form', ['dokumen' => $dokumen])

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('dokumen-pemilihan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
