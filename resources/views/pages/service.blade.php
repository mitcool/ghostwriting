@extends('template')

@section('title') {{$service->name}} @endsection

@section('css')

<style type="text/css">
	.service-link{
		color:grey;
		text-decoration: none;
		margin-top:10px;
		display: inline-block;
	}

</style>

@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" style="padding:30px;min-height:80vh;">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="{{asset('images/lady.png')}}" class="w-100">
				</div>

				<div class="col-md-8">
					<h1>{{$service->name}}</h1><br>
					<div class="row">
						@foreach($services as $s)
							<div class="col-md-3">
								<a class="service-link" href="{{route('service',$s->slug)}}" @if($s->slug == $service->slug) style="color:#139BFD;" @endif>{{$s->name}}</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="row">
				{!!$service->description!!}
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
</div>

@endsection