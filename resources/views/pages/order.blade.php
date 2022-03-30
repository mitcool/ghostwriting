@extends('template')

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
						<input type="text" name="phone" class="form-control my-2 user-info-input" placeholder="Phone" required>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-6">
						<input type="email" name="email" class="form-control my-2 user-info-input" placeholder="Email" required>
					</div>
					<div class="col-md-6"></div>
				</div>
				@endguest

				<h4 style="margin-top:40px;">Order details</h4>
			
				<div class="row">
					<div class="col-md-6">
						<select name="main" class="form-control" id="main_category" required>
							<option selected disabled value="">Please select main category</option>
							<option value="1">Literature Research</option>
							<option value="2">Topic Proposal</option>
							<option value="3">Outline</option>
							<option value="4">Expose</option>
							<option value="5">Academic text types</option>
							<option value="6">Editoral work</option>
							<option value="7">Additional services</option>
							<option value="8">Other text types</option>
						</select>	
					</div>
					<div class="col-md-6"></div>

					{{-- Literature --}}
					<div class="col-md-6 literature order-option">
						<select name="subccategory" class="form-control">
							<option>Term paper, seminar paper</option>
							<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
							<option>Documents thesis, PhD thesis</option>
						</select>
						<input type="number" name="number_of_sources" class="form-control" placeholder="Please indicate the number of sources">
						<select name="subject" class="form-control">
							<option selected disabled>Please select main category</option>
							<option>Business & Economics</option> 
							<option>Law</option>
							 <option>Social Sciences</option>
							 <option>Humanities</option> 
							 <option>Structural Sciences</option>
							 <option>Cultural Sciences</option> 
							 <option>Languages & Cultures</option> 
							 <option>Engineering</option> 
							 <option>Agricultural & Natural Sciences</option> 
							 <option>Medicine</option>
						</select>
					
						<select name="language" class="form-control">
							<option selected disabled>Please select a language</option>
							@foreach($languages as $language)
								<option>{{$language->name}}</option>
							@endforeach
						</select>
					
						<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control">
				
						<input name="topic" placeholder="Topic"  class="form-control" />
				
						<textarea name="instructions" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-md-6 literature order-option"></div>
					{{-- End of literature --}}

					{{-- Topic Proposal and Outline order--}}
					<div class="col-md-6 topic order-option">
						<select name="subccategory" class="form-control">
							<option>Term paper, seminar paper</option>
							<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
							<option>Documents thesis, PhD thesis</option>
						</select>
						<select name="subject" class="form-control">
							<option selected disabled>Please select main category</option>
							<option>Business & Economics</option> 
							<option>Law</option>
							 <option>Social Sciences</option>
							 <option>Humanities</option> 
							 <option>Structural Sciences</option>
							 <option>Cultural Sciences</option> 
							 <option>Languages & Cultures</option> 
							 <option>Engineering</option> 
							 <option>Agricultural & Natural Sciences</option> 
							 <option>Medicine</option>
						</select>
					
						<select name="language" class="form-control">
							<option selected disabled>Please select a language</option>
							@foreach($languages as $language)
								<option>{{$language->name}}</option>
							@endforeach
						</select>
						<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control">
						<input name="topic" placeholder="Topic"  class="form-control" />
				
						<textarea name="instructions" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-md-6 topic order-option"></div>
					{{-- End of Topic proposal and outline order--}}

					{{-- Expose --}}
					<div class="col-md-6 expose order-option">
						<select name="subccategory" class="form-control">
							<option>Term paper, seminar paper</option>
							<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
							<option>Documents thesis, PhD thesis</option>
						</select>
						<select name="type_of_service" class="form-control">
							<option selected disabled value="" required>Please select type of service</option>
							<option>Theoretical</option>
							<option>Empiricals</option>
						</select>
						<select name="subject" class="form-control">
							<option selected disabled>Please select subject</option>
							<option>Business & Economics</option> 
							<option>Law</option>
							 <option>Social Sciences</option>
							 <option>Humanities</option> 
							 <option>Structural Sciences</option>
							 <option>Cultural Sciences</option> 
							 <option>Languages & Cultures</option> 
							 <option>Engineering</option> 
							 <option>Agricultural & Natural Sciences</option> 
							 <option>Medicine</option>
						</select>
					
						<select name="language" class="form-control">
							<option selected disabled>Please select a language</option>
							@foreach($languages as $language)
								<option>{{$language->name}}</option>
							@endforeach
						</select>
						<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control">
						<input name="topic" placeholder="Topic"  class="form-control" />
				
						<textarea name="instructions" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-md-6 expose order-option"></div>
					{{-- End of expose --}}

					{{-- Academic write service --}}
					<div class="col-md-6 academic order-option">
						<select name="subccategory" class="form-control">
							<option selected disabled value="">Please select subcategory</option>
							<option>Capstone paper</option> 
							<option>Essay</option> 
							<option>Term paper, seminar paper</option> 
							<option>Solution sketch (law)</option> 
							<option>Project paper</option> 
							<option>Diploma thesis;</option>
							<option>Bachelor’s thesis;</option> 
							<option>Master’s thesis;</option> 
							<option>Magister’s thesis;</option> 
							<option>State examination paper;</option> 
							<option>Doctoral thesis, PhD thesis;>
							<option>Research paper;</option> 
							<option>Abstract;</option> 
							<option>Summary/Excerpt</option>
						</select>
						<select name="type_of_service" class="form-control">
							<option selected disabled value="" required>Please select type of service</option>
							<option>Theoretical</option>
							<option>Empiricals</option>
						</select>
						<input type="number" name="number_of_pages" class="form-control" placeholder="Please indicate the number of pages">
						<select name="subject" class="form-control">
							<option selected disabled>Please select subject</option>
							<option>Business & Economics</option> 
							<option>Law</option>
							 <option>Social Sciences</option>
							 <option>Humanities</option> 
							 <option>Structural Sciences</option>
							 <option>Cultural Sciences</option> 
							 <option>Languages & Cultures</option> 
							 <option>Engineering</option> 
							 <option>Agricultural & Natural Sciences</option> 
							 <option>Medicine</option>
						</select>
					
						<select name="language" class="form-control">
							<option selected disabled>Please select a language</option>
							@foreach($languages as $language)
								<option>{{$language->name}}</option>
							@endforeach
						</select>
						<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control">
						<input name="topic" placeholder="Topic"  class="form-control" />
						<textarea name="instructions" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-md-6 academic order-option"></div>
					{{-- End of Academic write service --}}
					
					{{-- Editoral service --}}
					<div class="col-md-6 editoral order-option">
						<select name="subcategory" class="form-control" required>
							<option disabled selected=""value="">Please select subcategory</option>
							<option>Proofreading</option>
							<option>Editing</option>
							<option>Paraphrasing</option>
							<option>Transcriptions</option>
							<option>Formatting,</option>
							<option>Plagiarism assessment</option>
						</select>
						<select name="type_of_service" class="form-control">
							<option selected disabled value="" required>Please select type of service</option>
							<option>Theoretical</option>
							<option>Empiricals</option>
						</select>
						<input type="number" name="number_of_pages" class="form-control" placeholder="Please indicate the number of pages">
						<select name="subject" class="form-control">
							<option selected disabled>Please select subject</option>
							<option>Business & Economics</option> 
							<option>Law</option>
							 <option>Social Sciences</option>
							 <option>Humanities</option> 
							 <option>Structural Sciences</option>
							 <option>Cultural Sciences</option> 
							 <option>Languages & Cultures</option> 
							 <option>Engineering</option> 
							 <option>Agricultural & Natural Sciences</option> 
							 <option>Medicine</option>
						</select>
					
						<select name="language" class="form-control">
							<option selected disabled>Please select a language</option>
							@foreach($languages as $language)
								<option>{{$language->name}}</option>
							@endforeach
						</select>
						<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control">
						<input name="topic" placeholder="Topic"  class="form-control" />
						<textarea name="instructions" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-md-6 editoral order-option"></div>
					{{-- End of Editoral service --}}

					{{-- Additional services  --}}
					<div class="col-md-6 additional order-option">
						<select name="subcategory" class="form-control" required>
							<option disabled selected=""value="">Please select subcategory</option>
							<option>Publication through a scientific publisher</option>
							<option>Peer-reviewed publication in a scientific journal</option>
							<option>Translations</option>
							<option>Statitics</option>
						</select>
						<select name="subject" class="form-control">
							<option selected disabled>Please select subject</option>
							<option>Business & Economics</option> 
							<option>Law</option>
							 <option>Social Sciences</option>
							 <option>Humanities</option> 
							 <option>Structural Sciences</option>
							 <option>Cultural Sciences</option> 
							 <option>Languages & Cultures</option> 
							 <option>Engineering</option> 
							 <option>Agricultural & Natural Sciences</option> 
							 <option>Medicine</option>
						</select>
						<select name="language" class="form-control">
							<option selected disabled>Please select a language</option>
							@foreach($languages as $language)
								<option>{{$language->name}}</option>
							@endforeach
						</select>
						<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control">
						<input name="topic" placeholder="Topic"  class="form-control" />
						<textarea name="instructions" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-md-6 additional order-option"></div>
					{{-- End of Additional services --}}

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

		let all_options= document.querySelectorAll('.order-option');
		let all_inputs = document.querySelectorAll('.form-control');

		for (let i of all_inputs) {
			i.setAttribute('disabled',true);
		}

		//Hide all options and show only selected
		for (let o of all_options){
			o.style.display = 'none';
		}
		if(this.value == 1){
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
		if(this.value == 2 || this.value==3){
			let options = document.querySelectorAll('.topic');
			for(let option of  options){
				option.style.display = 'block';
			}
		}
		if(this.value == 4){
			let options = document.querySelectorAll('.expose');
			for(let option of  options){
				option.style.display = 'block';
			}
		}
		if(this.value == 5){

			let options = document.querySelectorAll('.academic');
			for(let option of  options){
				option.style.display = 'block';
			}
		}
		if(this.value == 6){

			let options = document.querySelectorAll('.editoral');
			for(let option of  options){
				option.style.display = 'block';
			}
		}
		if(this.value == 7){

			let options = document.querySelectorAll('.additional');
			for(let option of  options){
				option.style.display = 'block';
			}
		}
		if(this.value == 8){

			let options = document.querySelectorAll('.other');
			for(let option of  options){
				option.style.display = 'block';
			}
		}
	})
</script>

@endsection