{{-- Editoral service --}}
<div class="col-md-6 editoral order-option">
	<select name="subcategory" class="form-control" required id="editoral_subcategory">
		<option disabled selected value="">Please select subcategory</option>
		<option>Proofreading</option>
		<option>Editing</option>
		<option>Paraphrasing</option>
		<option>Transcriptions</option>
		<option>Formatting</option>
		<option>Plagiarism assessment</option>
	</select>

	<select name="type_of_service" class="form-control" required id="type_of_service">
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
<div class="col-md-6 editoral order-option"></div>
{{-- End of Editoral service --}}