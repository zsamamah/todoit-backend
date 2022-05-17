<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb" class="text-dark">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 text-center">
            <li class=" text-sm"><a class="text-center" href="/dashboard">Pages</a></li>
            <li class="breadcrumb-item text-sm active text-center" aria-current="page">
            @php
            $_SERVER['REQUEST_URI'][1] = strtoupper($_SERVER['REQUEST_URI'][1]);
            echo $_SERVER['REQUEST_URI'];
            @endphp
            </li>
          </ol>
          <h6 class="font-weight-bolder mb-0">
            @php
            $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], 1);
            echo $_SERVER['REQUEST_URI'];
            @endphp
          </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center justify-content-end">
                <p class="nav-link">
                  {{ Auth::user()->name }}
                </p>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->