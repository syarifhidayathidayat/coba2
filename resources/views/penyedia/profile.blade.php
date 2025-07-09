@extends('layouts.app')

@section('title', 'Profil Penyedia')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Profil Penyedia</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('penyedia.profile.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                    <input type="text" name="nama_penyedia" id="nama_penyedia" class="form-control"
                        value="{{ old('nama_penyedia', $penyedia->nama_penyedia) }}">
                </div>
                <div class="mb-3">
                    <label for="nama_direktur_penyedia" class="form-label">Nama Direktur</label>
                    <input type="text" name="nama_direktur_penyedia" id="nama_direktur_penyedia" class="form-control"
                        value="{{ old('nama_direktur_penyedia', $penyedia->nama_direktur_penyedia) }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $penyedia->alamat) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
