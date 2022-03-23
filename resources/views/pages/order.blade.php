@extends('template')

@section('css')
<style type="text/css">
	.additional,
	.editor,
	.academic-text,
	.expose,
	.outline,
	.topic,
	.literature{
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

			<h4 style="margin-top:40px;">How can we reach you?</h4>

			<form style="min-height: 500px;" method="POST" action="{{route('request-order')}}">
			{{csrf_field()}}
				<div class="row">
					<div class="col-md-3">
						<input type="text" name="name" class="form-control my-2" placeholder="Name">
					</div>
					<div class="col-md-3">
						<input type="text" name="phone" class="form-control my-2" placeholder="Phone">
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-6">
						<input type="email" name="email" class="form-control my-2" placeholder="Email">
					</div>
					<div class="col-md-6"></div>
				</div>

				<h4 style="margin-top:40px;">Order details</h4>
			
				<div class="row">
					<div class="col-md-6">
						<select name="main" class="form-control" id="main_category">
							<option selected disabled>Please select main category</option>
							@foreach($main_options as $option)
								<option value="{{$option->id}}">{{$option->name_en}}</option>
							@endforeach
						</select>	
					</div>
					<div class="col-md-6"></div>
					<x-literature-order/>
					<x-topic-order/>
					<x-outline-order/>
					<x-expose-order/>
					<x-academic-text-order/>
					<x-editoral-work-order/>
					<x-additional-services/>

					<div class="col-md-6" id="submit-button">
						<hr>
						<button type="submit" style="background:#F84162;color:white;border:none;outline: none;border-radius:30px;padding:10px 20px;">Send request</button>
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
	
	let main_select = document.getElementById('main_category');

	main_select.addEventListener('change',function(){

		let type = this.value;
		let all_selects_div = document.getElementsByClassName('order-select');

		let all_inputs = document.querySelectorAll('.order-select input');
		let all_selects = document.querySelectorAll('.order-select select');
		let all_textareas = document.querySelectorAll('.order-select textarea');

		//Input disabled
		for(let input of all_inputs){
			input.setAttribute('disabled',true);
		}

		//Select disabled
		for(let select of all_selects){
			select.setAttribute('disabled',true);
		}

		//Textarea disabled
		for(let textarea of all_textareas){
			textarea.setAttribute('disabled',true);
		}

		//Wrapper divs
		for (var select of all_selects_div) {
		  select.style.display = 'none';
		}

		if(type == 1){
			let literature_selects = document.getElementsByClassName('literature');
			let literature_inputs = document.querySelectorAll('.literature input, .literature select, .literature textarea');
			for(let input of literature_inputs){
				input.removeAttribute('disabled');
			}
			for (var select of literature_selects) {
			  select.style.display = 'block';
			}
		}
		else if(type == 2){
			let topic_selects = document.getElementsByClassName('topic');
			for (var select of topic_selects) {
			  select.style.display = 'block';
			}
		}
		else if(type == 3){
			let outline_selects = document.getElementsByClassName('outline');
			for (var select of outline_selects) {
			  select.style.display = 'block';
			}
		}
		else if(type == 4){
			let expose_selects = document.getElementsByClassName('expose');
			for (var select of expose_selects) {
			  select.style.display = 'block';
			}
		}
		else if(type == 5){
			let academic_selects = document.getElementsByClassName('academic-text');
			for (var select of academic_selects) {
			  select.style.display = 'block';
			}
		}
		else if(type == 6){
			let editor_selects = document.getElementsByClassName('editor');
			for (var select of editor_selects) {
			  select.style.display = 'block';
			}
		}
		else if(type == 7){
			let additional_selects = document.getElementsByClassName('additional');
			for (var select of additional_selects) {
			  select.style.display = 'block';
			}
		}
	})
</script>

@endsection