<nav class="navbar navbar-expand-lg navbar-light" style="padding:20px;">
  <div class="container-fluid">
    <a class="navbar-brand theme" id="header-logo" href="{{route('welcome')}}">ghostwriting</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-100 justify-content-center" id="navbarScroll">
      <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('services')}}">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="#">Departments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('prices')}}">Prices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="#">Counselor</a>
        </li>
      </ul>
      <div class="d-flex">
        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#login_modal">Sign In</button>
        <button class="btn theme-background mx-2 text-white" style="border-radius:30px;" data-bs-toggle="modal" data-bs-target="#register_modal">Get Started</button>

        @if(Session::get('locale')=='de')
          <a href="{{route('change-language','en')}}" class="btn theme-background mx-2 text-white" style="border-radius:30px;" type="submit">EN</a>
        @else
          <a href="{{route('change-language','de')}}" class="btn theme-background mx-2 text-white" style="border-radius:30px;" type="submit">DE</a>
        @endif

      </div>
    </div>
  </div>
</nav>