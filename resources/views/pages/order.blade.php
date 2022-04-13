@extends('template')

@section('title') Order @endsection
@section('css')
<style type="text/css">
	.order-option{
		display: none;
	}
	.order-option select,
	.order-option input,
	.order-option textarea{
		margin-top:20px;
	}
	select option:disabled{
		color:#D0A37D !important;
	}
	#submit-button{
		display: none;
	}
</style>
@endsection

@section('content')
<img src="{{asset('images/prices-background.png')}}" class="w-100">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" style="padding:30px;">
			<h1>Order preview</h1>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a, gravida commodo metus. Nam quis odio et leo fermentum ullamcorper et in enim. Aliquam consequat eget quam et dignissim. Duis quis rutrum odio. Phasellus at viverra nisi, a ullamcorper ex. Sed vehicula lobortis tortor. </p>
			<p>Curabitur luctus lacus vitae diam dignissim dignissim Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sem lorem, interdum vitae nulla id, rhoncus tincidunt nisl. Aenean purus nisi, fringilla consequat mi nec, fringilla rhoncus metus. Suspendisse potenti. Proin quis ultricies diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam est libero, convallis in turpis non, aliquam porta risus. Ut lacinia ullamcorper sollicitudin.</p>

			<form style="min-height: 500px;" method="POST" action="{{route('request-order')}}">
			{{csrf_field()}}
				@guest
				<h4 style="margin-top:40px;">How can we reach you?</h4>
				<div class="row">
					<div class="col-md-3">
						<input type="text" name="name" class="form-control my-2 user-info-input" placeholder="Name" required>
					</div>
					<div class="col-md-3">
						<input type="email" name="email" class="form-control my-2 user-info-input" placeholder="Email" required>
					</div>
					
					<div class="col-md-6"></div>
					<div class="col-md-2">
						<select class="form-control my-2 user-info-input" name="phone_code" required>
							<option selected disabled value="">Phone Code</option>
							@foreach($phone_codes as $phone_code)
								<option value="{{$phone_code->phone_code}}">{{$phone_code->country_name_en}} (+{{$phone_code->phone_code}})</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<input type="number" name="phone" class="form-control my-2 user-info-input" placeholder="Phone Number" required>
					</div>
					<div class="col-md-6"></div>
				</div>
				@endguest

				<h4 style="margin-top:40px;">Order details</h4>
			
				<div class="row">
					<div class="col-md-6">
						<select name="main" class="form-control" id="main_category" required>
							<option selected disabled value="">Please select main category</option>
							<option value="Literature Research">Literature Research</option>
							<option value="Topic Proposal">Topic Proposal</option>
							<option value="Outline">Outline</option>
							<option value="Expose">Expose</option>
							<option value="Academic text types">Academic text types</option>
							<option value="Editoral work">Editoral work</option>
							<option value="Additional services">Additional services</option>
							<option value="Other text types">Other text types</option>
						</select>	
					</div>
					<div class="col-md-6"></div>

					@include('orders._literature_research')
					@include('orders._topic_proposal')
					@include('orders._expose')
					@include('orders._academic_write')
					@include('orders._editoral')
					@include('orders._additional_services')
					@include('orders._other')
				

					<div class="col-md-6" id="submit-button">
						<select class="form-control my-3" name="milestones" id="milestones" required>
							<option disabled selected value="">Please select milestones</option>
							@for ($i = 1;$i <= 5;$i++)
								<option>{{$i}}</option>
							@endfor
						</select>
						<hr>
						<button type="submit" class="red-button">Send request</button>
					</div>
				</div>
				
			</form>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">


	{{-- TODO:: Refactor the script --}}
	
	let main_select = document.getElementById('main_category');

	main_select.addEventListener('change',function(){

		let all_options= document.querySelectorAll('.order-option');
		let all_inputs = document.querySelectorAll('.form-control');

		document.getElementById('submit-button').style.display="block";
		

		for (let i of all_inputs) {
			i.setAttribute('disabled',true);
		}

		//Hide all options and show only selected
		for (let o of all_options){
			o.style.display = 'none';
		}
		if(this.value == 'Literature Research'){
			let options = document.querySelectorAll('.literature');
			for(let option of  options){
				option.style.display = 'block';
			}
			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}
			let literature_inputs = document.querySelectorAll('.literature .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}
		if(this.value == 'Topic Proposal' || this.value == 'Outline'){
			let options = document.querySelectorAll('.topic');
			for(let option of  options){
				option.style.display = 'block';
			}
			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}
			let literature_inputs = document.querySelectorAll('.topic .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}
		if(this.value == 'Expose'){
			let options = document.querySelectorAll('.expose');
			for(let option of  options){
				option.style.display = 'block';
			}

			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}
			let literature_inputs = document.querySelectorAll('.expose .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}
		if(this.value == 'Academic text types'){

			let options = document.querySelectorAll('.academic');
			for(let option of  options){
				option.style.display = 'block';
			}
			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}
			let literature_inputs = document.querySelectorAll('.academic .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}
		if(this.value == 'Editoral work'){

			let options = document.querySelectorAll('.editoral');
			for(let option of  options){
				option.style.display = 'block';
			}

			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}
			let literature_inputs = document.querySelectorAll('.editoral .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}
		if(this.value == 'Additional services'){

			let options = document.querySelectorAll('.additional');
			for(let option of  options){
				option.style.display = 'block';
			}

			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}

			let literature_inputs = document.querySelectorAll('.additional .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}
		if(this.value == 'Other text types'){

			let options = document.querySelectorAll('.other');
			for(let option of  options){
				option.style.display = 'block';
			}

			let user_inputs = document.querySelectorAll('.user-info-input');
			for (let i of user_inputs) {
				i.removeAttribute('disabled');
			}

			let literature_inputs = document.querySelectorAll('.other .form-control');
			document.getElementById('main_category').removeAttribute('disabled');
			for (let i of literature_inputs) {
				i.removeAttribute('disabled');
			}
		}

		document.getElementById('milestones').removeAttribute('disabled');
	})
</script>

@endsection