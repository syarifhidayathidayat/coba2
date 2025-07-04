@extends('layouts.guest')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100" style="background-color: #f4f5f7;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 rounded-3">
          <div class="card-body p-5">

            {{-- Logo dan Judul --}}
            <div class="text-center mb-4">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="max-height: 60px;" class="mb-3">
                {{-- <h2 class="fw-bold">Login</h2> --}}
                <p class="text-muted">Sign In to your account</p>
              </div>


            {{-- Alert Error --}}
            @if ($errors->any())
              <div class="alert alert-danger small">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
              @csrf

              {{-- Username --}}
              <div class="mb-3 input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       placeholder="Username"
                       value="{{ old('email') }}"
                       required autofocus>
              </div>

              {{-- Password --}}
              <div class="mb-3 input-group">
                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       placeholder="Password"
                       required>
              </div>

              {{-- Remember Me --}}
              <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
              </div>

              {{-- Tombol Login --}}
              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-success">Login</button>
              </div>


              {{-- Lupa Password --}}
              @if (Route::has('password.request'))
              <div class="text-center">
                <a class="text-decoration-none small" href="{{ route('password.request') }}">
                  Forgot password?
                </a>
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
