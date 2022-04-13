{{-- Topic Proposal and Outline order--}}
<div class="col-md-6 topic order-option">
	<select name="subccategory" class="form-control" required>
		<option selected disabled value="">Please select sub-category</option>
		<option>Term paper, seminar paper</option>
		<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
		<option>Documents thesis, PhD thesis</option>
	</select>
	<select name="subject" class="form-control" required>
		<option selected disabled value="">Please select main category</option>
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
	<input type="text" onfocus="(this.type='date')"  placeholder="Deadline" name="deadline" class="form-control" required/>
	<input name="topic" placeholder="Topic"  class="form-control" required/>

	<textarea name="instructions" class="form-control" rows="5" placeholder="Project instructions(Message)" required></textarea>
</div>
<div class="col-md-6 topic order-option"></div>
{{-- End of Topic proposal and outline order--}}