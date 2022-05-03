@extends('admin.home')

@section('content')
<div class="container shadow p-3">
	<h2 class="my-3 text-center">Please select a discipline for edit</h2>
	<hr>
	<div class="row">

		@foreach($disciplines as $discipline)
			<div class="col-md-4">
				<a href="{{route('edit-single-resource',['discipline',$discipline->id])}}">
					<div class="alert alert-info text-capitalize text-center" role="alert">
					 	{{$discipline->name}}
					</div>
				</a>
			</div>
		@endforeach
	</div>
	<hr>
	<div class="text-right">
		<a href="{{route('add-resource','discipline')}}" class="bg-info red-button">Add Discipline</a>
	</div>
</div>

<div class="container shadow p-3 my-3">
	<h2 class="my-3 text-center">Please select a service for edit</h2>
	<hr>
	<div class="row">
		@foreach($services as $service)
			<div class="col-md-4">
				<a href="{{route('edit-single-resource',['service',$service->id])}}">
					<div class="alert alert-info text-capitalize text-center" role="alert">
					 	{{$service->name}}
					</div>
				</a>
			</div>
		@endforeach
	</div>
	<hr>
	<div class="text-right">
		<a href="{{route('add-resource','service')}}" class="bg-info red-button">Add Service</a>
	</div>
</div>

@endsection


