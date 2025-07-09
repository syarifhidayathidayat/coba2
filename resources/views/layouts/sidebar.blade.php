{{-- <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar"> --}}
<div class="sidebar sidebar-dark sidebar-fixed bg-dark" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a href="{{ route('dashboard') }}"
            class="text-white text-decoration-none w-100 d-flex justify-content-center align-items-center">
            <i class="fas fa-check-double me-2"></i>
            <strong>Contract<sup>2</sup></strong>
        </a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        {{-- Dashboard --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard
            </a>
        </li>


        <li class="nav-item mt-3 px-3">
            <form method="POST" action="{{ route('dashboard.setTahun') }}">
                @csrf
                <label for="tahun" class="form-label ">
                    <i class="fas fa-calendar "></i> Tahun Anggaran
                </label>
                <select name="tahun" id="tahun" class="form-select form-select-sm" onchange="this.form.submit()">
                    @for ($i = now()->year; $i >= 2020; $i--)
                        <option value="{{ $i }}" {{ session('tahun', now()->year) == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </form>
        </li>

        {{-- KONTRAK Section --}}
        @hasanyrole('Admin')
            <li class="nav-title">KONTRAK</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('sp.index') }}"><i
                        class="fas fa-pencil-alt nav-icon"></i> Surat Pesanan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('barang.semua') }}"><i
                        class="fas fa-boxes nav-icon"></i> Semua Barang</a></li>
        @endhasanyrole
        @hasanyrole('Admin|Pejabat-Pengadaan52|Pejabat-Pengadaan53')
            <li class="nav-item"><a class="nav-link" href="{{ route('dokumen-pemilihan.index') }}"><i
                        class="fas fa-briefcase nav-icon"></i> Dok. Pemilihan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('paket-pekerjaan.index') }}"><i
                        class="fas fa-briefcase nav-icon"></i> Paket Pekerjaan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('bast.index') }}"><i
                        class="fas fa-file-alt nav-icon"></i> BAST</a></li>
        @endhasanyrole
        @hasanyrole('Admin|Pejabat-Pengadaan52')
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('sp.index.52') ? 'active' : '' }}"
                    href="{{ route('sp.index.52') }}">
                    <i class="fas fa-pencil-alt nav-icon"></i> SP Akun 52
                </a></li>
        @endhasanyrole
        @hasanyrole('Admin|Pejabat-Pengadaan53')
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('sp.index.53') ? 'active' : '' }}"
                    href="{{ route('sp.index.53') }}">
                    <i class="fas fa-pencil-alt nav-icon"></i> SP Akun 53
                </a></li>
        @endhasanyrole
        {{-- USER Section --}}
        @hasanyrole('Admin')
            <li class="nav-title">USER</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pegawai.index') }}"><i
                        class="fas fa-user-tie nav-icon"></i> Pegawai</a></li>
        @endhasanyrole
        @hasanyrole('Admin|Pejabat-Pengadaan52|Pejabat-Pengadaan53')
            <li class="nav-item"><a class="nav-link" href="{{ route('penyedia.index') }}"><i
                        class="fas fa-user nav-icon"></i> Penyedia</a></li>
        @endhasanyrole
        {{-- PENGATURAN Section --}}
        <li class="nav-title">PENGATURAN</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <i class="fas fa-wrench nav-icon"></i> Pengaturan
            </a>
            <ul class="nav-group-items">
                @hasanyrole('Admin|Pejabat-Pengadaan53')
                    <li class="nav-item"><a class="nav-link" href="{{ route('penempatan.index') }}">Penempatan Barang</a>
                    </li>
                @endhasanyrole
                @hasanyrole('Admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('menu.index') }}">Role User</a></li>
                @endhasanyrole
                @hasanyrole('Admin|Pejabat-Pengadaan53')
                    <li class="nav-item"><a class="nav-link" href="{{ route('institusi.index') }}">Institusi & Pejabat</a>
                    </li>
                @endhasanyrole
                @hasanyrole('Admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
                @endhasanyrole
            </ul>
        </li>
        @role('Penyedia|Penyedia')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('penyedia.profile') ? 'active' : '' }}"
                    href="{{ route('penyedia.profile') }}">
                    <i class="fas fa-id-badge nav-icon"></i> Profil Saya
                </a>
            </li>
        @endrole

    </ul>
</div>
