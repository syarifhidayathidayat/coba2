   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-check-double"></i>
           </div>
           <div class="sidebar-brand-text mx-3">Contract<sup>2</sup></div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="{{ route('dashboard.index') }}">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           KONTRAK
       </div>

       <!-- Menu Kontrak -->
       <li class="nav-item">
           <a class="nav-link" href="{{ route('sp.index') }}">
               <i class="fas fa-fw fa-pencil"></i>
               <span>Surat Pesanan</span></a>
       </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.semua') }}">
            <i class="fas fa-boxes"></i>
            <span>Semua Barang</span>
        </a>
    </li>
    
       <li class="nav-item">
           <a class="nav-link" href="{{ route('bast.index') }}">
               <i class="fas fa-fw fa-pencil"></i>
               <span>BAST</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{ route('paket-pekerjaan.index') }}">
               <i class="fas fa-fw fa-pencil"></i>
               <span>Paket Pekerjaan</span></a>
       </li>
       <!-- Divider -->
       <hr class="sidebar-divider">
       <!-- Heading -->
       <div class="sidebar-heading">
           USER
       </div>

       <!-- Menu Pegawai -->
       <li class="nav-item">
           <a class="nav-link" href="{{ route('pegawai.index') }}">
               <i class="fas fa-fw fa-user-tie"></i>
               <span>Pegawai</span></a>
       </li>
       <!-- Menu Penyedia -->
       <li class="nav-item">
           <a class="nav-link" href="{{ route('penyedia.index') }}">
               <i class="fas fa-fw fa-user-tie"></i>
               <span>Penyedia</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pengaturan Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan"
               aria-expanded="true" aria-controls="collapsePengaturan">
               <i class="fas fa-fw fa-wrench"></i>
               <span>Pengaturan</span>
           </a>
           <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan"
               data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('penempatan.index') }}">Penempatan Barang</a>
                   {{-- <a class="collapse-item" href="utilities-border.html">Borders</a> --}}

               </div>
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('menu.index') }}">Role User</a>
                   {{-- <a class="collapse-item" href="utilities-border.html">Borders</a> --}}

               </div>
           </div>
       </li>
   </ul>

   <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
