<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-check-double"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Contract<sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">KONTRAK</div>

    {{-- Menu Surat Pesanan --}}
    @hasanyrole('admin|Pejabat-Pengadaan53')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('sp.index') }}">
            <i class="fas fa-fw fa-pencil-alt"></i>
            <span>Surat Pesanan</span>
        </a>
    </li>
    @endhasanyrole

    {{-- Menu Barang --}}
    @hasanyrole('admin|Pejabat-Pengadaan53')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.semua') }}">
            <i class="fas fa-boxes"></i>
            <span>Semua Barang</span>
        </a>
    </li>
    @endhasanyrole

    {{-- Menu BAST --}}
    @hasanyrole('admin|Pejabat-Pengadaan53')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bast.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>BAST</span>
        </a>
    </li>
    @endhasanyrole

    {{-- Menu Paket Pekerjaan --}}
    @hasanyrole('admin|Pejabat-Pengadaan53')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('paket-pekerjaan.index') }}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Paket Pekerjaan</span>
        </a>
    </li>
    @endhasanyrole

    <hr class="sidebar-divider">

    <div class="sidebar-heading">USER</div>
    {{-- Menu Pegawai --}}
    @hasanyrole('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Pegawai</span>
        </a>
    </li>
    @endhasanyrole

    {{-- Menu Penyedia --}}
    @hasanyrole('admin|Pejabat-Pengadaan53')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penyedia.index') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Penyedia</span>
        </a>
    </li>
    @endhasanyrole

    <hr class="sidebar-divider">

    {{-- Pengaturan --}}
  
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan"
            aria-expanded="true" aria-controls="collapsePengaturan">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengaturan Sistem:</h6>
                @hasanyrole('admin|Pejabat-Pengadaan53')<a class="collapse-item" href="{{ route('penempatan.index') }}">Penempatan Barang</a>@endhasanyrole
                @hasanyrole('admin')<a class="collapse-item" href="{{ route('menu.index') }}">Role User</a> @endhasanyrole
                @hasanyrole('admin|Pejabat-Pengadaan53')<a class="collapse-item" href="{{ route('institusi.index') }}">Institusi & Pejabat</a> @endhasanyrole
                @hasanyrole('admin')<a class="collapse-item" href="{{ route('user.index') }}">User</a> @endhasanyrole
            </div>
        </div>
    </li>
</ul>

<!-- Sidebar Toggle Button -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
