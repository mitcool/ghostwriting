@extends('admin.home')

@section('css')
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')

<div class="container shadow p-3">
	<h2 class="text-center">Add {{$type}}</h2>
	<hr>
	<form action="{{route('add-discipline-service')}}" method="POST">
		{{csrf_field()}}
		<div class="row">
			<input type="hidden" name="type" value="{{$type}}">
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Name (En)</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Name (De)</label>
				<input type="text" name="name_de" class="form-control" required>
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Description (En)</label>
				<textarea name="description" class="ckeditor" required></textarea>
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Description (De)</label>
				<textarea name="description_de" class="ckeditor" required></textarea>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<button class="red-button mb-2">Add {{$type}}</button>
		</div>
	</form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
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