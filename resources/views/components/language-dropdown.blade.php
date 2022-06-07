	<select name="language" class="form-control" required>
		<option selected disabled value="">Please select a language</option>
		@foreach($languages as $language)
			<option>{{$language->name}}</option>
		@endforeach
	</select>