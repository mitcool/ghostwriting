@extends('freelancer.home')

@section('page-css')
<style type="text/css">
	#offers_link{
		color:#139BFD;
	}
	.row:nth-child(odd){
		background: #f3f3f3;
		padding:10px;
	}
	.row:nth-child(even){
		background: #ffffff;
		padding:10px;
	}
</style>
@endsection

@section('page-content')
	<div style="min-height:30vh;">
	<h2>My offers</h2>
	<hr>
	
	@forelse($invoices as $invoice)
		<div class="container-fluid shadow my-2 p-0">
			<div class="row border">
				<div class="col-md-6">Order Number</div>
				<div class="col-md-6">{{$invoice->invoice_number}}</div>
			</div>
			<div class="row border">
				<div class="col-md-6">Milestone Number</div>
				<div class="col-md-6">{{$invoice->milestone_number}}</div>
			</div>
			@foreach($invoice->order->details as $detail)
				<div class="row border">
					<div class="text-capitalize col-md-6">{{$detail->key}}</div>
					<div class="col-md-6">{{$detail->value}}</div>
				</div>
			@endforeach
			<div class="row border">
				<div class="text-capitalize col-md-6">Payment</div>
				<div class="col-md-6">&euro;{{number_format($invoice->freelancer_payment,2,',','.')}}</div>
			</div>
			<div class="row text-center">
				<div class="col-md-6">
					<form action="{{route('freelancer-accept-work')}}" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
						<button class="green-button">Accept</button>
					</form>
				</div>
				<div class="col-md-6">
					 <form action="{{route('freelancer-decline-work')}}" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
						<button class="red-button">Decline</button>
					</form>
				</div>
			</div>
			
			
			{{-- <form action="{{route('freelancer-work-upload')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row border text-center">
				<div class="col-md-6 offset-md-3">
					<div class="mb-3">
					  <label for="work" class="fw-bold form-label">Upload work when you are ready</label>
					  <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
					  <input class="form-control" name="work_file" required type="file" id="work">
					</div>
					<button class="red-button">Send For Quality Check</button>
				</div>
			</div>
			</form> --}}
		</div><br>
	@empty
		<div class="container-fluid text-center shadow my-2 p-0 text">
			<h1 class="p-3">No offers at the moment</h1>
		</div>
	@endforelse
@endsection