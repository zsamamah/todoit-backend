<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-2 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/dashboard">
        <img src="/images/logo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Todo-it</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''; }}  text-white" href="{{ url('dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin-users') ? 'active' : ''; }} " href="{{ url('admin-users') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin-contacts') ? 'active' : ''; }}"  href="{{ url('admin-contacts') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">people</i>
            </div>
            <span class="nav-link-text ms-1">Contacts</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin-problems') ? 'active' : ''; }}"  href="{{ url('admin-problems') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">code</i>
            </div>
            <span class="nav-link-text ms-1">Problems</span>
          </a>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('contacts-dashboard') ? 'active' : ''; }} " href="{{url('contacts-dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">fact_check</i>
            </div>
            <span class="nav-link-text ms-1">Contacts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('users-dashboard') ? 'active' : ''; }} " href="users-dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li> --}}
      </ul>
    </div>
  </aside>
