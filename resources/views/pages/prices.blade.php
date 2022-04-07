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
							@php $counter = 1; @endphp
							@foreach($prices as $question => $options)

								<select id="num{{$counter}}" class="form-control my-2">
									<option value="0">{{$question}}</option>
									@foreach($options as $option)
										<option value="{{$option->price}}">{{$option->name_en}}</option>
									@endforeach
								</select>
								<hr>
								@php $counter++ @endphp	
							@endforeach
								
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
	  document.getElementById("price").innerHTML ="€"+ eval(num1 + num2 + num3 + num4) + ".00";
	}
	num1.onchange=calculate;
	num2.onchange=calculate;
	num3.onchange=calculate;
	num4.onchange=calculate;
	calculate();
	</script>
	
@endsection