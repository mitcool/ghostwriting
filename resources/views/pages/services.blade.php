@extends('template')

@section('title') Services @endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/services.css')}}">
@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="body col-md-10">
			<div class="row align-items-start">
				<div class="col-md-3 p-3">
					<img src="{{asset('images/services.png')}}" class="w-100 mb-5 theme-border theme-radius">
				</div>

				<div class="col-md-9">
					<p class="title">{{$texts[0]->text}}</p><br>
					<hr class="title_hr">
					<div class="row">
						@foreach($services as $service)
							<div class="col-md-4">
								<a class="service-link" href="{{route('service',$service->slug)}}">{{Session::get('locale')=='de' 
										? $service->name_de 
										: $service->name}}
								</a>
							</div>
						@endforeach
					</div>
				
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-10 offset-md-1 p-3">
					{!! $texts[1]->text !!}
				</div>
				
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
</div>

@endsection