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
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
        </ul>
        {{-- Right Menu --}}
        <ul class="header-nav ms-auto d-flex align-items-center">
            {{-- Search --}}
            <li class="nav-item d-none d-md-block me-3">
                <form action="{{ route('barang.semua') }}" method="GET" class="input-group input-group-sm">
                    <input type="text" name="q" class="form-control" placeholder="Cari barang...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </li>
            {{-- Notifications --}}
            <li class="nav-item position-relative me-3 d-none d-md-block">
                <a class="nav-link" href="#">
                    <i class="fas fa-bell"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
                </a>
            </li>
            {{-- User Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link py-0 px-2 d-flex align-items-center" href="#" role="button"
                    data-coreui-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md me-2">
                        <img class="avatar-img" src="{{ asset('img/undraw_profile.svg') }}" alt="User">
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
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
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
