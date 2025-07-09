@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" id="roleSelect" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Form Tambahan untuk Role Penyedia --}}
            <div id="penyediaFields" style="display: none;" class="mt-3 border-top pt-3">
                <div class="form-group">
                    <label>Nama Penyedia</label>
                    <input type="text" name="nama_penyedia" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Direktur</label>
                    <input type="text" name="nama_direktur_penyedia" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            const penyediaFields = document.getElementById('penyediaFields');

            roleSelect.addEventListener('change', function() {
                if (roleSelect.value === 'Penyedia') {
                    penyediaFields.style.display = 'block';
                } else {
                    penyediaFields.style.display = 'none';
                }
            });
        });
    </script>
@endpush
