<div class="sidebar-brand d-none d-md-flex">
    <a href="{{ route('dashboard') }}" class="text-white text-decoration-none w-100 justify-content-center d-flex align-items-center">
        <i class="fas fa-check-double me-2"></i>
        <span class="fw-bold">Contract<sup>2</sup></span>
    </a>
</div>

<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    {{-- Dashboard --}}
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard
        </a>
    </li>

    {{-- KONTRAK Section --}}
    <li class="nav-title">KONTRAK</li>

    @hasanyrole('admin|Pejabat-Pengadaan53')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sp.index') }}">
                <i class="fas fa-pencil-alt nav-icon"></i> Surat Pesanan
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('barang.semua') }}">
                <i class="fas fa-boxes nav-icon"></i> Semua Barang
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('bast.index') }}">
                <i class="fas fa-file-alt nav-icon"></i> BAST
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('paket-pekerjaan.index') }}">
                <i class="fas fa-briefcase nav-icon"></i> Paket Pekerjaan
            </a>
        </li>
    @endhasanyrole

    {{-- USER Section --}}
    <li class="nav-title">USER</li>

    @hasanyrole('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pegawai.index') }}">
                <i class="fas fa-user-tie nav-icon"></i> Pegawai
            </a>
        </li>
    @endhasanyrole

    @hasanyrole('admin|Pejabat-Pengadaan53')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('penyedia.index') }}">
                <i class="fas fa-user-tie nav-icon"></i> Penyedia
            </a>
        </li>
    @endhasanyrole

    {{-- Pengaturan Section --}}
    <li class="nav-title">PENGATURAN</li>

    <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
            <i class="fas fa-wrench nav-icon"></i> Pengaturan
        </a>
        <ul class="nav-group-items">
            @hasanyrole('admin|Pejabat-Pengadaan53')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penempatan.index') }}">Penempatan Barang</a>
                </li>
            @endhasanyrole

            @hasanyrole('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu.index') }}">Role User</a>
                </li>
            @endhasanyrole

            @hasanyrole('admin|Pejabat-Pengadaan53')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('institusi.index') }}">Institusi & Pejabat</a>
                </li>
            @endhasanyrole

            @hasanyrole('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">User</a>
                </li>
            @endhasanyrole
        </ul>
    </li>
</ul>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            new coreui.Sidebar(sidebar);
        }
    });
</script>