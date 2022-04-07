@extends('qa.home')

@section('content')

<div class="container bg-white shadow" style="margin-top:100px;padding:30px;">
	<h2 class="text-center">Orders in progress</h2>
	<hr>
	
	@foreach($invoices as $invoice)
		<h4 class="my-2 font-italic">Order № / Invoice №</h4>
		<div class="row py-2 bg-dark text-white">
			<div class="col-md-4">Client Email</div>
			<div class="col-md-4">Freelancer</div>
			<div class="col-md-4">File</div>
		</div>
		<div class="row">
			<div class="col-md-4 border py-2">{{$invoice->order->email}}</div>
			<div class="col-md-4 border py-2">{{$invoice->freelancer->email}}</div>
			<div class="col-md-4 border py-2">
				<a href="{{asset('freelancers/work')}}/{{$invoice->file}}" download>
					Read File <i class="fa-solid fa-download"></i>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 bg-dark py-2 text-white">Order Details</div>
			<div class="col-md-6 bg-light border font-weight-bold py-2 text-capitalize">Service Type</div>
			<div class="col-md-6 bg-light border font-weight-bold py-2">Value</div>
		</div>
	 	@foreach($invoice->order->details as $detail)
	 		<div class="row">
	 			<div class="col-md-6 border py-2 text-capitalize">{{$detail->key}}</div>
	 			<div class="col-md-6 border py-2">{{$detail->value}}</div>
	 		</div>
	 	@endforeach
	 	<div class="row">
	 		<div class="col-md-12">
	 			<hr>	
	 			<h5>* After you approve the work of freelancer the file will be sent to the client and a payment document will be created for freelancer</h5>
	 		</div>
	 		<div class="col-md-6 text-center">
	 			<form action="{{route('not-approve-work')}}" method="POST">
	 				{{csrf_field()}}
	 				<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
	 				<button class="red-button">Decline</button>
	 			</form>
	 		</div>	
	 		<div class="col-md-6 text-center">
	 			<form action="{{route('approve-work')}}" method="POST">
	 				{{csrf_field()}}
	 				<input type="hidden" name="invoice_id" value="{{$invoice->id}}">
	 				<button class="green-button">Approve</button>
	 			</form>
	 		</div>
	 		
	 	</div>
	 	<hr>	
	@endforeach
</div>

@endsection