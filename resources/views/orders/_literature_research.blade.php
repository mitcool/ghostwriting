	{{-- Literature --}}
	<div class="col-md-6 literature order-option">
		<select name="subccategory" class="form-control" required>
			<option>Term paper, seminar paper</option>
			<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
			<option>Documents thesis, PhD thesis</option>order
		</select>
		<input type="number" name="number_of_sources" required class="form-control" placeholder="Please indicate the number of sources">
		<select name="subject" class="form-control" required>
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
	
		<select name="language" class="form-control" required>
			<option selected disabled>Please select a language</option>
			@foreach($languages as $language)
				<option>{{$language->name}}</option>
			@endforeach
		</select>
	
		<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" required name="deadline" class="form-control">

		<input name="topic" placeholder="Topic"  class="form-control" required />

		<textarea name="instructions" class="form-control" required rows="5"></textarea>
	</div>
	<div class="col-md-6 literature order-option"></div>
	{{-- End of literature --}}