@extends('admin.home')


@section('content')

<div class="container shadow" style="margin-top:20px;padding:30px;">
	<h2 class="p-3 text-center">List with all in progress milestones </h2>
	<div class="row bg-dark text-white">
		<div class="col-2 py-2">
			Invoice №
		</div>
		<div class="col-3 py-2">
			Freelancer
		</div>
		<div class="col-2 py-2">
			Created On
		</div>
		<div class="col-2 py-2">
			Price
		</div>
		<div class="col-2 py-2">
			Client
		</div>
		<div class="col-1 py-2 text-center">
			
		</div>
	</div>
	@foreach ($invoices as $invoice)
		<div class="row border">
			<div class="col-2 py-2">
				{{$invoice->invoice_number}}
			</div>
			<div class="col-3 py-2">
				{{$invoice->freelancer->email}}
			</div>
			<div class="col-2 py-2">
				{{$invoice->created_at->format('d-m-Y')}}
			</div>
			<div class="col-2 py-2">
				&euro;{{number_format($invoice->price,2,',','.')}}
			</div>
			<div class="col-2 py-2">
				{{$invoice->order->email}}
			</div>
			<div class="col-1 py-2 text-center">
				<a href="{{asset('storage')}}\{{$invoice->id}}.pdf" download><i class="fa-solid fa-download"></i></a>
			</div>
		</div>
	@endforeach
</div>


@endsection