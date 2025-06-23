<div class="c-sidebar c-sidebar-light c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-none d-md-flex">
        <i class="fas fa-check-double me-2 text-primary fs-4 rotate-n-15"></i>
        <span class="fw-bold">Contract<sup>2</sup></span>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('dashboard') ? 'c-active' : '' }}" href="{{ route('dashboard') }}">
                <i class="c-sidebar-nav-icon fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        <li class="c-sidebar-nav-title">Kontrak</li>

        @hasanyrole('admin|Pejabat-Pengadaan53')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('sp.index') ? 'c-active' : '' }}" href="{{ route('sp.index') }}">
                <i class="c-sidebar-nav-icon fas fa-pencil-alt"></i> Surat Pesanan
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('barang.semua') ? 'c-active' : '' }}" href="{{ route('barang.semua') }}">
                <i class="c-sidebar-nav-icon fas fa-boxes"></i> Semua Barang
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('bast.index') ? 'c-active' : '' }}" href="{{ route('bast.index') }}">
                <i class="c-sidebar-nav-icon fas fa-file-alt"></i> BAST
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('paket-pekerjaan.index') ? 'c-active' : '' }}" href="{{ route('paket-pekerjaan.index') }}">
                <i class="c-sidebar-nav-icon fas fa-briefcase"></i> Paket Pekerjaan
            </a>
        </li>
        @endhasanyrole

        <li class="c-sidebar-nav-title">User</li>

        @hasanyrole('admin')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('pegawai.index') ? 'c-active' : '' }}" href="{{ route('pegawai.index') }}">
                <i class="c-sidebar-nav-icon fas fa-user-tie"></i> Pegawai
            </a>
        </li>
        @endhasanyrole

        @hasanyrole('admin|Pejabat-Pengadaan53')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->routeIs('penyedia.index') ? 'c-active' : '' }}" href="{{ route('penyedia.index') }}">
                <i class="c-sidebar-nav-icon fas fa-user-tie"></i> Penyedia
            </a>
        </li>
        @endhasanyrole

        <li class="c-sidebar-nav-dropdown {{ request()->is('penempatan*') || request()->is('menu*') || request()->is('institusi*') || request()->is('user*') ? 'c-show' : '' }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fas fa-wrench"></i> Pengaturan
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                @hasanyrole('admin|Pejabat-Pengadaan53')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->routeIs('penempatan.index') ? 'c-active' : '' }}" href="{{ route('penempatan.index') }}">
                        Penempatan Barang
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->routeIs('menu.index') ? 'c-active' : '' }}" href="{{ route('menu.index') }}">
                        Role User
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin|Pejabat-Pengadaan53')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->routeIs('institusi.index') ? 'c-active' : '' }}" href="{{ route('institusi.index') }}">
                        Institusi & Pejabat
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->routeIs('user.index') ? 'c-active' : '' }}" href="{{ route('user.index') }}">
                        User
                    </a>
                </li>
                @endhasanyrole
            </ul>
        </li>
    </ul>
</div>
