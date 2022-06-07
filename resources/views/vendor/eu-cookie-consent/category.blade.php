<div>
    @if(isset($category['cookies']))
        <h5 class="fw-bold"> {{ $category['title'] }}</h5>
        @foreach($category['cookies'] as $cookieName => $cookie)
            @include('eu-cookie-consent::cookie')
        @endforeach
    @endif
</div>
