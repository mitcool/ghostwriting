<div class="col-md-6 academic order-option">
	<select name="subccategory" class="form-control" required id="academic_subcategory">
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
	<select name="type_of_service" class="form-control" required>
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
<div class="col-md-6 academic order-option"></div>
