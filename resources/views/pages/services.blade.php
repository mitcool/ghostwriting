@extends('template')

@section('title') Services @endsection

@section('css')

<style type="text/css">
	.service-link{
		color:grey;
		text-decoration: none;
		margin-top:10px;
		display: inline-block;
	}

</style>

@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" style="padding:30px;">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="{{asset('images/lady.png')}}" class="w-100">
				</div>

				<div class="col-md-8">
					<h1>SERVICES</h1><br>
					<div class="row">
						@foreach($services as $service)
							<div class="col-md-3">
								<a class="service-link" href="{{route('service',$service->slug)}}">{{$service->name}}</a>
							</div>
						@endforeach
					</div>
				
				</div>
			</div>

			<div class="row">
				<h2>Lorem ipsum dolor sit amet</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a, gravida commodo metus. Nam quis odio et leo fermentum ullamcorper et in enim. Aliquam consequat eget quam et dignissim. Duis quis rutrum odio. Phasellus at viverra nisi, a ullamcorper ex. Sed vehicula lobortis tortor. Curabitur luctus lacus vitae diam dignissim dignissim.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sem lorem, interdum vitae nulla id, rhoncus tincidunt nisl. Aenean purus nisi, fringilla consequat mi nec, fringilla rhoncus metus. Suspendisse potenti. Proin quis ultricies diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam est libero, convallis in turpis non, aliquam porta risus. Ut lacinia ullamcorper sollicitudin.
				</p>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
</div>

@endsection