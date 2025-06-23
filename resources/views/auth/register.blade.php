@extends('layouts.guest')

@section('content')
<div class="bg-body d-flex align-items-center justify-content-center min-vh-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">

            {{-- Logo dan Judul --}}
            <div class="text-center mb-4">
              <i class="fa-solid fa-user-plus fa-2x text-primary mb-2"></i>
              <h4 class="fw-bold mb-0">Buat Akun Baru</h4>
              <small class="text-muted">Silakan isi data berikut</small>
            </div>

            {{-- Error --}}
            @if ($errors->any())
              <div class="alert alert-danger small">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{-- Form Register --}}
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required autofocus>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>
              </div>

              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-control" required>
              </div>

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Daftar</button>
              </div>

              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Sudah punya akun? Login</a>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
