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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
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
					<x-freelancer-navigation/>
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