@extends('template')

@section('title') FAQ PAGE @endsection

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

<div class="container text-center" style="margin-top:50px;margin-bottom:50px;">
	<h1 class="text-center">FAQ</h1>

	@foreach($faqs as $faq)

		  <button class="question-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer-{{$faq->id}}" aria-expanded="false" aria-controls="answer-{{$faq->id}}">
		   	{{ Session::get('locale')=='de' ? $faq->question_de : $faq->question_en }}
		  </button>
		
		<div class="collapse" id="answer-{{$faq->id}}">
		  <div class="card card-body border-0">
		    {{ Session::get('locale')=='de' ? $faq->answer_de : $faq->answer_en }}
		  </div>
		</div>
	@endforeach

</div>
@endsection