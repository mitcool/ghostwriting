@extends('admin.home')

@section('css')
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<style type="text/css">
		label{
			margin-top:10px;
			margin-bottom:0;
		}
	</style>
@endsection

@section('content')

<div class="container shadow " style="margin-top:20px;padding:30px;">
	<h2 class="text-center">Edit News</h2>
	<hr>
	<form class="row" action="{{route('edit-single-news-post',$news->id)}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="col-md-6">
			<label class="d-block font-weight-bold">Title (En)</label>
			<input type="text" name="title_en" class="form-control" value="{{$news->title_en}}">
			<label class="d-block font-weight-bold">Description (En)</label>
			<textarea class="form-control" name="description_en" rows="10">{{$news->description_en}}</textarea>
			<label class="d-block font-weight-bold">Content (En)</label>
			<textarea class="form-control ckeditor" name="content_en">{{$news->content_en}}</textarea>
		</div>
		<div class="col-md-6">
			<label class="d-block font-weight-bold">Title (De)</label>
			<input type="text" name="title_de" class="form-control" value="{{$news->title_de}}">
			<label class="d-block font-weight-bold">Description (De)</label>
			<textarea class="form-control" name="description_de" rows="10">{{$news->description_de}}</textarea>
			<label class="d-block font-weight-bold">Content (De)</label>
			<textarea class="form-control ckeditor" name="content_de">{{$news->content_de}}</textarea>
		</div>
		<div class="col-md-12">
			<hr>
			<img src="{{asset('news')}}/{{$news->picture}}" class="w-100">
			<input type="hidden" name="news_id" value="{{$news->id}}">
			<hr>
			<label for="file" class="btn btn-info">If you want to change the image please select a file here <i class="fa-solid fa-upload"></i></label>
			<input id="file" type="file" name="picture" class="d-none">
			<hr>
		</div>
		<div class="col-md-12 text-center mt-3">
			<button class="btn btn-dark">Edit News</button>
		</div>
	</form>
	<hr>
	<form class="text-right" action="{{route('delete-single-news-post',$news->id)}}" method="POST">
		{{csrf_field()}}
		<button class="btn btn-danger">Delete News</button>
	</form>
</div>

@endsection

@section('scripts')
  <script>
        $('.ckeditor').each(function(){

			CKEDITOR.replace( this,{ toolbar :[

				{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Save', 'NewPage', 'Preview', 'Print', '-',] },
				{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
				{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: ['SelectAll', '-', 'Scayt' ] },
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
				'/',
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
				{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
				{ name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'] },
				'/',
				{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
				{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
				{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		
			]});

		})
    </script>
@endsection