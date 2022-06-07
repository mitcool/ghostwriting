@extends('template')

@section('title') Welcome @endsection

@section('css')
<style type="text/css">
	.select-type{
		background:#2C2C2C;
		color:white;
		border:5px solid #2C2C2C;
		text-decoration: none;
		cursor: pointer;
		padding:5px;
	}
	.select-type:hover{
		color:white;
	}
	#client{
		border-bottom-left-radius:20px;
		border-top-left-radius:20px;
	}
	#freelancer{
		border-bottom-right-radius:20px;
		border-top-right-radius:20px;
	}

	#learn_more{
		background: white;
		border:none;
		margin:30px 0;
		font-size:20px;
		border-radius: 30px;
		padding:10px 15px;
		display: inline-block;
		text-decoration: none;
	}

</style>
@endsection

@section('content')

@if(Session::get('theme') == 'freelancer')
	<x-freelancer-welcome/> 
@else 
	<x-client-welcome/> 
@endif

@endsection
