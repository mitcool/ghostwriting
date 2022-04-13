{{-- Other services --}}
<div class="col-md-6 other order-option">
	<select name="subcategory" class="form-control" required>
		<option disabled selected value="">Please select subcategory</option>
		<option>Publication through a scientific publisher</option>
		<option>Peer-reviewed publication in a scientific journal</option>
		<option>Translations</option>
		<option>Statitics</option>
	</select>
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
	<textarea name="instructions" class="form-control" rows="5" required placeholder="Project instructions(Message)"></textarea>
</div>
<div class="col-md-6 other order-option"></div>
{{-- End of other services --}}