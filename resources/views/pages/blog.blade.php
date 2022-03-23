@extends('template')

@section('css')
<style type="text/css">
	.learn-more{
		border:1px solid #139BFD;
		display: inline-block;
		padding: 7px 14px;
		text-decoration: none;
		border-radius:20px;
	}
</style>
@endsection
@section('content')

<div class="container">
	<h1 class="text-center">Blog</h1>
	<div class="row">
		@foreach($news as $n)
			<div class="col-md-4">
				<img src="{{asset('news')}}/{{$n->picture}}" class="w-100">
				<div class="p-2 shadow">
					<h5>{{Session::get('locale')=='de' ?  $n->title_de : $n->title_en}}</h5>
					<p>{{Session::get('locale')=='de' ? $n->description_de : $n->description_en}}</p>
					<a href="{{route('single-blog',$n->slug_en)}}" class="learn-more">Learn More <i class="fa-solid fa-caret-right"></i> </a>
				</div>			
			</div>
		@endforeach
	</div>
</div>

@endsection