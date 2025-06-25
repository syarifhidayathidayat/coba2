<header class="header header-fixed" id="main-header">
  <div class="container-fluid">
    <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
      <i class="fas fa-bars"></i>
    </button>

    <a class="header-brand d-md-none" href="#">
      <strong>AppName</strong>
    </a>

    <ul class="header-nav d-none d-md-flex">
      <li class="nav-item">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Settings</a>
      </li>
    </ul>

    <ul class="header-nav ms-auto">
      <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
          <i class="fas fa-bell"></i>
          <span class="badge bg-danger">5</span>
        </a>
      </li>
      <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
          <i class="fas fa-envelope"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button">
          <div class="avatar avatar-md">
            <img class="avatar-img" src="{{ asset('img/undraw_profile.svg') }}" alt="User">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end pt-0">
          <li class="dropdown-header bg-light fw-bold text-uppercase">Account</li>
          <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
          <li><a class="dropdown-item" href="#"><i class="fas fa-cogs me-2"></i> Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</header>
