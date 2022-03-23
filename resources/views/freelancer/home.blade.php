@extends('template')

@section('css')

<style type="text/css">
	.dashboard-link{
		display: inline-block;
		font-size: 20px;
		color:black;
		text-decoration: none;
	}
</style>

@yield('page-css')

@endsection

@section('content')

<div style="z-index:0;">
	<img src="{{asset('images/freelancer-dashboard.png')}}" class="w-100" >
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			
			<h1 style="margin-top:20px;"></h1>
			<div class="row">
				<div class="col-md-3">
					<img src="{{asset('images/lady.png')}}" class="w-100" style="margin-top:-200px;z-index:1000;">
				</div>
				<div class="col-md-3">
					<h4>{{Auth::user()->name}}</h4>
					<p class="dashboard-link">{{Auth::user()->email}}</p>
				</div>
				<div class="col-md-6">
					<ul class="nav justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link dashboard-link" id="offers_link" href="{{route('freelancer-offers')}}">Offers</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link dashboard-link" id="messages_link" href="{{route('freelancer-messages')}}">Messages</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link dashboard-link" id="orders_link" href="{{route('freelancer-orders')}}">Order</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link dashboard-link" id="settings_link" href="{{route('freelancer-settings')}}">Settings</a>
					  </li>
					</ul>
				</div>
			</div>
			<div class="container" style="padding:30px;">
				<hr>
				@yield('page-content')
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

@endsection