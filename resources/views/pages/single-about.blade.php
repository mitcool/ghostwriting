@extends('template')

@section('title') Services @endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/services.css')}}">
@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="body col-md-10" style="min-height: 75vh;">
			<div class="row align-items-start">
				<div class="col-md-4">
					<img src="{{asset('images/services.png')}}" class="w-100 mb-5 p-3">
				</div>

				<div class="col-md-8">
					<p class="title">{{Session::get('locale')=='de' ? 'ÜBER UNS' : 'ABOUT'}}</p><br>
					<hr class="title_hr">
					<div class="row">

						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug==$about_pages[0]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[0]->slug)}}">{{$about_pages[0]->name}}
							</a>
						</div>	

						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug==$about_pages[3]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[3]->slug)}}">{{$about_pages[3]->name}}
							</a>
						</div>	

						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug==$about_pages[5]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[5]->slug)}}">{{$about_pages[5]->name}}
							</a>
						</div>

						

						<div class="col-md-4">
							<a class="service-link" href="{{route('services')}}">{{Session::get('locale')=='de' 
									? 'Produkte & Lösungen'
									: 'Services & Solutions'
								}}
							</a>
						</div>		
						
						<div class="col-md-4">
							<a class="service-link" href="{{route('order')}}">{{Session::get('locale')=='de' 
									? 'Projektanfrage starten'
									: 'Start Project Request'
								}}
							</a>
						</div>	

						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug==$about_pages[6]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[6]->slug)}}">{{$about_pages[6]->name}}
							</a>
						</div>	

						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug == $about_pages[1]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[1]->slug)}}">{{$about_pages[1]->name}}
							</a>
						</div>

						<div class="col-md-4">
							<a class="service-link" href="{{route('freelancer-application')}}">{{Session::get('locale')=='de' 
									? 'Bewerbung als Freelancer'
									: 'Freelancer Application'
								}}

							</a>
						</div>
						
						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug==$about_pages[4]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[4]->slug)}}">{{$about_pages[4]->name}}
							</a>
						</div>			
						
						<div class="col-md-4">
							<a class="service-link" @if($about_page->slug==$about_pages[2]->slug) style="color:#F55D3D;" @endif href="{{route('single-about',$about_pages[2]->slug)}}">{{$about_pages[2]->name}}
							</a>
						</div>	
						
						<div class="col-md-4">
							<a class="service-link" href="{{route('blog')}}">Blog</a>
						</div>	
					</div>
				
				</div>
			</div>

			 <div class="row mt-5">
				<div class="col-md-10 offset-md-1">
			    	<hr class="title_hr">
					<div>{{ Session::get('locale')=='de' ? $about_page->name_de : $about_page->name }}</div>
					<div>{!! Session::get('locale')=='de' ? $about_page->description_de : $about_page->description !!}</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
</div>

@endsection






