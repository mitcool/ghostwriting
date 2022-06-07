<div class="col-md-6 additional order-option">
	<select name="subcategory" class="form-control" required id="additional_subcategory">
		<option disabled selected value="">Please select subcategory</option>
		<option>Publication through a scientific publisher</option>
		<option>Peer-reviewed publication in a scientific journal</option>
		<option>Translations</option>
		<option>Statitics</option>
	</select>

	<x-number-input/>

	<x-subject-dropdown/>
	
	<x-language-dropdown/>

	<x-deadline-input/>

	<x-topic-input/>

	<x-instructions-textarea/>

</div>
<div class="col-md-6 additional order-option"></div>
	{{-- End of Additional services --}}