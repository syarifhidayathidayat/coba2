@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <strong><i class="fas fa-user-edit me-2"></i>Edit Profil</strong>
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-light text-primary">
                <i class="fas fa-times me-1"></i>Batal
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf

                {{-- Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control form-control-sm">
                    @if ($user->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $user->foto) }}" class="img-thumbnail" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control form-control-sm"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                {{-- Password Baru --}}
                <div class="mb-3">
                    <label class="form-label">Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
                    <input type="password" name="password" class="form-control form-control-sm">
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-sm">
                </div>

                {{-- Tombol Simpan di kiri bawah --}}
                <div class="d-flex justify-content-start">
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
