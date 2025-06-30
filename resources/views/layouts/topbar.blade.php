<header class="header header-sticky mb-4" id="main-header">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        {{-- Sidebar Toggle (Mobile + Desktop) --}}
        <button class="header-toggler px-md-0 me-3" type="button" data-coreui-toggle="sidebar" aria-controls="sidebar">
            <i class="fas fa-bars"></i>
        </button>

        {{-- Tombol Minimize Sidebar (Desktop only) --}}
        {{-- <button class="btn btn-sm btn-outline-secondary me-2 d-none d-md-inline" id="btn-minimize-sidebar" type="button">
            <i class="fas fa-angle-double-left"></i>
        </button> --}}


        {{-- App Brand (Visible on Mobile Only) --}}
        <a class="header-brand d-md-none fw-bold text-decoration-none" href="#">
            {{ config('app.name', 'Pengadaan') }}
        </a>

        {{-- Optional Horizontal Nav (Desktop Only) --}}
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        </ul>

        {{-- Right Aligned Menu --}}
        <ul class="header-nav ms-auto d-flex align-items-center">

            {{-- Notifications --}}
            <li class="nav-item position-relative me-3 d-none d-md-block">
                <a class="nav-link" href="#">
                    <i class="fas fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        5
                    </span>
                </a>
            </li>

            {{-- Messages --}}
            <li class="nav-item me-3 d-none d-md-block">
                <a class="nav-link" href="#"><i class="fas fa-envelope"></i></a>
            </li>

            {{-- User Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link py-0 px-2 d-flex align-items-center" href="#" role="button"
                    data-coreui-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <img class="avatar-img" src="{{ asset('img/undraw_profile.svg') }}" alt="User">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end pt-0">
                    <li class="dropdown-header bg-light fw-bold text-uppercase">Akun</li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cogs me-2"></i> Pengaturan</a></li>
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
