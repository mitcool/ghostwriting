@extends('template')

@section('title') LEARN MORE @endsection

@section('css')
<style type="text/css">
	.question-button{
		display: block;
		background: #BAE2FF;
		text-align: center;
		width:100%;
		border:none;
		color:black !important;
		padding: 10px;
		margin-top:10px;
		border-radius:20px;
		font-size:20px;
	}
</style>

@endsection

@section('content')

<img src="{{asset('images/faq.png')}}" class="w-100">

<div class="container" style="margin-top:50px;margin-bottom:50px;">
	<h1 class="text-center" style="margin:40px 0;">What you need to know about ghostwriting</h1>

	@foreach($faqs as $faq)

		  <button class="question-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer-{{$faq->id}}" aria-expanded="false" aria-controls="answer-{{$faq->id}}">
		   	{{ Session::get('locale')=='de' ? $faq->question_de : $faq->question_en }}
		  </button>
		
		<div class="collapse" id="answer-{{$faq->id}}">
		  <div class="card card-body border-0 text-justify">
		    {!! Session::get('locale')=='de' ? $faq->answer_de : $faq->answer_en !!}
		  </div>
		</div>
	@endforeach

</div>
@endsection