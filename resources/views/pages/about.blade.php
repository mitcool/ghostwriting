@extends('template')

@section('title') Services @endsection

@section('css')

<style type="text/css">
	.service-link{
		color:black;
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
		margin:40px 0;
		text-transform: uppercase;
	}
	.title_hr{
		border: 1px solid #139BFD;
		opacity: 1;
	}
	html,body{
    	overflow-x: hidden;
	}
	.body{
		margin-top:30px;
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

		.body{
			padding:30px;
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
							<a class="service-link" href="">{{Session::get('locale')=='de' 
									? 'Unternehmen'
									: 'Company'
								}}
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
							<a class="service-link" href="">Know-how
							</a>
						</div>		
						<div class="col-md-4">
							<a class="service-link" href="">{{Session::get('locale')=='de' 
									? 'Qualitätssicherung'
									: 'Quality Assurance'
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
							<a class="service-link" href="{{route('freelancer-application')}}">{{Session::get('locale')=='de' 
									? 'Bewerbung als Freelancer'
									: 'Freelancer Application'
								}}

							</a>
						</div>
						<div class="col-md-4">
							<a class="service-link" href="{{route('faq')}}">FAQ</a>
						</div>		
						<div class="col-md-4">
							<a class="service-link" href="{{route('data-protection')}}">{{Session::get('locale')=='de' ? 'Datenschutz' : 'Data Protection '}}</a>
						</div>	
						<div class="col-md-4">
							<a class="service-link" href="{{route('imprint')}}">{{Session::get('locale')=='de' ? 'Impressum' : 'Imprint'}}</a>
						</div>			
						<div class="col-md-4">
							<a class="service-link" href="">PerFitS – Perfect Fit Solutions</a>
						</div>		


					</div>
				
				</div>
			</div>

			{{--  <div class="row mt-5">
				<div class="col-md-10 offset-md-1">
			    	<hr class="title_hr">
					<div>{!! $texts[1]->text !!}</div>
				</div>
			</div> --}}
		</div>
		<div class="col-md-1"></div>
	</div>
	
</div>

@endsection






