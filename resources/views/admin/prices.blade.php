@extends('admin.home')

@section('content')

<div class="container shadow p-3 my-3">	
<h3 class="text-center font-weight-bold">Update calculator prices</h3>
<hr>
<form action="{{route('change-prices')}}" class="row" method="POST">
	{{csrf_field()}}
	@foreach($prices as $price)
	<div class="col-md-8 my-1">
		<p class="m-0">{{$price->name_en}}</p>
	</div>
	<div class="col-md-4 my-1">
		<input type="text" value="{{$price->price}}" name="prices[]" class="form-control">
		<input type="hidden" name="ids[]" value="{{$price->id}}">
	</div>
	<div class="col-md-12 my-1 text-center">
		<hr>
	</div>
	@endforeach
	<div class="col-md-12 my-1 text-center">		
		<input type="submit" class="red-button" value="Save Changes">
	</div>
</form>
</div>
@endsection