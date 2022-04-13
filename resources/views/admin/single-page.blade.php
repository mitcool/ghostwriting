@extends('admin.home')


@section('content')

<div class="container shadow my-2 p-3">
	<h2 class="text-center">Edit texts of this page</h2>
	<hr>
	<form action="{{route('save-text')}}" method="POST" class="row">
		<div class="col-md-6 text-center">
			<h4 class="font-weight-bold">English</h4>
			<hr>
		</div>
		<div class="col-md-6 text-center">
			<h4 class="font-weight-bold">German</h4>
			<hr>
		</div>
		{{csrf_field()}}
		@for($i=0; $i<count($texts_en); $i++)
			<div class="col-md-6">
				<input type="text"  class="form-control my-2" name="texts_en[{{$texts_en[$i]->id}}]" value="{{$texts_en[$i]->text}}">
			</div>
			<div class="col-md-6">
				<input type="text"  class="form-control my-2" name="texts_de[{{$texts_de[$i]->id}}]" value="{{$texts_de[$i]->text}}">
			</div>
		@endfor
		<div class="text-center col-md-12">
			<hr>
			<button class="red-button">Save texts</button>
		</div>
	</form>
</div>

@endsection