{{-- Other services --}}
<div class="col-md-6 other order-option">
	<select name="subcategory" class="form-control" required id="other_subcategory">
		<option disabled selected value="">Please select subcategory</option>
		<option>Presentation including PowerPoint slides</option>
		<option>Corporate book, Business plan</option>
		<option>Market analysis</option>
		<option>Case study (research mehod)</option>
		<option>Development of qualitative interview</option>
		<option>Development of quantitative interview</option>
		<option>Review</option>
		<option>Letter of application/CV</option>
	</select>

	<select name="type_of_service" class="form-control" required id="other_type_of_service">
		<option selected disabled value="">Please select type of service</option>
		<option>Theoretical</option>
		<option>Empiricals</option>
	</select>

	<x-number-input/>

	<x-subject-dropdown/>
	<x-language-dropdown/>
	<x-deadline-input/>
	<x-topic-input/>
	<x-instructions-textarea/>
	
</div>
<div class="col-md-6 other order-option"></div>
{{-- End of other services --}}