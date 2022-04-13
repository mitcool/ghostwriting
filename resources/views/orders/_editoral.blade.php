{{-- Editoral service --}}
<div class="col-md-6 editoral order-option">
	<select name="subcategory" class="form-control" required>
		<option disabled selected value="">Please select subcategory</option>
		<option>Proofreading</option>
		<option>Editing</option>
		<option>Paraphrasing</option>
		<option>Transcriptions</option>
		<option>Formatting,</option>
		<option>Plagiarism assessment</option>
	</select>
	<select name="type_of_service" class="form-control" required>
		<option selected disabled value="">Please select type of service</option>
		<option>Theoretical</option>
		<option>Empiricals</option>
	</select>
	<input type="number" name="number_of_pages" class="form-control" placeholder="Please indicate the number of pages" required />
	<select name="subject" class="form-control" required>
		<option selected disabled value="">Please select subject</option>
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
		<option selected disabled value="">Please select a language</option>
		@foreach($languages as $language)
			<option>{{$language->name}}</option>
		@endforeach
	</select>
	<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control" required />
	<input name="topic" placeholder="Topic"  class="form-control" required />
	<textarea name="instructions" class="form-control" rows="5" placeholder="Project instructions(Message)" required></textarea>
</div>
<div class="col-md-6 editoral order-option"></div>
{{-- End of Editoral service --}}