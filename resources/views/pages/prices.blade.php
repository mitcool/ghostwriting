@extends('template')

@section('css')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
@endsection
@section('content')
	<img src="{{asset('images/prices-background.png')}}" class="w-100">
	<div class="d-flex" style="justify-content: space-around; height: 800px;">
		<div>
		<p style="font-size: 36px; margin-top: 50px; margin-bottom: 50px;">Our service portfolio</p>
		<div class="d-flex">
			<div>
				<img src="{{asset('images/calculator.png')}}" style="height: 15vh;">
			</div>
			<div class="ms-5" style="width: 350px">
				<p style="font: normal normal 20px/23px Comfortaa;letter-spacing: 0px;color: #2C2C2C;opacity: 1;">You can use our calculator<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a,</p>
			</div>
		</div>
		<div id="calculator" class="mt-3">
			@php $count=1  @endphp
			@php $st=0  @endphp
				@foreach($prices as $question => $options)
					<select class="form-control my-2 {{$question==0 ? 'd-block' : 'd-none'}}" id="{{$count++}}">
						<option selected="true" disabled="disabled" value="0">{{$options[0]->service_type}}</option>
						@php $count_value=1 @endphp
						@foreach($options as $option)
							<option value="{{$count_value++}}">{{$option->name_en}}</option>
						@endforeach
					</select>
					<hr class="hr" style="display: none;">
				@endforeach
				<select class="form-control my-2 d-none" id="factor">
						
				</select>
				<div id="calculator_holder">
					
				</div>
		</div>
		</div>
		<div>
			<div class="d-flex price" style="justify-content: space-between; margin-top: 6.5vw;">
				<p style="font-size: 28px">Estimated price</p>
				<span style="font-size: 28px" id="price"></span>
			</div>
			<p style="font-size: 18px">Literature work, 10 pages, level normal, incl. 0.5 hour coaching, in German</p>
			<div class="d-flex mt-5 mb-5" style="justify-content: center;">
				<button class="btn theme-background text-white" style="border-radius: 30px;height: 50px;width: 400px;font-size: 21px;" data-bs-toggle="modal" data-bs-target="#register_modal">Request without obligation</button>
			</div>
			
			<p style="text-align-last: center;font-size: 18px;">Or get non-binding advice at</p>
			<div class="d-flex" style="justify-content: center;">
				<i class="fa-solid fa-phone fa-2x" style="color: #555555"></i>
				<p style="font-size: 24px">+41 44 5868130</p>
			</div>
		</div>
		
	</div>
	<script type="text/javascript">
			let price = 0;
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
					document.getElementById("factor").classList.add('d-none');
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
					document.getElementById("factor").classList.add('d-none');
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
					document.getElementById("factor").classList.add('d-none');
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
					document.getElementById("factor").classList.add('d-none');
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
					document.getElementById("factor").classList.add('d-none');
					$( "#input_calc" ).remove();
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
					$( "#input_calc" ).remove();
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
					$( "#input_calc" ).remove();
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
				if($(this).val()==2  || $(this).val()==8 || $(this).val()==7){
					let factor_price = price * 1.2;
					$( "#price" ).remove();
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+factor_price+'.00 €</span>');
				}
				else{
					$( "#price" ).remove();
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
			});
			$('#2').on('change',function(){ //Literature research
				document.getElementById("factor").classList.add('d-none');
				if($(this).val()!=0){
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num" min="1">');
					
					$('#input_calc').on('keyup',function(){
						$( "#price" ).remove();
						let price = $(this).val() * 15;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
			});
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#3').on('change',function(){ //Topic proposal
				$("#factor").empty().append('<option selected="true" disabled="disabled" value="0">Factor for special subjects</option><option value="1">Economics</option><option value="2">Law</option><option value="3">Social Sciences</option><option value="4">Humanities</option><option value="1">Structural Sciences</option><option value="4">Cultural Sciences</option><option value="5">Languages & Cultures</option><option value="6">Engineering</option><option value="7">Agricultural & Natural Sciences</option><option value="8">Medicine</option>');
					document.getElementById("factor").classList.remove('d-none');
				if($(this).val()==1){
					$( "#price" ).remove();
					price = 200;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					price = 300;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					price = 400;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#4').on('change',function(){ //Outline
			$("#factor").empty().append('<option selected="true" disabled="disabled" value="0">Factor for special subjects</option><option value="1">Economics</option><option value="2">Law</option><option value="3">Social Sciences</option><option value="4">Humanities</option><option value="1">Structural Sciences</option><option value="4">Cultural Sciences</option><option value="5">Languages & Cultures</option><option value="6">Engineering</option><option value="7">Agricultural & Natural Sciences</option><option value="8">Medicine</option>');
					document.getElementById("factor").classList.remove('d-none'); 
				if($(this).val()==1){
					$( "#price" ).remove();
					price = 300;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					price = 600;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					price = 1200;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#5').on('change',function(){ //Exposé
				$("#factor").empty().append('<option selected="true" disabled="disabled" value="0">Factor for special subjects</option><option value="1">Economics</option><option value="2">Law</option><option value="3">Social Sciences</option><option value="4">Humanities</option><option value="1">Structural Sciences</option><option value="4">Cultural Sciences</option><option value="5">Languages & Cultures</option><option value="6">Engineering</option><option value="7">Agricultural & Natural Sciences</option><option value="8">Medicine</option>');
					document.getElementById("factor").classList.remove('d-none');
				if($(this).val()==1){
					$( "#price" ).remove();
					price = 400;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					price = 1000;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					price = 2400;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#6').on('change',function(){ //Theses n papers
				if($(this).val()!=0){
					document.getElementById("factor").classList.add('d-none');
					$("#factor").empty().append('<option selected="true" disabled="disabled" value="0">Factor for special subjects</option><option value="1">Economics</option><option value="2">Law</option><option value="3">Social Sciences</option><option value="4">Humanities</option><option value="1">Structural Sciences</option><option value="4">Cultural Sciences</option><option value="5">Languages & Cultures</option><option value="6">Engineering</option><option value="7">Agricultural & Natural Sciences</option><option value="8">Medicine</option>');
				}
				if($(this).val()<=4){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						document.getElementById("factor").classList.remove('d-none');
						$( "#price" ).remove();
						price = $(this).val() * 85;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
			});
				}
				else if($(this).val()==5){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control " type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						document.getElementById("factor").classList.remove('d-none');
						if($('#input_calc').val()<=100){
							$( "#price" ).remove();
						price = $(this).val() * 85;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						price = $(this).val() * 100;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});
				}
				else if($(this).val()>= 6 && $(this).val()<= 11){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();

						$( ".price" ).append('<span id="price"> Units must be more than 20 </span>');
						}
						else{
							document.getElementById("factor").classList.remove('d-none');
							$( "#price" ).remove();
						price = $(this).val() * 90;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});
				}
				else if($(this).val()<=12){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						document.getElementById("factor").classList.remove('d-none');
						$( "#price" ).remove();
						price = $(this).val() * 110;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
			});
				}
				else if($(this).val()>= 13 && $(this).val()<= 14){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							document.getElementById("factor").classList.remove('d-none');
							$( "#price" ).remove();
							price = $(this).val() * 100;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						
						$( ".price" ).append('<span id="price">Units must be less than 21</span>');
						}
						
			});
									}
			});
					$('#7').on('change',function(){ //other text types

						$("#factor").empty().append('<option selected="true" disabled="disabled" value="0">Factor for special subjects</option><option value="1">Economics</option><option value="2">Law</option><option value="3">Social Sciences</option><option value="4">Humanities</option><option value="1">Structural Sciences</option><option value="4">Cultural Sciences</option><option value="5">Languages & Cultures</option><option value="6">Engineering</option><option value="7">Agricultural & Natural Sciences</option><option value="8">Medicine</option>');
						if($(this).val()!=1){
							document.getElementById("factor").classList.add('d-none');
					}
				if($(this).val()==1){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						document.getElementById("factor").classList.remove('d-none');
						$( "#price" ).remove();
						price = $(this).val() * 75;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
			});

				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						price = $(this).val() * 300;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						price = $(this).val() * 250;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 150;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==4){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						price = $(this).val() * 200;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else if($('#input_calc').val()<=100 && $('#input_calc').val()>=21){
							$( "#price" ).remove();
						price = $(this).val() * 180;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						price = $(this).val() * 150;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});
				}
				else if($(this).val()==5){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						price = $(this).val() * 120;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						price = $(this).val() * 110;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});
				}
				else if($(this).val()==6){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 25;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==7){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 40;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==8){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 150;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==9){
					document.getElementById("factor").classList.add('d-none');
					$("#input_calc").remove();
					$( "#price" ).remove();
					price = 400;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
			});
			$('#8').on('change',function(){ //editorial work
				document.getElementById("factor").classList.add('d-none');
				if($(this).val()==1){
				$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=20){
							$( "#price" ).remove();
						price = $(this).val() * 5;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else if($('#input_calc').val()<=100 && $('#input_calc').val()>=21){
							$( "#price" ).remove();
						price = $(this).val() * 6;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						price = $(this).val() * 8;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});

				}
				else if($(this).val()==2){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 20;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
							}
				else if($(this).val()==3){
				$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
						if($('#input_calc').val()<=100){
							$( "#price" ).remove();
						price = $(this).val() * 50;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						else{
							$( "#price" ).remove();
						price = $(this).val() * 60;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						}
						
			});
				}
				else if($(this).val()==4){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 4;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==5){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 10;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==6){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 1;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
	});
			$('#9').on('change',function(){ //additional services
				document.getElementById("factor").classList.add('d-none');
				if($(this).val()==1){
					$("#calculator_holder").empty()
					$( "#price" ).remove();
					price = 800;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==2){
					$("#calculator_holder").empty()
					$( "#price" ).remove();
					price = 500;
					$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
				}
				else if($(this).val()==3){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 50;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else if($(this).val()==4){
					$( "#price" ).remove();
					$("#calculator_holder").empty().append('<input id="input_calc" class="form-control" type="number" name="num">');
					$('#input_calc').on('keyup',function(){
							$( "#price" ).remove();
						price = $(this).val() * 95;
						$( ".price" ).append('<span style="font-size:24px;" id="price" value="'+price+'">'+price+'.00 €</span>');
						
			});
				}
				else{
					document.getElementById("input_calc").classList.add('d-none');
				}
				});
			
	</script>
	
@endsection