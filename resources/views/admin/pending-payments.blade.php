@extends('admin.home')


@section('content')

<div class="container" >
	@foreach ($orders as $order)
	<div class="shadow" style="margin-top:20px;padding:30px;">
		<div class="row bg-dark text-white py-2">
			<div class="col-md-4">Email</div>
			<div class="col-md-4">Name</div>
			<div class="col-md-4">Phone</div>
		</div>
		<div class="row py-2 bg-white">
			<div class="col-md-4">{{$order->email}}</div>
			<div class="col-md-4">{{$order->name}}</div>
			<div class="col-md-4">{{$order->phone}}</div>
		</div>
		<div class="row py-2">
			<div class="col-md-12"> Order Details</div>
		</div>	
			@foreach ($order->details as $detail)
				<div class="row bg-white">
					<div class="col-md-4 py-2 font-weight-bold" style="text-transform: capitalize;">{{$detail->key}}</div>
					<div class="col-md-4 py-2">{{$detail->value}}</div>
					<div class="col-md-4"></div>
				</div>	
			@endforeach
		<div class="row py-2">
			<div class="col-md-12">
				<hr>
				<h5 class="bold">
					Total order price <span class="bold">&euro;{{number_format($order->price,2,'.',',')}}</span>
				</h5>
				<hr>
			</div>
				
			@foreach($order->invoices as $invoice)
				@if($invoice->status == 0)
					<form action="{{route('mark-as-paid',$invoice->id)}}" method="POST">
					{{csrf_field()}}
					<div class="row mx-0 px-0 py-2">
						<div class="col-6 py-2">
							Milestone № :{{$invoice->milestone_number}}
						</div>
						<div class="col-6 py-2">
							Invoice № :{{$invoice->invoice_number}}
						</div>
						<div class="col-6 py-2">
							Created On :{{$invoice->created_at->format('d-m-Y')}}
						</div>
						<div class="col-6 py-2">
							Price(for client) : &euro;{{number_format($invoice->price,2,',','.')}}
						</div>
						<div class="col-6 py-2">
							Payment(for freelancer)
						</div>
						<div class="col-6 py-2">
							<select class="form-control" name="freelancer" required>
								<option selected disabled value="">Select Freelancer</option>
								@foreach($freelancers as $freelancer)
									<option value="{{$freelancer->id}}">{{$freelancer->name.' '.$freelancer->surname}}</option>
								@endforeach
							</select>
						</div>
						<div class="col py-2">
							<button class="red-button">Mark as paid</button>	
						</div>
					</div>
					<hr/>
					</form>
				@endif
			@endforeach
		</div>
		<hr style="border-bottom:3px solid grey;">
	</div>
	@endforeach
</div>


@endsection