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
	.title{
		min-height:80px;
		font-weight:bold;
	}
	.image-box{
		height:250px;
		overflow:hidden;
	}
	.description{
		min-height:150px;
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
						<a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}&display=popup">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a class="tweet" href="javascript:tweetCurrentPage()" target="_blank" alt="Tweet this page">
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
			<h4 class="text-center p-3">Latest News</h4>
			<div class="row">
				@foreach($other_news as $on)
					<div class="col-md-4">
						<a href="{{route('single-blog',$on->slug)}}" style="color:black;text-decoration: none;">
							<div class="shadow">
								<div class="image-box">
									<img src="{{asset('news')}}/{{$on->picture}}" class="w-100">
								</div>
								<div class="p-2">
									<p class="fw-bold my-2 title">{{Session::get('locale')=='de' ? $news->title_de : $news->title_en}}</p>
									<p class="description">{{$news->formatted_description()}}</p>
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

@section('scripts')

<script language="javascript">
    function tweetCurrentPage()
    { 
    	window.open("https://twitter.com/share?url="+ encodeURIComponent(window.location.href)+"&text="+document.title, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false; 
    }
</script>

@endsection
@endsection