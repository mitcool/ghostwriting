<nav class="navbar navbar-expand-lg navbar-light" style="padding:20px;">
  <div class="container-fluid">
    <a class="navbar-brand theme" id="header-logo" href="{{route('welcome')}}">ghostwriting</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-100 justify-content-center" id="navbarScroll">
      <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('services')}}">{{$texts[0]->text}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('disciplines')}}">{{$texts[1]->text}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('prices')}}">{{$texts[2]->text}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('about')}}">{{$texts[3]->text}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link header-link" href="{{route('tutorial')}}">{{$texts[4]->text}}</a>
        </li>
      </ul>
      <div class="d-flex">
        @guest
          <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#login_modal">{{$texts[8]->text}}</button>
          @if(Session::get('theme')=='freelancer')
           <a class="btn theme-background mx-2 text-white" style="border-radius:30px;" href="{{route('freelancer-application')}}">{{$texts[5]->text}}</a>
          @else
          <button class="btn theme-background mx-2 text-white" style="border-radius:30px;" data-bs-toggle="modal" data-bs-target="#register_modal">{{$texts[5]->text}}</button>
          @endif
        @else
          <a style="border-radius:30px;" class="btn theme-background mx-2 text-white" href="{{route('dashboard')}}">Dashboard</a>
          <form action="{{route('logout')}}" method="POST">
              {{csrf_field()}}
              <button class="btn">{{$texts[7]->text}}</button>
          </form>
        @endguest

        @if(Session::get('locale')=='de')
          <a href="{{route('change-language','en')}}" class="btn theme-background mx-2 text-white" style="border-radius:30px;">EN</a>
        @else
          <a href="{{route('change-language','de')}}" class="btn theme-background mx-2 text-white" style="border-radius:30px;">DE</a>
        @endif

      </div>
    </div>
  </div>
</nav>