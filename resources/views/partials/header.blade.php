<header class="header header-sticky mb-4">
    <div class="container-fluid">
      <button class="header-toggler px-md-0 me-md-3" type="button" onclick="document.body.classList.toggle('sidebar-show')">
        <i class="fas fa-bars"></i>
      </button>
  
      <ul class="header-nav ms-auto me-4">
        <li class="nav-item dropdown">
          <a class="nav-link py-0 d-flex align-items-center" data-bs-toggle="dropdown" href="#">
            <img class="avatar avatar-sm" src="https://via.placeholder.com/40" alt="user">
          </a>
          <div class="dropdown-menu dropdown-menu-end pt-0">
            <div class="dropdown-header bg-light fw-semibold">Account</div>
            <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a>
            <a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
          </div>
        </li>
      </ul>
    </div>
  </header>
  