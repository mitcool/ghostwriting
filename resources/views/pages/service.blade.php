@extends('template')

@section('title') {{$service->name}} @endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/services.css')}}">
@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 body">
			<div class="row align-items-start">
				<div class="col-md-3 p-3">
					<img src="{{asset('services-images')}}/{{$service->picture}}" class="w-100 mb-5 theme-border theme-radius"> 
				</div>

				<div class="col-md-9">
					<p class="title">SERVICES</p><br>
					<hr class="title_hr">
					<div class="row">
						@foreach($services as $s)
							<div class="col-md-4">
								<a class="service-link" href="{{route('service',$s->slug)}}" @if($s->slug == $service->slug) style="color:#F55D3D;" @endif>{{Session::get('locale')=='de' ? $s->name_de : $s->name}}</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="row mt-5">
			    <div class="col-md-10 offset-md-1" style="padding:30px;">
			    	<hr class="title_hr">
					<h3>{{Session::get('locale')=='de' ? $s->name_de : $s->name}}</h3>
					<div>{!! Session::get('locale')=='de' ? $service->description_de : $service->description !!}</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

@endsection