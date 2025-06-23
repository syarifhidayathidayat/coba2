@extends('layouts.guest')

@section('content')
<div class="bg-body d-flex align-items-center justify-content-center min-vh-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">

            {{-- Logo dan Judul --}}
            <div class="text-center mb-4">
              <i class="fa-solid fa-shield-halved fa-2x text-primary mb-2"></i>
              <h4 class="fw-bold mb-0">Selamat Datang</h4>
              <small class="text-muted">Silakan login untuk melanjutkan</small>
            </div>

            {{-- Alert Error --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0 small">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       placeholder="nama@domain.com"
                       required
                       autofocus
                       value="{{ old('email') }}">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password"
                       name="password"
                       placeholder="••••••••"
                       required>
              </div>

              <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
              </div>

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Masuk</button>
              </div>

              @if (Route::has('password.request'))
              <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
              </div>
              @endif

            </form>
          </div>
        </div>

        {{-- Register --}}
        @if (Route::has('register'))
        <div class="text-center mt-3 small">
          Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </div>
        @endif

      </div>
    </div>
  </div>
</div>
@endsection
