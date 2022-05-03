@extends('template')

@section('content')
	<img src="{{asset('images/faq.png')}}" class="w-100">
	<div class="container shadow p-3" style="min-height:100vh;margin-top:20px;margin-bottom:20px;">
		<h1 class="text-center ">{{$texts[0]->text}}</h1>
		{!! $texts[1]->text !!}
	</div>
	
@endsection