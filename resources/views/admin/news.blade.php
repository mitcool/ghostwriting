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
	<h2 class="text-center">Add News</h2>
	<form class="row" action="{{route('create-news')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="col-md-6">
			<label class="d-block font-weight-bold">Title (En)</label>
			<input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
			<label class="d-block font-weight-bold">Description (En)</label>
			<textarea class="form-control" name="description_en" rows="10">{{old('description_en')}}</textarea>
			<label class="d-block font-weight-bold">Content (En)</label>
			<textarea class="form-control ckeditor" name="content_en">{{old('content_en')}}</textarea>
		</div>
		<div class="col-md-6">
			<label class="d-block font-weight-bold">Title (De)</label>
			<input type="text" name="title_de" class="form-control" value="{{old('title_de')}}">
			<label class="d-block font-weight-bold">Description (De)</label>
			<textarea class="form-control" name="description_de" rows="10">{{old('description_de')}}</textarea>
			<label class="d-block font-weight-bold">Content (De)</label>
			<textarea class="form-control ckeditor" name="content_de">{{old('content_de')}}</textarea>
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