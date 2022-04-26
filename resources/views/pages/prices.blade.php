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
							<select class="form-control my-2 d-none" id="factor"><option value="0">factor</option><option value="1">Economics</option><option value="2">Law</option><option value="3">Social Sciences</option><option value="4">Humanities</option><option value="1">Structural Sciences</option><option value="4">Cultural Sciences</option><option value="5">Languages & Cultures</option><option value="6">Engineering</option><option value="7">Agricultural & Natural Sciences</option><option value="8">Medicine</option></select>
							<div id="calculator_holder">
								
							</div>
								
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
					document.getElementById("factor").classList.add('d-none');
					$( "#price" ).remove();
					$( "#input_calc" ).remove();
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					let a = 2;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					document.getElementById(a).classList.remove('d-none');
				}
				else if($(this).val()==2){ //topic of proposal
					document.getElementById("factor").classList.remove('d-none');
					$( "#price" ).remove();
					$( "#input_calc" ).remove();
					let a = 3;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
				}
				else if($(this).val()==3){ //outline
					document.getElementById("factor").classList.remove('d-none');
					$( "#price" ).remove();
					$( "#input_calc" ).remove();
					let a = 4;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
					document.getElementById("input_calc").classList.add('d-none');
				}
				else if($(this).val()==4){ //expose
					document.getElementById("factor").classList.remove('d-none');
					$( "#price" ).remove();
					$( "#input_calc" ).remove();
					let a = 5;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
					document.getElementById("input_calc").classList.add('d-none');
				}
				else if($(this).val()==5){ //Theses & papers
					document.getElementById("factor").classList.remove('d-none');
					$( "#price" ).remove();
					$( "#input_calc" ).remove();
					let a = 6;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
				}
				else if($(this).val()==6){  //Other text types
					document.getElementById("factor").classList.remove('d-none');
					$( "#price" ).remove();
					let a = 7;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
				}
				else if($(this).val()==7){ //Editorial work
					document.getElementById("factor").classList.add('d-none');
					$( "#price" ).remove();
					let a = 8;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
				}
				else if($(this).val()==8){ //Additional services
					document.getElementById("factor").classList.add('d-none');
					$( "#price" ).remove();
					let a = 9;
					for(let b = 2; b<=9 ; b++){
						document.getElementById(b).classList.add('d-none');
					}
					for(let c = 2; c<=9 ; c++){
						$('#'+ c).prop('selectedIndex',0);
					}
					document.getElementById(a).classList.remove('d-none');
				}
			});
			$('#factor').on('change',function(){
				if($(this).val()==2  || $(this).val()==8 || $(this).val()==9){
					let price = $('#price').val();
					let factor_price = price * 2;
					alert($('#price').val());
					$( "#price" ).remove();
					$( ".price" ).append('<span id="price" value="'+price+'">'+factor_price+'</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#2').on('change',function(){ //Literature research
				if($(this).val()!=0){
					$("#calculator_holder").append('<input id="input_calc" class="form-control" type="number" name="num" min="1">');
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
					$( ".price" ).append('<span id="price" value="'+price+'">'+price+'</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					let price = 300;
					$( ".price" ).append('<span id="price" value="'+price+'">'+price+'</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					let price = 400;
					$( ".price" ).append('<span id="price" value="'+price+'">'+price+'</span>');
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
			$('#6').on('change',function(){ //Theses n papers
				if($(this).val()<=4){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						$( "#price" ).remove();
						let price = $(this).val() * 85;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
			});
				}
				else if($(this).val()==5){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=100){
							$( "#price" ).remove();
						let price = $(this).val() * 85;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 100;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});
				}
				else if($(this).val()>= 6 && $(this).val()<= 11){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();

						$( ".price" ).append('<span id="price"> Units must be more than 20 </span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 90;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});
				}
				else if($(this).val()<=12){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						$( "#price" ).remove();
						let price = $(this).val() * 110;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
			});
				}
				else if($(this).val()>= 13 && $(this).val()<= 14){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
							let price = $(this).val() * 100;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						
						$( ".price" ).append('<span id="price">Units must be less than 21</span>');
						}
						
			});
									}
			});
					$('#7').on('change',function(){ //other text types
				if($(this).val()==1){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						$( "#price" ).remove();
						let price = $(this).val() * 75;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
			});

				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						let price = $(this).val() * 300;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 250;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 150;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else if($(this).val()==4){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						let price = $(this).val() * 200;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else if($('#input_calc').val()<=100 && $('#input_calc').val()>=21){
							$( "#price" ).remove();
						let price = $(this).val() * 180;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 150;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});
				}
				else if($(this).val()==5){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						let price = $(this).val() * 120;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 110;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});
				}
				else if($(this).val()==6){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 25;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else if($(this).val()==7){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 40;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else if($(this).val()==8){
					$("#input_calc").remove();
					$( "#price" ).remove();
					let price = 400;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#8').on('change',function(){ //editorial work
				if($(this).val()==1){
				$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						let price = $(this).val() * 5;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else if($('#input_calc').val()<=100 && $('#input_calc').val()>=21){
							$( "#price" ).remove();
						let price = $(this).val() * 6;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 8;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});

				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 20;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
							}
				else if($(this).val()==3){
				$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=100){
							$( "#price" ).remove();
						let price = $(this).val() * 50;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						else{
							$( "#price" ).remove();
						let price = $(this).val() * 60;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						}
						
			});
				}
				else if($(this).val()==4){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 4;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else if($(this).val()==5){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 10;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else if($(this).val()==6){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 1;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
	});
			$('#9').on('change',function(){ //additional services
				if($(this).val()==1){
					$( "#price" ).remove();
					let price = 800;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					let price = 500;
					$( ".price" ).append('<span id="price">'+ price +'</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 50;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else if($(this).val()==4){
					$( "#price" ).remove();
					$("#calculator_holder").append('<input id="input_calc" class="form-control d-none" type="number" name="num" min="1" max="100">');
					document.getElementById("input_calc").classList.remove('d-none');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						let price = $(this).val() * 95;
						$( ".price" ).append('<span id="price">'+ price +'</span>');
						
			});
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
				});
			
	</script>
	
@endsection