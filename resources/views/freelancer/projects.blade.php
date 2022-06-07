@extends('freelancer.home')

@section('page-css')
<style type="text/css">
	tr,td,th{
		vertical-align: middle !important;
	}
</style>
@endsection

@section('page-content')

<div style="min-height:30vh;">
	<h2>My projects</h2>
	<hr>
	@if(count($invoices)>0)
		<p>When you are ready with your work just upload the file in format ".docx"</p>
	@endif
	<table class="table table-striped">

	@forelse($invoices as $invoice)
		<form action="{{route('freelancer-work-upload')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<tr>
				<td>{{$invoice->invoice_number}}</td>
				<td>&euro;{{number_format($invoice->freelancer_payment,2,',','.')}}</td>
				<td>
					<i class="fa-solid fa-eye" style="cursor: pointer;" data-toggle="modal" data-target="#detail-modal-{{$invoice->id}}"></i>
				</td>
				<td>
					<input type="file" name="work_file" required accept=".docx">
				</td>
				<td>
					<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
					<button class="green-button">Send for quality check</button>
				</td>
			</tr>
		</form>
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
	@empty
	<tr>
		<td class="text-center">No projects at the monment</td>
	</tr>
	@endforelse
	</table>
</div>
@endsection