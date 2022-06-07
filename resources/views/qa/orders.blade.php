@extends('qa.home')

@section('css')

<style type="text/css">
	tr,td,th{
		vertical-align: middle !important;
	}
</style>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>

@endsection

@section('content')

<div class="container shadow p-3 text-center my-2">
	<h2>Current projects</h2>
	<hr>

	<table class="table table-striped">
 	@if(count($invoices)>0)
 		<tr>
 			<th>Order №</th>
 			<th>Freelancer Email</th>
 			<th colspan="2">Action</th>
 			<th>Status</th>
 			<th>Details</th>
 			<th>File</th>
 		</tr>
 	@endif
	@forelse($invoices as $invoice)
			<tr>
				<td>{{$invoice->invoice_number}}</td>
				<td>{{$invoice->freelancer->email}}</td>
				<td>
					@if($invoice->status == 5)
						<form method="POST" action="{{route('approve-work')}}">
							{{csrf_field()}}
							<input type="hidden" name="invoice_id" value="{{$invoice->id}}"">
							<button class="green-button">Approve Work</button>
						</form>
					@endif
				</td>
				<td>
					@if($invoice->status==5)
						<button class="red-button" data-toggle="modal" data-target="#send-back-modal-{{$invoice->id}}">Send Back</button>
					@endif
				</td>
				<td>
					@if($invoice->status == 4)
						<span class="text-warning">In progress</span>
					@else
						<span  class="text-success">Ready</span>
					@endif
				</td>
				<td>
					<i class="fa-solid fa-eye" style="cursor: pointer;" data-toggle="modal" data-target="#detail-modal-{{$invoice->id}}"></i>
				</td>
				<td>
					@if($invoice->status == 5)
						<a href="{{asset('freelancers/work')}}/{{$invoice->file}}" download"><i class="fa-solid fa-download"></i></a>
					@endif
				</td>
			</tr>

			<div class="modal fade" id="detail-modal-{{$invoice->id}}" tabindex="-1">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			       <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       	<h5>Order Details</h5>
			       	<hr>
			       	@foreach($invoice->order->details as $detail)
			       		<p class="text-left text-capitalize"><span class="font-weight-bold">{{str_replace('_',' ',$detail->key)}} : </span>{{$detail->value}}</p>
			       	@endforeach
			      </div>
			  
			    </div>
			  </div>
			</div>
		</form>
		<div class="modal fade" id="send-back-modal-{{$invoice->id}}" tabindex="-1">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		       <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       <form method="POST" action="{{route('not-approve-work')}}">
					{{csrf_field()}}
					<label class="d-block font-weight-bold">Feedback:</label>
					<textarea class="ckeditor" name="feedback"></textarea>
					<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
					<button class="red-button mt-2">Send Feedback</button>
				</form>
		      </div>
		  
		    </div>
		  </div>
		</div>
	@empty
	<tr>
		<td>No projects at the moment</td>
	</tr>
	@endforelse	
	</table>
	
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
	});
   </script>
@endsection