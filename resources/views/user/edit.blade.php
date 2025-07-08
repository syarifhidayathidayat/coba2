@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password Baru (opsional)</label>
                                <input type="password" name="password" class="form-control form-control-sm">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-sm">
                            </div>

                            @if (auth()->user()->hasRole('Admin'))
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-select form-select-sm" required>
                                        <option value="">-- Pilih Role --</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
