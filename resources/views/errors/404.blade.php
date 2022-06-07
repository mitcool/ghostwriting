<!DOCTYPE html>
<html>
<x-head/>
<body>
	<div style="text-align: center;">
	<video autoplay muted style="width:60%;">
 		<source src="{{asset('videos/404.mp4')}}" type="video/mp4" >
  		Your browser does not support the video tag.
	</video>
	<h4>You don't have permission to see this page.</h4> <a class="btn btn-warning text-white" href="{{route('welcome')}}">Homepage</a>
	<hr>
	
</div>
</body>
</html>
