@extends('layouts.guest')

@section('content')
<div class="bg-body d-flex align-items-center justify-content-center min-vh-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">

            {{-- Logo & Judul --}}
            <div class="text-center mb-4">
              <i class="fa-solid fa-key fa-2x text-primary mb-2"></i>
              <h4 class="fw-bold mb-0">Lupa Password</h4>
              <small class="text-muted">Masukkan email kamu, kami akan kirimkan link reset</small>
            </div>

            {{-- Status --}}
            @if (session('status'))
              <div class="alert alert-success small">
                {{ session('status') }}
              </div>
            @endif

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

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="nama@domain.com"
                       required autofocus>
              </div>

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">
                  Kirim Link Reset
                </button>
              </div>

              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Kembali ke Login</a>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
