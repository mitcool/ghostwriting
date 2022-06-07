@extends('template')

@section('css')

<style type="text/css">
	#main_wrapper{
		padding:40px;
		min-height:800px;
	}
	#image_wrapper{
		margin-top:30px;
	}
	#heading{
		font-weight: bold;
	}
	.price{
		margin-top:100px;
		display: flex;
		justify-content: space-around;
	}
	.price span{
		font-size:1.3rem;
		font-weight: bold;
	}
	#register_button{
		border-radius: 30px;
		font-size:1.2rem;
		padding:10px 20px;
	}
	.form-control:focus,
	.form-control:active{
		outline:none !important;
		border:none !important;
	}
	#number_error{
		font-size:13px;
		color:red;
	}
	@media only screen and (max-width: 768px) {
		.mobile-sidenav{
			display:block;
		}
		.desktop-sidenav{
			display:none;
		}
		#calculator select{
			font-size: 16px;
		}
	}
</style>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
@endsection
@section('content')
	<img src="{{asset('images/prices-background.png')}}" class="w-100">
	<div class="container-fluid" id="main_wrapper">
		<div class="row" id="main_container">
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<h1 id="heading">{{Session::get('locale') == 'de' ? 'Unser Service-Portfolio' :'Our service portfolio'}}</h1>
				<div class="d-flex" id="image_wrapper">
					<div>
						<img src="{{asset('images/calculator.png')}}" class="calculator-image">
					</div>
					<div class="ms-5" id="info_wrapper">
						<p>You can use our calculator</p>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a,</p>
					</div>
				</div>
				<div id="calculator" class="mt-3">
						{{-- Main --}}
						<select class="question form-control my-2" id="main">
							<option selected disabled>{{Session::get('locale')=='de' 
								? 'Bitte wählen Sie die Hauptkategorie aus' 
								: 'Please select main category'}}
							</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Literaturrecherche' : 'Literature research'}}</option>
							<option value="2">{{Session::get('locale')=='de' ? 'Themenvorschlag' : 'Topic proposal'}}</option>
							<option value="3">{{Session::get('locale')=='de' ? 'Gliederung' : 'Outline'}}</option> 
							<option value="4">Exposé</option>
							<option value="5">{{Session::get('locale')=='de' ? 'Akademische Textsorten' : 'Theses & papers'}}</option>

							<option value="6">{{Session::get('locale')=='de' ? 'Sonstige Textsorten' : 'Other text types'}}</option>
							<option value="7">{{Session::get('locale')=='de' ? 'Redaktionelle Arbeiten' : 'Editorial work'}}</option>
							<option value="8">{{Session::get('locale')=='de' ?  'Zusätzliche Leistungen' : 'Additional services'}}</option>
						</select>

						{{-- Subcategory --}}
						<select class="question form-control my-2 d-none" data-class="subcategory" id="subcategory">

							<option class="subcategory-option common d-none" selected disabled>{{
									Session::get('locale')=='de' 
											? 'Bitte wählen Sie eine Unterkategorie aus' 
											: 'Please select sub-category'}}
							</option>
							<option class="subcategory-option common d-none" value="1">{{
										Session::get('locale')=='de' 
											? 'Hausarbeit, Seminararbeit' 
											: 'term paper, seminar paper'}}
							</option>
				 			<option class="subcategory-option common d-none" value="2">{{
					 					Session::get('locale')=='de' 
					 						? 'Diplomarbeit, Bachelorarbeit, Masterarbeit' 
					 						: 'diploma thesis, Bachelor’s thesis, Master’s thesis'}}
					 		</option>
							<option class="subcategory-option common d-none" value="3">{{
										Session::get('locale')=='de' 
											? 'Doktorarbeit, PhD-Thesis'
											: 'doctoral thesis, PhD thesis'}}
							</option>


							<option class="subcategory-option thesis d-none" value="4">Capstone project</option>
							<option class="subcategory-option thesis d-none" value="5">Essay</option>

							<option class="subcategory-option thesis d-none" value="6">{{
										Session::get('locale')=='de' 
											? 'Hausarbeit, Seminararbeit' 
											: 'term paper, seminar paper'}}
							</option>

							<option class="subcategory-option thesis d-none" value="7">{{
										Session::get('locale')=='de' 
											? 'Juristische Lösungskizze' 
											: 'Law essay'}}
							</option>

							<option class="subcategory-option thesis d-none" value="8">{{
										Session::get('locale')=='de' 
											? 'Projektarbeit' 
											:'Project paper'}}
							</option>

							<option class="subcategory-option thesis d-none" value="9">{{
										Session::get('locale')=='de' 
											?'Diplomarbeit' 
											:'Diploma thesis'}}
							</option>
							<option class="subcategory-option thesis d-none" value="10">{{
										Session::get('locale')=='de' 
											?'Bachelorarbeit' 
											:'Bachelor’s thesis'}}
							</option>
							<option class="subcategory-option thesis d-none" value="11">{{
										Session::get('locale')=='de' 
											?'Masterarbeit' 
											:'Master’s thesis'}}
							</option>
							<option class="subcategory-option thesis d-none" value="12">{{
										Session::get('locale')=='de' 
											?'Magisterarbeit' 
											:'Magister’s thesis'}}
							</option>
							<option class="subcategory-option thesis d-none" value="13">{{
										Session::get('locale')=='de' 
											?'Staatsexamensarbeit' 
											:'Examination paper'}}
							</option>
							<option class="subcategory-option thesis d-none" value="14">{{
										Session::get('locale')=='de' 
											? 'Doktorarbeit, PhD-Arbeit' 
											: 'Doctoral thesis, PhD thesis'}}
							</option>
							<option class="subcategory-option thesis d-none" value="15">{{
										Session::get('locale')=='de' 
												? 'Wissenschaftlicher Fachartikel/Wissenschaftliche Publikation' 
												: 'Scientific paper'}}
							</option>
							<option class="subcategory-option thesis d-none" value="16">{{
										Session::get('locale')=='de' 
												? 'Abstract' 
												: 'Abstract'}}
							</option>
							<option class="subcategory-option thesis d-none" value="17">{{
										Session::get('locale')=='de' 
												? 'Zusammenfassung/Exzerpt' 
												: 'Summary'}}
							</option>	

							<option class="subcategory-option other d-none" value="18">
								{{Session::get('locale')=='de' 
									? 'Referat einschließlich PowerPoint-Präsentation '
									: 'Presentation (Handout & PowerPoint slides'}}</option>

							<option class="subcategory-option other d-none" value="19">Corporate book</option>
							<option class="subcategory-option other d-none" value="20">
								{{Session::get('locale')=='de' 
									? 'Businessplan '
									: 'Business plan'}}
							</option>
							<option class="subcategory-option other d-none" value="21">
								{{Session::get('locale')=='de' 
									? 'Marktanalyse'
									: 'Market analysis'}}
							</option>
							<option class="subcategory-option other d-none" value="22">
								{{Session::get('locale')=='de'
									? 'Fallstudie (Forschungsmethode) '
									: 'Case study'}}</option>
							<option class="subcategory-option other d-none" value="23">
								{{Session::get('locale')=='de' 
									? 'Entwicklung eines qualitativen Interviews'
									: 'Development of qualitative interview'}}
							</option>
							<option class="subcategory-option other d-none" value="24">
								{{Session::get('locale')=='de' 
									? 'Entwicklung eines quantitativen Interviews'
									: 'Development of quantitative interview' }}
							</option>
							<option class="subcategory-option other d-none" value="25">
								{{Session::get('locale')=='de' 
									? 'Wissenschaftliches' 
									: 'Review'}}
							</option>
							<option class="subcategory-option other d-none" value="26">
								{{Session::get('locale')=='de' 
								   ? 'Bewerbungsschreiben/Lebenslauf'
								   : 'Letter of application/CV'}}
							</option>	

							<option class="subcategory-option editoral d-none" value="27">{{Session::get('locale')=='de' ? 'Korrektorat' :'Proofreading'}}</option>
							<option class="subcategory-option editoral d-none" value="28">{{Session::get('locale')=='de' ? 'Lektorat' : 'Editing'}}</option>
							<option class="subcategory-option editoral d-none" value="30">{{Session::get('locale')=='de' ?'Paraphrasieren' :'Paraphrasing'}}</option>
							<option class="subcategory-option editoral d-none" value="31">{{Session::get('locale')=='de' ?'Transkriptionen' :'Transcriptions'}}</option>
							<option class="subcategory-option editoral d-none" value="32">{{Session::get('locale')=='de' ? 'Formatierungsarbeiten' : 'Formatting'}}</option>
							<option class="subcategory-option editoral d-none" value="33">{{Session::get('locale')=='de' ? 'Plagiatsprüfung' : 'Plagiarism assessment'}}</option>


							 <option  class="subcategory-option additional d-none" value="34">
							 		{{Session::get('locale')=='de' 
							 			? 'Peer-Review-Veröffentlichung in einer wissenschaftlichen Zeitschrift' 
							 			: 'Peer-reviewed publication in a scientific journal'}}
							 				
							 </option>
							 <option  class="subcategory-option additional d-none" value="35">
							 		{{Session::get('locale')=='de' 
							 			? 'Veröffentlichung durch einen Wissenschaftsverlag'
							 			: 'Publication in a conference journal' }}
							 		
							 </option>
							 <option  class="subcategory-option additional d-none" value="36">
							 		{{Session::get('locale')=='de' 
							 			? 'Übersetzungen'
							 			: 'Translations' }}
							</option>
							 <option  class="subcategory-option additional d-none" value="37">
							 	{{Session::get('locale')=='de' 
							 		? 'Statistiken' 
							 		: 'Statistics' }}
							</option>
						</select>

						{{-- Unit --}}
						<input type="number" class="form-control my-2 question d-none" id="number" placeholder="Number of sourses">
						<span id="number_error"></span>
						
						{{-- Subjects --}}
						<select data-class="term-topic" class="question form-control my-2 d-none" id="factor">
							<option disabled selected>Select Subject</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Wirtschaftswissenschaften' : 'Economics'}}</option>
							<option value="1.2">{{Session::get('locale')=='de' ? 'Rechtswissenschaften' : 'Law'}}</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Sozialwissenschaften' : 'Social Sciences'}}</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Geisteswissenschaften' : 'Humanities'}}</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Strukturwissenschaften' : 'Structural Sciences'}}</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Kulturwissenschaften' : 'Cultural Sciences'}}</option>
							<option value="1">{{Session::get('locale')=='de' ? 'Sprachen & Kulturen': 'Languages & Cultures'}}</option>
							<option value="1.2">{{Session::get('locale')=='de' ? 'Ingenieurwissenschaften' : 'Engineering'}}</option>
							<option value="1.2">{{Session::get('locale')=='de' ? 'Agrar- und Naturwissenschaften' : 'Agricultural & Natural Sciences'}}</option>
							<option value="1.2">{{Session::get('locale')=='de' ? 'Medizin' : 'Medicine'}}</option>
						</select>
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="d-flex price">
					<span>Estimated price</span>
					<span id="price">&euro;0.00</span>
				</div>
				<p style="font-size: 18px">{{-- Literature work, 10 pages, level normal, incl. 0.5 hour coaching, in German --}}</p>
				<div class="d-flex mt-5 mb-5" style="justify-content: center;">
					@guest
					<button id="register_button" class="btn theme-background text-white" data-bs-toggle="modal" data-bs-target="#register_modal">Request without obligation</button>
					@else
					<a id="register_button" class="btn theme-background text-white" href="{{route('order')}}">Request without obligation</a>
					@endguest
				</div>
				
				<p style="text-align-last: center;font-size: 18px;">Or get non-binding advice at</p>
				<div class="d-flex" style="justify-content: center;">
					<i class="fa-solid fa-phone fa-2x" style="color: #555555"></i>
					<p style="font-size: 24px">{{$phone}}</p>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	<script type="text/javascript">

		//Common
		$('#main').on('change',function(){
			clearPrice();
			$('.question').addClass('d-none');
			$(this).removeClass('d-none')
			let value = $(this).val();
			$('.subcategory-option').addClass('d-none');
			$('#subcategory').removeClass('d-none');
			$('#subcategory').prop('selectedIndex',0);
			if(value==1 || value==2 || value == 3 || value == 4){
				$('.subcategory-option.common').removeClass('d-none');
			}
			else if(value == 5){
				$('.subcategory-option.thesis').removeClass('d-none');
			}
			else if(value == 6){
				$('.subcategory-option.other').removeClass('d-none');
			}
			else if(value == 7){
				$('.subcategory-option.editoral').removeClass('d-none');
			}
			else if(value == 8){
				$('.subcategory-option.additional').removeClass('d-none');
			}
		});

		$('#subcategory').on('change',function(){
			clearPrice();
			let main_select_value = $('#main').val();
			let subcategory_value = $('#subcategory').val();
			$('#number').val('');
			$('#factor').prop('selectedIndex',0);
			$('#number').addClass('d-none');
			$('#factor').addClass('d-none');
			if(main_select_value == 1 || 
				(main_select_value==6 && $(this).val() != 26) || 
				main_select_value==5 ||
				(main_select_value==8 &&  $(this).val() == 36) || 
				(main_select_value==8 &&  $(this).val() == 37) ||
				main_select_value==7){
				setPlaceholder(subcategory_value);
				$('#number').removeClass('d-none');
			}
			else if(main_select_value==6 && $(this).val() == 26){
				let factor = 1;
				let pages = 1;
				setFactorPrice(main_select_value, subcategory_value,factor,pages);
			}
			else if(main_select_value==8 && $(this).val() == 34){
				let factor = 1;
				let pages = 1;
				setFactorPrice(main_select_value, subcategory_value,factor,pages);
			}
			else if(main_select_value==8 && $(this).val() == 35){
				let factor = 1;
				let pages = 1;
				setFactorPrice(main_select_value, subcategory_value,factor,pages);
			}
			else{
				$('#factor').removeClass('d-none');
			}
		});


		$('#factor').on('change', function(){
			clearPrice();
			let main_select_value = $('#main').val();
			let subcategory_value = $('#subcategory').val();
			let factor = $(this).val();
			let pages = $('#number').val() =='' ? 1 : $('#number').val();
			setFactorPrice(main_select_value, subcategory_value,factor,pages);
		});

		$('#number').on('keyup', function(e) {
			$('#number_error').html('');
			if (e.which != 8 && e.which != 0 && e.which < 48 || e.which > 57)
		    {
		        e.preventDefault();
		        $(this).val('');
		        return;
		    }
			clearPrice();
			let main_select_value = $('#main').val();
			let subcategory_value = $('#subcategory').val();
			let factor = $('#factor').val() ?? 1;
			let pages = $(this).val();
			let validation = validateNumberOfPages(main_select_value,subcategory_value,pages);
			if(validation!==true){
		   		clearPrice();
				$('#number_error').html(validation);
				return;
			}
			if(main_select_value == 5 || (main_select_value == 6 && subcategory_value == 18 )){
				$('#factor').removeClass('d-none');
				setFactorPrice(main_select_value, subcategory_value,factor,pages);
			}
			else{
				setFactorPrice(main_select_value, subcategory_value,factor,pages);
			}
			
		})

		function validateNumberOfPages(main_select_value, subcategory_value,pages){
		   if(pages > 1000){
		   	  return 'Please enter enter a number less then 1000';
		   }
		   if(main_select_value==5){
		   		if(subcategory_value==4 || subcategory_value==5 || subcategory_value==6 || subcategory_value==7){
		   			if(pages > 100){
		   				return 'Pages should be less than 100';
		   			}
		   		} 
		   		if(subcategory_value == 9 || subcategory_value==10 || subcategory_value==11 || subcategory_value==12 ||
		   			subcategory_value == 13 || subcategory_value==14){
		   			if(pages < 21){
		   				
		   				return 'Pages should be more than 20';
		   			}
		   		}
		   		if(subcategory_value == 16 || subcategory_value==17){
		   			if(pages > 20){
		   				return 'Pages should be less than 20';
		   			}
		   		}
			}

			return true;
		}

		function clearPrice(){
			$('#price').html('&euro;0.00');
		}

		function setFactorPrice(main_select_value, subcategory_value,factor,pages=1){

			//If validation pass return TRUE else return ERROR MESSAGE as a STRING
			let validation = validateNumberOfPages(main_select_value,subcategory_value,pages);
			if(validation!==true){
				$('#number').val('')
		   		clearPrice();
				$('#number_error').html(validation);
				return;
			}
			let prices  = [];
			prices[1] = [];
			prices[1][1] = 15;
			prices[1][2] = 15;
			prices[1][3] = 15;

			prices[2] = [];
			prices[2][1] = 200;
			prices[2][2] = 300;
			prices[2][3] = 400;

			prices[3] = [];
			prices[3][1] = 300;
			prices[3][2] = 600;
			prices[3][3] = 1200;

			prices[4] = [];
			prices[4][1] = 400;
			prices[4][2] = 1000;
			prices[4][3] = 2400;

			prices[5] = [];
			prices[5][4] = 85;
			prices[5][5] = 85;
			prices[5][6] = 85;
			prices[5][7] = 85;
			prices[5][8] = pages < 101 ? 85 : 100;
			prices[5][9] = 90;
			prices[5][10] = 90;
			prices[5][11] = 90;
			prices[5][12] = 90;
			prices[5][13] = 90;
			prices[5][14] = 110;
			prices[5][15] = 110;
			prices[5][16] = 100;
			prices[5][17] = 100;

			prices[6] = [];
			prices[6][18] = 75;
			prices[6][19] = pages > 20 ? 250 : 300;
			prices[6][20] = 150;

			prices[7] = [];

			if(pages < 21){
				prices[6][21] = 200;
				prices[7][27] = 5;
			}
			else if(pages < 101){
				prices[6][21] = 180;
				prices[7][27] = 6;
			}
			else{
				prices[6][21] = 150;	
				prices[7][27] = 8;
			}

			prices[6][22] = pages > 20 ? 110 : 120;
			prices[6][23] = 25;
			prices[6][24] = 40;
			prices[6][25] = 150;
			prices[6][26] = 400;

			prices[7][28] = 20;
			prices[7][29] = 8;
			prices[7][30] = pages > 100 ? 60 : 50;
			prices[7][31] = 4;
			prices[7][32] = 10;
			prices[7][33] = 1;

			prices[8] = [];
			prices[8][34] = 800;
			prices[8][35] = 500;
			prices[8][36] = 50;
			prices[8][37] = 95;

			let html_price =  prices[main_select_value][subcategory_value] * factor  * pages;
			let formated_price = formatter.format(html_price);
			$('#price').html(formated_price);
		}

		function setPlaceholder(subcategory_value){
			let placeholder = 'Number of pages';
			if(subcategory_value == 1){
				placeholder= 'Number of sources';
			}
			else if(subcategory_value == 31 || subcategory_value == 18){
				placeholder= 'Number of minutes';
			}
			else if(subcategory_value == 37){
				placeholder= 'Number of hours';
			}
			else if(subcategory_value == 23 || subcategory_value== 24){
				placeholder= 'Number of questions';
			}
			else{
				placeholder= 'Number of pages';
			}
			
			$('#number').attr('placeholder',placeholder)
		}
		// Create our number formatter.
		var formatter = new Intl.NumberFormat('en-US', {
		  style: 'currency',
		  currency: 'EUR',
		});

	</script>
	
@endsection