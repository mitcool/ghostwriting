
					{{-- Additional services  --}}
					<div class="col-md-6 additional order-option">
						<select name="subcategory" class="form-control" required>
							<option disabled selected=""value="">Please select subcategory</option>
							<option>Presentation including PowerPoint slides</option>
							<option>Corporate book, Business plan</option>
							<option>Market analysis</option>
							<option>Case study (research mehod)</option>
							<option>Development of qualitative interview</option>
							<option>Development of quantitative interview</option>
							<option>Review</option>
							<option>Letter of application/CV</option>
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