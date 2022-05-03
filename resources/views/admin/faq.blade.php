@extends('admin.home')

@section('css')
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<div class="container">
	<h2 class="text-center">Edit Existing FAQ</h2>
	<hr>
		@foreach($faqs as $key => $faq)
		<div class="shadow my-2 p-3">
			<h4 class="text-center">Question {{$key + 1}}</h4>
			<form action="{{route('edit-faq')}}" method="post" class=" ">
				{{csrf_field()}}
				<label class="m-0 font-weight-bold">Question(En)</label>
				<input type="" name="question_en" class="form-control my-2" value="{{$faq->question_en}}">
				<label class="m-0 font-weight-bold">Question(De)</label>
				<input type="" name="question_de" class="form-control my-2" value="{{$faq->question_de}}">
				<label class="m-0 font-weight-bold">Answer(En)</label>
				<textarea rows="5" name="answer_en" class="form-control my-2 ckeditor">{{$faq->answer_de}}</textarea>
				<label class="m-0 font-weight-bold">Answer(De)</label>
				<textarea rows="5" name="answer_de" class="form-control my-2 ckeditor">{{$faq->answer_de}}</textarea>
				<div class="text-center">
					<input type="hidden" name="faq_id" value="{{$faq->id}}">
					<button class="red-button">Save Changes</button>
				</div>
			</form>
			</div>
		@endforeach
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