@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Edit User</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password Baru (opsional)</label>
                    <input type="password" name="password" class="form-control form-control-sm">
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-sm">
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="foto" class="form-control form-control-sm">
                    @if ($user->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="img-thumbnail" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                {{-- Role (khusus admin) --}}
                @if (auth()->user()->hasRole('Admin'))
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select form-select-sm" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
