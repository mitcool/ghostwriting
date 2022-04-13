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
	.title{
		text-align: left;
		font: normal normal bold 4.5rem/1px Helvetica;
		letter-spacing: 0px;
		color: #595959;
		text-shadow: 0px 5px 6px #0000003B;
		opacity: 1;
		font-weight: 100;
	}
	.title_hr{
		border: 1px solid #139BFD;
		opacity: 1;
	}
	.theme-background{
		bottom:0;
		position:relative;
		width: 100%;
	}
	html,body{
    overflow-x: hidden;
}
@media only screen and (max-width: 768px) {
	.desktop-sidenav{
		display: none;
	}
	.mobile-sidenav{
		display:block !important;
	}
  .list-group-item{
	padding: 0.5rem 0.1rem !important;
}
/*INFO TEXT - No need to copy this*/
.text h1 {
  text-align: center;
}

/* fixed side social buttons */
#mySidenav button {
  position: absolute; /* Position them relative to the browser window */
  left: -60px; /* Position them outside of the screen */
  transition: 0.3s; /* Add transition on hover */
  padding: 10px; /* 15px padding */
  width: 70px; /* Set a specific width */
  text-decoration: none; /* Remove underline */
  font-size: 20px; /* Increase font size */
  color: white; /* White text color */
  border-radius: 0px 50px 50px 0px; /* Rounded corners on the top right and bottom right side */
  margin-top: 15rem;
  position: fixed;
  z-index: 1;
}

#mySidenav button:hover {
  left: 0; /* On mouse-over, make the elements appear as they should */
}
#about {
  top: 20px;
  background-color: #fafafa;
  border-color:#a8d8fb;

}
.fa-brands{
	width: 24px;
}
.arrrow{
	padding: 0.5rem 2.6rem !important;
}
}

</style>

@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="body col-md-10" style="padding:30px;">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="{{asset('images/lady.png')}}" class="w-100 mb-5">
				</div>

				<div class="col-md-8">
					<p class="title">SERVICES</p><br>
					<hr class="title_hr">
					<div class="row">
						@foreach($services as $service)
							<div class="col-md-3">
								<a class="service-link" href="{{route('service',$service->slug)}}">{{$service->name}}</a>
							</div>
						@endforeach
					</div>
				
				</div>
			</div>

			<div class="row mt-5">
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