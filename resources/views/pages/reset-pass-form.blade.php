@extends('template')


@section('content')

<div class="container-fluid my-2">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="min-height:75vh;">
		  <form class="shadow p-3" method="POST" action="{{route('reset-password',$code)}}">
		  	{{csrf_field()}}
		  	<label class="fw-bold">Please enter your password</label>
		 <div class="input-group my-2">
            <input type="password" name="password" style="border-right:none;" class="form-control" placeholder="Password...">
            <span class="input-group-text bg-white" style="border-left:none;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$password_requirements}}">
                <i class="fa-solid fa-circle-info text-primary"></i>
            </span>
          </div>
			<label class="fw-bold">Please confirm your password</label>
			<input type="password" name="confirm_password" class="form-control my-2" placeholder="Confirm Password" required>
			<div class="d-flex justify-content-center">
				<button class="red-button">Send</button>
			</div>
		  </form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

@endsection