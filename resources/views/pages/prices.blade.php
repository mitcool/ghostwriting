@extends('template')

@section('css')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
@endsection
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
						<div id="calculator">
						@php $count=1 @endphp
							@foreach($prices as $question => $options)
								<select class="form-control my-2 {{$question==0 ? 'd-block' : 'd-none'}}" id="{{$count++}}">
									<option value="0">{{$question}}</option>
									@php $count_value=1 @endphp
									@foreach($options as $option)
										<option value="{{$count_value++}}">{{$option->name_en}}</option>
									@endforeach
								</select>
								<hr class="hr" style="display: none;">
							@endforeach
								<input id="input_calc" class="form-control d-none" type="number" name="num">
							<hr>
							<h5 class="d-flex fw-bold justify-content-between price">
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
			
			$('#1').on('change',function(){ //question
				if($(this).val()==1){  //literature research
					$( "#price" ).remove();
					document.getElementById("2").classList.remove('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.add('d-none');
				}
				else if($(this).val()==2){ //topic of proposal
					$( "#price" ).remove();
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.remove('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.add('d-none');
					document.getElementById("input_calc").classList.add('d-none');
				}
				else if($(this).val()==3){ //outline
					$( "#price" ).remove();
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.remove('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.add('d-none');
					document.getElementById("input_calc").classList.add('d-none');
				}
				else if($(this).val()==4){ //expose
					$( "#price" ).remove();
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.remove('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.add('d-none');
					document.getElementById("input_calc").classList.add('d-none');
				}
				else if($(this).val()==5){ //Theses & papers
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.remove('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.add('d-none');
				}
				else if($(this).val()==6){  //Other text types
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.remove('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.add('d-none');
				}
				else if($(this).val()==7){ //Editorial work
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.remove('d-none');
					document.getElementById("9").classList.add('d-none');
				}
				else if($(this).val()==8){ //Additional services
					document.getElementById("2").classList.add('d-none');
					document.getElementById("3").classList.add('d-none');
					document.getElementById("4").classList.add('d-none');
					document.getElementById("5").classList.add('d-none');
					document.getElementById("6").classList.add('d-none');
					document.getElementById("7").classList.add('d-none');
					document.getElementById("8").classList.add('d-none');
					document.getElementById("9").classList.remove('d-none');
				}
			});
			$('#2').on('change',function(){ //Literature research
				if($(this).val()!=0){
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						$( "#price" ).remove();
						let price = $(this).val() * 15;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
			});
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#3').on('change',function(){ //Topic proposal
				if($(this).val()==1){
					$( "#price" ).remove();
					let price = 200;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					let price = 300;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					let price = 400;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#4').on('change',function(){ //Outline 
				if($(this).val()==1){
					$( "#price" ).remove();
					let price = 300;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					let price = 600;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					let price = 1200;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#5').on('change',function(){ //Exposé
				if($(this).val()==1){
					$( "#price" ).remove();
					let price = 400;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					let price = 1000;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					let price = 2400;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#6').on('change',function(){ //Exposé
				if($(this).val()==1){
					$( "#price" ).remove();
					let price = 400;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					let price = 1000;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					let price = 2400;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			
			
	</script>
	
@endsection