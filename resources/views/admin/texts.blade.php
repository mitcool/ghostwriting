@extends('admin.home')

@section('content')

<div class="container shadow p-3">
	<h2 class="my-3 text-center">Please select a page for edit</h2>
	<hr>
	<div class="row">

		@foreach($pages as $page)
			<div class="col-md-4">
				<a href="{{route('edit-single-page',$page)}}">
					<div class="alert alert-info text-capitalize text-center" role="alert">
					 	{{$page}}
					</div>
				</a>
			</div>
		@endforeach
	</div>
	
</div>


@endsection