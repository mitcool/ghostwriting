@extends('template')

@section('content')
	<img src="{{asset('images/prices-background.png')}}" class="w-100">
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-1"></div>
			<div class="col-md-10" style="margin-bottom:50px;">
				<div class="row">
					<div class="col-md-12">
						<h1 style="margin:50px 0;">Our service portfolio</h1>
					</div>
					<div class="col-md-5" style="border-right:1px solid #F89A86;">
						<div class="d-flex">
							<div><img src="{{asset('images/calculator.png')}}" style="padding:10px;"></div>
							<div class="p-2">
								<p class="fw-bold">You can use our calculator Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a, gravida commodo metus. Nam quis odio et leo fermentum ullamcorper et in enim. </p>
							</div>
						</div>
						<div>
							<select id="num1" class="form-control my-2">
								<option value="0">Select main category</option>
								<option value="10">Category 1</option>
								<option value="20">Category 2</option>
								<option value="30">Category 3</option>
							</select>
							<select id="num2" class="form-control my-2">
								<option value="0">Select subject area</option>
								<option value="10">Subject 1</option>
								<option value="20">Subject 2</option>
								<option value="30">Subject 3</option>
							</select>
							<select id="num3" class="form-control my-2">
								<option value="0">Select sub-category</option>
								<option value="10">Subcategory 1</option>
								<option value="20">Subcategory 2</option>
								<option value="30">Subcategory 3</option>
							</select>
							<select id="num4" class="form-control my-2">
								<option value="0">Select language</option>
								<option value="10">Language 1</option>
								<option value="20">Language 2</option>
								<option value="30">Language 3</option>
							</select>
							<hr>
							<h5 class="d-flex fw-bold justify-content-between">
								<span>Estimated price:</span> 
								<span id="price"></span>
							</h5>
						</div>
					</div>
					<div class="col-md-7">
						<div class="d-flex">
							<div><img src="{{asset('images/prices.png')}}" style="padding:10px;"></div>
							<div class="p-2">
								<p class="fw-bold">You can use our calculator Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a, gravida commodo metus. Nam quis odio et leo fermentum ullamcorper et in enim. Aliquam consequat eget quam et dignissim. Duis quis rutrum odio. Phasellus at viverra nisi, a ullamcorper ex. Sed vehicula lobortis tortor.</p>
							</div>
						</div>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
						<p>Lorem ipsum dolor sit amet - 1000</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function calculate() {
	 	var num1 = +document.getElementById("num1").value;
	 	var num2 = +document.getElementById("num2").value;
	  	var num3 = +document.getElementById("num3").value;
	  	var num4 = +document.getElementById("num4").value;
	  document.getElementById("price").innerHTML = eval(num1 + num2 + num3 + num4);
	}
	num1.onchange=calculate;
	num2.onchange=calculate;
	num3.onchange=calculate;
	num4.onchange=calculate;
	calculate();
	</script>
	
@endsection