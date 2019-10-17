<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>

  <!-- SEARCH FORM -->
  {{-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> --}}

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a href="{{ route('front.profile.edit') }}" class="nav-link pl-0"><em class="fa fa-cog mr-2"></em> <span class="d-none d-md-inline">Настройки</span></a></li>
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link pl-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="fa fa-sign-out-alt mr-2"></em> <span class="d-none d-md-inline">Выход</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
  </ul>
</nav>
