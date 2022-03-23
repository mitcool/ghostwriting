@extends('admin.home')

@section('css')
	<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
	<style type="text/css">
		label{
			margin-top:10px;
			margin-bottom:0;
		}
	</style>
@endsection

@section('content')

<div class="container shadow " style="margin-top:20px;padding:30px;">
	<h2 class="text-center">Add News</h2>
	<form class="row" action="{{route('create-news')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="col-md-6">
			<label class="d-block font-weight-bold">Title (En)</label>
			<input type="text" name="title_en" class="form-control">
			<label class="d-block font-weight-bold">Description (En)</label>
			<textarea class="form-control" name="description_en" rows="10"></textarea>
			<label class="d-block font-weight-bold">Content (En)</label>
			<textarea class="form-control" name="content_en"></textarea>
		</div>
		<div class="col-md-6">
			<label class="d-block font-weight-bold">Title (De)</label>
			<input type="text" name="title_de" class="form-control">
			<label class="d-block font-weight-bold">Description (De)</label>
			<textarea class="form-control" name="description_de" rows="10"></textarea>
			<label class="d-block font-weight-bold">Content (De)</label>
			<textarea class="form-control" name="content_de"></textarea>
		</div>
		<div class="col-md-12">
			<hr>
			<input type="file" name="picture">
			<hr>
		</div>
		<div class="col-md-12 text-center mt-3">
			<button class="red-button">Create News</button>
		</div>
	</form>
</div>

@endsection

@section('scripts')
  <script>
        CKEDITOR.replace( 'content_en' );
        CKEDITOR.replace( 'content_de' );
    </script>
@endsection