	{{-- Expose --}}
	<div class="col-md-6 expose order-option">
		<select name="subccategory" class="form-control" required>
			<option selected disabled value="">Please select sub-category</option>
			<option>Term paper, seminar paper</option>
			<option>Diploma thesis, Bachelor's thesis, Master's thesis</option>
			<option>Documents thesis, PhD thesis</option>
		</select>
		<select name="type_of_service" class="form-control" required>
			<option selected disabled value="" >Please select type of service</option>
			<option>Theoretical</option>
			<option>Empiricals</option>
		</select>

		<x-subject-dropdown/>
		<x-language-dropdown/>
		<x-deadline-input/>
		<x-topic-input/>
		<x-instructions-textarea/>
		
	</div>
	<div class="col-md-6 expose order-option"></div>
	{{-- End of expose --}}