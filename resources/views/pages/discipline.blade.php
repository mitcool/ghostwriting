@extends('template')

@section('title') {{$discipline->name}} @endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/services.css')}}">
@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 body">
			<div class="row align-items-start">
				<div class="col-md-4">
					<img src="{{asset('images/disciplines.png')}}" class="w-100 mb-5 p-3"> 
				</div>

				<div class="col-md-8">
					<p class="title">DISCIPLINES</p><br>
					<hr class="title_hr">
					<div class="row">
						@foreach($disciplines as $d)
							<div class="col-md-4">
								<a class="service-link" href="{{route('discipline',$d->slug)}}" @if($d->slug == $discipline->slug) style="color:#F55D3D;" @endif>{{Session::get('locale')=='de' ? $d->name_de : $d->name}}</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-10 offset-md-1 p-3">	
					<hr class="title_hr">
					<h3>{{Session::get('locale')=='de' ? $d->name_de : $d->name}}</h3>
					<div>{!! Session::get('locale')=='de' ? $discipline->description_de : $discipline->description !!}</div>
				</div>		
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
</div>

@endsection