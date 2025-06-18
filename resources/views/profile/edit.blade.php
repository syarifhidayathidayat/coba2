@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profil</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label>Password Baru (kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection