@if(Session::has('success'))
	<div class="shadow text-center my-2" role="alert" style="color:#42D567;border-left:5px solid #42D567;background:white;width:auto;padding:15px;position: relative;">
		<i class="fa-solid fa-circle-check"></i> &nbsp; {{Session::get('success')}}
		<span onclick="this.parentNode.parentNode.removeChild(this.parentNode);" style="position:absolute;top:0;right:0;color:black;font-size: 2rem;cursor:pointer;">&times;</span>
	</div>
@endif


@if(Session::has('wrong'))
	<div class="shadow text-center my-2" role="alert" style="color:#F84162;border-left:5px solid #F84162;background:white;width:auto;padding:15px;position: relative;">
	  	<i class="fa-solid fa-circle-xmark"></i> &nbsp;{{Session::get('wrong')}}
	  	<span onclick="this.parentNode.parentNode.removeChild(this.parentNode);" style="position:absolute;top:0;right:0;color:black;font-size: 2rem;cursor:pointer;">&times;</span>
	</div>
@endif

@if($errors->any())
	<div class="shadow text-center my-2" role="alert" style="color:#F84162;border-left:5px solid #F84162;background:white;width:auto;padding:15px;position: relative;">
  		<i class="fa-solid fa-circle-xmark"></i> &nbsp;{{$errors->all()[0]}}
  		<span onclick="this.parentNode.parentNode.removeChild(this.parentNode);" style="position:absolute;top:0;right:0;color:black;font-size: 2rem;cursor:pointer;">&times;</span>
	</div>
@endif