
{{-- Phone modal --}}
<div class="modal fade" id="phone_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content theme-border" style="border-radius:30px;border:none;">
      <div class="modal-body" style="position: relative;">
        {{-- Contact Phone is coming from appServiceProvider --}}
        <div class="text-center"><i class="fa-solid fa-phone"></i> {{$contact_phone}}</div>
        <button style="position: absolute;right:10px;top:15px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>

{{-- Register modal --}}
<div class="modal fade" id="register_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content theme-border" style="border-radius:30px;border:none;">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="{{route('register')}}" method="POST">
            {{csrf_field()}}
              <input type="text" name="name"  class="form-control my-2" placeholder="Name..." value="{{old('name')}}">
              <input type="text" name="surname"  class="form-control my-2" placeholder="Surname..." value="{{old('surname')}}">
              <input type="email" name="email" class="form-control my-2" placeholder="Email..." value="{{old('email')}}">
              <div class="input-group my-2">
                <input type="password" name="password" style="border-right:none;" class="form-control" placeholder="Password...">
                <span class="input-group-text bg-white" style="border-left:none;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$password_requirements}}">
                    <i class="fa-solid fa-circle-info text-primary"></i>
                </span>
              </div>
             
              <input type="password" name="confirm_password" class="form-control my-2" placeholder="Confirm password...">
              <hr>
              <div class="d-flex justify-content-center">
                @if(config('services.recaptcha.key'))
                    <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                @endif
              </div>
              <hr>
              <div class="d-flex justify-content-center">
                <button class="red-button">Register</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

{{-- Contact modal --}}
<div class="modal fade" id="contact_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content theme-border theme-border" style="border-radius:30px;border:none;">
      <div class="modal-header">
        <h5 class="m-0 fw-bold"><i class="fa-solid fa-book-open"></i> Send a message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('contact-mail')}}">
            {{csrf_field()}}
            <input type="text" value="{{old('name')}}" name="name" placeholder="Name & surname" class="form-control my-2 bg-light" required>
            <input type="email" value="{{old('email')}}" name="email" placeholder="Email" class="form-control my-2 bg-light" required>
            <textarea name="message" rows="10" placeholder="Message up to 2000 characters" class="form-control my-2 bg-light" required>{{old('message')}}</textarea>
            <hr>
            <div class="d-flex justify-content-center">
              @if(config('services.recaptcha.key'))
                  <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
              @endif
            </div>
            <hr>
            <div class="text-center">
              <button class="red-button">Send</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Login modal --}}
<div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content theme-border theme-border" style="border-radius:30px;border:none;">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Log in</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <span class="text-danger" id="login_error"></span>
          <form action="{{route('login')}}" method="POST" id="login_form">
            {{csrf_field()}}
              <input type="email" name="email" id="email" class="form-control my-2" placeholder="Email..." value="{{old('email')}}">
              <input type="password" name="password" class="form-control my-2" placeholder="Password...">
              <hr>
              <div class="d-flex justify-content-center">
                @if(config('services.recaptcha.key'))
                    <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                @endif
              </div>
              <hr>
              <input type="pin" name="pin" id="pin" class="form-control my-2" style="display: none;" placeholder="Enter code..." required>
              <div class="d-flex justify-content-center">
                <button class="red-button" type="button" id="check_ip">Log in</button>
                <button class="red-button" style="display: none;" type="button" id="check_pin">Log in</button>
              </div>
          </form>
          <hr> 
          <div class="d-flex justify-content-center">
                <a href="{{route('forgot-password')}}">Forgot Passoword</a>
          </div>
      </div>
    </div>
  </div>
</div>

