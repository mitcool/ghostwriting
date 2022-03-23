@extends('freelancer.home')

@section('page-css')
<style type="text/css">
	#settings_link{
		color:#139BFD;
	}
</style>
@endsection

@section('page-content')

<form action="{{route('change-details')}}" method="POST">
	<div class="row">
		<div class="col-md-6 my-2">
			<input type="" name="" placeholder="Name" class="form-control">
		</div>
		<div class="col-md-6 my-2">
			<input type="" name="" placeholder="Surname" class="form-control">
		</div>
		<div class="col-md-6 my-2">
			<input type="" name="" placeholder="Email" class="form-control">
		</div>
		<div class="col-md-6 my-2">
			<input type="" name="" placeholder="Phone" class="form-control">
		</div>
		<div class="col-md-6 my-2">
			<input type="" name="" placeholder="Name" class="form-control">
		</div>
	</div>
</form>
@endsection