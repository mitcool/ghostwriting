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
							<select class="form-control my-2">
								<option>Select main category</option>
								<option>Category 1</option>
								<option>Category 2</option>
								<option>Category 3</option>
							</select>
							<select class="form-control my-2">
								<option>Select subject area</option>
								<option>Subject 1</option>
								<option>Subject 2</option>
								<option>Subject 3</option>
							</select>
							<select class="form-control my-2">
								<option>Select sub-category</option>
								<option>Subcategory 1</option>
								<option>Subcategory 2</option>
								<option>Subcategory 3</option>
							</select>
							<select class="form-control my-2">
								<option>Select language</option>
								<option>Language 1</option>
								<option>Language 2</option>
								<option>Language 3</option>
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
	
@endsection