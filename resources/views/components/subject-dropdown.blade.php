<select name="subject" class="form-control subject" required >
	<option selected disabled value="">Please select a subject</option>
	@foreach($subjects as $subject)
		<option>{{$subject->name}}</option>
	@endforeach
</select>