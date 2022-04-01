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