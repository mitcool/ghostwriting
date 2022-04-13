@extends('admin.home')


@section('content')
<div class="container shadow my-2 p-3">
	<h4 class="text-center">Edit How it work questions and answers</h4>
	<hr>
	<div class="row">
		@foreach($faqs as $faq)
			<div class="col-md-8 offset-md-2">
				<form action="{{route('edit-faq')}}" method="post" class="p-3">
					{{csrf_field()}}
					<label class="m-0 font-weight-bold">Question(En)</label>
					<input type="" name="question_en" class="form-control my-2" value="{{$faq->question_en}}">
					<label class="m-0 font-weight-bold">Question(De)</label>
					<input type="" name="question_de" class="form-control my-2" value="{{$faq->question_de}}">
					<label class="m-0 font-weight-bold">Answer(En)</label>
					<textarea rows="5" name="answer_en" class="form-control my-2">{{$faq->answer_de}}</textarea>
					<label class="m-0 font-weight-bold">Answer(De)</label>
					<textarea rows="5" name="answer_de" class="form-control my-2">{{$faq->answer_de}}</textarea>
					<div class="text-center">
						<input type="hidden" name="faq_id" value="{{$faq->id}}">
						<button class="red-button">Save Changes</button>
					</div>
				</form>
				<hr>	
			</div>
		@endforeach
	</div>
</div>

@endsection