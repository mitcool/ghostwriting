@extends('admin.home')

@section('css')
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<style type="text/css">
		.disciplines-row:nth-child(odd){
			background: white;
		}
		.disciplines-row:nth-child(even){
			background: #f3f3f3;
		}
	</style>
@endsection

@section('content')

<div class="container shadow p-3 my-3">
	<h3 class="text-center">Edit {{$resource->name}}</h3>
	<hr>
	<form action="{{route('edit-disciplines',$resource->id)}}" method="POST">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Name (En)</label>
				<input type="text" name="name" value="{{$resource->name}}" class="form-control">
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Name (De)</label>
				<input type="text" name="name_de" value="{{$resource->name_de}}" class="form-control">
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Description (En)</label>
				<textarea type="text" name="description" class="ckeditor">{{$resource->description}}</textarea>
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold my-1">Description (De)</label>
				<textarea type="text" name="description_de" class="ckeditor">{{$resource->description_de}}</textarea>
			</div>
			<div class="col-md-12 text-center">
				<hr>
				<input type="hidden" name="type" value="{{$type}}">
				<button class="bg-info red-button">Edit {{$resource->name}}</button>
			</div>
		</div>
	</form>
	<div class="w-100 text-right">
		<form action="{{route('delete-discipline',$resource->id)}}" method="POST" class="text-right">
			{{csrf_field()}}
			<input type="hidden" name="type" value="{{$type}}">
			<button class="red-button">Delete {{$resource->name}}</button>
		</form>
	</div>
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