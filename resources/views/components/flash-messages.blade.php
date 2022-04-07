@if(Session::has('success'))
	<div class="alert alert-success text-center" role="alert">
	  	{{Session::get('success')}}
	</div>
@endif

@if(Session::has('wrong'))
	<div class="alert alert-danger text-center" role="alert">
	  	{{Session::get('wrong')}}
	</div>
@endif


@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="alert alert-danger text-center" role="alert">
	  		{{ $error }}
		</div>
	@endforeach
@endif