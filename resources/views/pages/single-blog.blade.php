@extends('template')

@section('css')
<style type="text/css">
	.share-wrapper{
		background: #AEDDFF;
		text-align: center;
		padding:10px;
	}
	.share-wrapper i{
		font-size:30px;
		color:white;
	}

</style>
@endsection

@section('content')

<div class="container-fluid" style="min-height:80vh;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<img src="{{asset('news')}}/{{$news->picture}}" class="w-100 shadow">
			<h2 class="my-3">{{Session::get('locale')=='de' ? $news->title_de : $news->title_en}}</h2>
			<p class="fw-bold">{{Session::get('locale')=='de' ? $news->description_de : $news->description_en}}</p>
			<p>{!! Session::get('locale')=='de' ? $news->content_de : $news->content_en !!}</p>
		</div>
		<div class="col-md-2">
			<div class="share-wrapper">
				<div style="border:1px solid white;padding:10px;">
					<h5>Share</h5>
					<div class="d-flex justify-content-around">
						<a href="">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a href="">
							<i class="fa-brands fa-twitter"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>

		<div class="col-md-8 offset-md-2">
			<hr>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h4 class="text-center">Latest News</h4>
			<div class="row">
				@foreach($other_news as $on)
					<div class="col-md-4">
						<a href="{{route('single-blog',$on->slug_en)}}" style="color:black;text-decoration: none;">
							<div class="shadow">
								<img src="{{asset('news')}}/{{$on->picture}}" class="w-100">
								<div class="p-2">
									<p class="fw-bold my-2">{{Session::get('locale')=='de' ? $news->title_de : $news->title_en}}</p>
									<p>{{Session::get('locale')=='de' ? $news->description_de : $news->description_en}}</p>
								</div>	
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

@endsection