@extends('template')

@section('title') Tutorials @endsection

@section('css')
	<style>
		.title{
			text-align: left;
			font: normal normal bold 4.5rem/1px Helvetica;
			letter-spacing: 0px;
			color: #595959;
			text-shadow: 0px 5px 6px #0000003B;
			opacity: 1;
			font-weight: 100;
			margin:40px 0;
			text-transform: uppercase;
		}
	</style>
@endsection

@section('content')

<img src="{{asset('images/tutorials.png')}}" class="w-100">
<div class="container">
	<h3 class="title">{{$texts[0]->text}}</h3>
	<div>{!! $texts[1]->text !!}</div>
	<div class="row">
		@foreach($tutorials as $tutorial)
			<div class="col-md-4 p-3">
				<div class="shadow my-2">
					<a data-bs-toggle="modal" data-bs-target="#tutorial_{{$tutorial->id}}">
						<img src="{{asset('tutorial-images')}}/{{$tutorial->thumbnail}}" class="w-100">
					</a>
				</div>
				
			</div>

			<div class="modal fade" id="tutorial_{{$tutorial->id}}" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered modal-lg bg-transparent border-0">
					<div class="modal-content bg-transparent border-0">
						<div class="modal-body text-center">
							<iframe width="800" height="450" src="{{$tutorial->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
