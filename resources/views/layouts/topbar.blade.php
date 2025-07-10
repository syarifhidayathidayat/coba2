<header class="header header-sticky mb-4" id="main-header">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        {{-- Sidebar Toggle --}}
        <button class="header-toggler px-md-0 me-3" type="button" data-coreui-toggle="sidebar" aria-controls="sidebar">
            <i class="fas fa-bars"></i>
        </button>
        {{-- Brand --}}
        <a class="header-brand d-md-none fw-bold text-decoration-none" href="#">
            {{ config('app.name', 'Pengadaan') }}
        </a>
        {{-- Horizontal Menu (Optional) --}}
        <ul class="header-nav d-none d-md-flex">
            {{-- <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li> --}}
            <li class="nav-item d-none d-md-block me-3">
                <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                    <input class="form-control form-control-sm me-2" type="search" name="q"
                        value="{{ request('q') }}" placeholder="Cari BAST, SP, Pegawai, Penyedia..."
                        aria-label="Search">
                    <button class="btn btn-sm btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </li>


        </ul>
        {{-- Right Menu --}}
        <ul class="header-nav ms-auto d-flex align-items-center">

            {{-- <li class="nav-item d-flex align-items-center me-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" id="darkModeToggle">
                    <label class="form-check-label ms-2" for="darkModeToggle" style="font-size: 0.875rem;">
                        Dark
                    </label>
                </div>
            </li> --}}
            {{-- Notifications --}}
            {{-- <li class="nav-item position-relative me-3 d-none d-md-block">
                <a class="nav-link" href="#">
                    <i class="fas fa-bell"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
                </a>
            </li> --}}

            {{-- Tahun Anggaran --}}
            <li class="nav-item me-3 d-none d-md-block">
                <form method="POST" action="{{ route('dashboard.setTahun') }}"
                    class="d-flex align-items-center bg-primary bg-opacity-10 rounded px-2 py-1 shadow-sm">
                    @csrf
                    <input type="hidden" name="redirect_to" value="{{ url()->full() }}">
                    <label for="tahun" class="form-label me-2 mb-0 text-primary fw-semibold"
                        style="font-size: 0.875rem;">
                        <i class="fas fa-calendar-alt me-1"></i> TA
                    </label>
                    <select name="tahun" id="tahun"
                        class="form-select form-select-sm border-primary text-primary fw-bold"
                        style="width: auto; min-width: 90px;" onchange="this.form.submit()">
                        @for ($i = now()->year; $i >= 2018; $i--)
                            <option value="{{ $i }}"
                                {{ session('tahun', now()->year) == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </form>
            </li>

            {{-- User Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link py-0 px-2 d-flex align-items-center" href="#" role="button"
                    data-coreui-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md me-2" style="width: 40px; height: 40px;">
                        @php $authUser = auth()->user(); @endphp
                        <img class="avatar-img rounded-circle"
                            src="{{ $authUser->foto ? asset('storage/' . $authUser->foto) : asset('img/undraw_profile.svg') }}"
                            alt="User" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="d-none d-md-block text-start">
                        <div class="fw-semibold small">{{ auth()->user()->name }}</div>
                        <div class="text-muted small">{{ auth()->user()->getRoleNames()->first() ?? '-' }}</div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end pt-0">
                    <li class="dropdown-header bg-light fw-bold text-uppercase">Akun</li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="fas fa-user me-2"></i> Profil
                        </a></li>
                    <li><a class="dropdown-item" href="{{ route('user.edit', auth()->user()->id) }}">
                            <i class="fas fa-cogs me-2"></i> Pengaturan
                        </a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-coreui-toggle="dropdown"]').forEach(el => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                coreui.Dropdown.getOrCreateInstance(el).toggle();
            });
        });
    });
</script>
