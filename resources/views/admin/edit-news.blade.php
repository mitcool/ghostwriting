@extends('admin.home')

@section('content')
	<div class="container">
		<h2 class="text-center my-2">Select a news for edit</h2>
		<div class="row">
			@foreach($news as $n)
				<div class="col-md-4 my-3">
					<a href="{{route('edit-single-news',$n->id)}}">
						<div class="shadow p-2">
							<img src="{{asset('news')}}/{{$n->picture}}" class="w-100">
							<h5 style="min-height:80px;">{{$n->title_en}}</h5>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection