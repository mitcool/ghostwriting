
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
              <input type="text" name="name"  class="form-control my-2" placeholder="Name...">
              <input type="text" name="surname"  class="form-control my-2" placeholder="Surname...">
              <input type="email" name="email" class="form-control my-2" placeholder="Email...">
              <input type="password" name="password" class="form-control my-2" placeholder="Password...">
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
            <input type="text" name="name" placeholder="Name & surname" class="form-control my-2 bg-light" required>
            <input type="email" name="email" placeholder="Email" class="form-control my-2 bg-light" required>
            <textarea name="message" rows="10" placeholder="Message up to 2000 characters" class="form-control my-2 bg-light" required></textarea>
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
          <form action="{{route('login')}}" method="POST">
            {{csrf_field()}}
              <input type="email" name="email" class="form-control my-2" placeholder="Email...">
              <input type="password" name="password" class="form-control my-2" placeholder="Password...">
              <hr>
              <div class="d-flex justify-content-center">
                @if(config('services.recaptcha.key'))
                    <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                @endif
              </div>
              <hr>
              <div class="d-flex justify-content-center">
                <button class="red-button">Log in</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>