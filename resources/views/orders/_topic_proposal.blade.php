{{-- Topic Proposal and Outline order--}}
<div class="col-md-6 topic order-option">
	<select name="subccategory" class="form-control" required>
		<option selected disabled value="">Please select sub-category</option>
		<option>Term paper, seminar paper</option>
		<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
		<option>Documents thesis, PhD thesis</option>
	</select>

	<x-subject-dropdown/>	
	<x-language-dropdown/>
	<x-deadline-input/>
	<x-topic-input/>
	<x-instructions-textarea/>
	
</div>
<div class="col-md-6 topic order-option"></div>
{{-- End of Topic proposal and outline order--}}