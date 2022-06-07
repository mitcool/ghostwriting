@extends('admin.home')

@section('css')

<style type="text/css">
	tr,td,th{
		vertical-align: middle !important;
	}
</style>
@endsection

@section('content')

<div class="container shadow p-3 text-center my-2">
	<h2>Appoint Freelancer</h2>
	<hr>

	<table class="table table-striped">
			
	@forelse($invoices as $invoice)
		<form action="{{route('appoint-freelancer-post')}}" method="POST">
			{{csrf_field()}}
			<tr>
				<td>{{$invoice->invoice_number}}</td>
				<td>Client Price: &euro;{{number_format($invoice->price,2,',','.')}}</td>
				<td>	
					<input type="number" name="freelancer_payment" class="form-control" placeholder="Enter payment for the freelancer" required>

				</td>
				<td>
					<select class="form-control" required name="freelancer_id">
						<option disabled selected value="">Select Freelancer</option>
						@foreach($freelancers as $freelancer)
							<option class="form-control" value="{{$freelancer->id}}">{{$freelancer->email}}</option>
						@endforeach
					</select>
				</td>
				<td>
					<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
					<button class="red-button">Appoint Freelancer</button>	
				</td>
				<td>
					<i class="fa-solid fa-eye" style="cursor: pointer;" data-toggle="modal" data-target="#detail-modal-{{$invoice->id}}"></i>
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
	@empty
	@endforelse	
	</table>
	
</div>


@endsection