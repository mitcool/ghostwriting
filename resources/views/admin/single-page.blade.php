@extends('admin.home')

@section('css')

<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>

@endsection

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
				@if($texts_en[$i]->ckeditor==0)
				<input type="text"  class="form-control my-2" name="texts_en[{{$texts_en[$i]->id}}]" value="{{$texts_en[$i]->text}}">
				@else
				<textarea class="ckeditor" name="texts_en[{{$texts_de[$i]->id}}]" id="{{$i}}">{{$texts_de[$i]->text}}</textarea>
				@endif
			</div>
			<div class="col-md-6">
				@if($texts_de[$i]->ckeditor==0)
				<input type="text"  class="form-control my-2" name="texts_de[{{$texts_de[$i]->id}}]" value="{{$texts_de[$i]->text}}">
				@else
				<textarea class="ckeditor" name="texts_de[{{$texts_de[$i]->id}}]" id="{{$i}}">{{$texts_de[$i]->text}}</textarea>
				@endif
			</div>
		@endfor
		<div class="text-center col-md-12">
			<hr>
			<button class="red-button">Save texts</button>
		</div>
	</form>

	@if($page == 'services')
		<hr>
		<h3 class="text-center">Edit Services</h3>
		
		<form action="{{route('save-service')}}" method="POST">
			{{csrf_field()}}
			@foreach($services as $service)
			  <div class="row my-2">
			  	<div class="col-md-6">
			  		<input type="text" name="names[{{$service->id}}]" value="{{$service->name}}" class="form-control">
			  	</div>
			  	<div class="col-md-6">
			  		<input type="text" name="names_de[{{$service->id}}]" value="{{$service->name_de}}" class="form-control">
			  	</div>
			  </div>
			  <div class="row my-2">
			  	<div class="col-md-6">
			  		<textarea class="ckeditor" name="descriptions[{{$service->id}}]">{{$service->description}}</textarea>
			  	</div>
			  	<div class="col-md-6">
			  		<textarea class="ckeditor" name="descriptions_de[{{$service->id}}]">{{$service->description_de}}</textarea>
			  	</div>
			  </div>
			  <hr>
			@endforeach
			<div class="text-center col-md-12">
				<button class="red-button">Save services</button>
			</div>
			
		</form>
		<hr>
	@endif
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