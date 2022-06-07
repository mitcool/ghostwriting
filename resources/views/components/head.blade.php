<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   {!! EuCookieConsent::getHtml('header') !!}
	{{-- Theme --}}
	<style type="text/css">
		@if(Session::get('theme')=='freelancer')
			.theme{
				color:#42D567 !important;
			}
			.theme-background{
				background-color:#42D567 !important;
			}
			.theme-border{
				box-shadow: 0 0 10px #42D567;
			}
		@else
			.theme{
				color:#139BFD !important;
			}
			.theme-background{
				background-color:#139BFD !important;
			}
			.theme-border{
				box-shadow: 0 0 10px #139BFD;
				
			}
		@endif
		.theme-radius{
			border-radius:100%;
		}
		#login_error{
			font-size:12px;
		}

	</style>

	@yield('css')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>
