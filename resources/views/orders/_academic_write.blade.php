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
