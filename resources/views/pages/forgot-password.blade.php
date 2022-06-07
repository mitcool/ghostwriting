@extends('template')


@section('content')

<div class="container-fluid my-2">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="min-height:75vh;">
		  <form class="shadow p-3" method="POST" action="{{route('send-forgot-pass-mail')}}">
		  	{{csrf_field()}}
		  	<label class="fw-bold">Please enter your email</label>
			<input type="email" name="email" value="{{old('email')}}" class="form-control my-2" required="">
			<div class="d-flex justify-content-center">
				<button class="red-button">Send</button>
			</div>
		  </form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

@endsection