@extends('admin.home')


@section('content')

<div class="container shadow" style="margin-top:20px;padding:30px;">
	@forelse ($invoices as $invoice)
		<div class="row bg-white">
			<div class="col-12 bg-light p-2 border text-center">
				<h3 class="m-0">Order №{{$invoice->order->id}}</h3>
			</div>
			<div class="col-6 border py-2 font-weight-bold">
				Milestone/Invoice №
			</div>
			<div class="col-6 border py-2">
				{{$invoice->invoice_number}}
			</div>
			<div class="col-6 border py-2 font-weight-bold">
				Freelancer
			</div>
			<div class="col-6 border py-2">
				{{$invoice->freelancer->email}}
			</div>
			<div class="col-6 border py-2 font-weight-bold">
				QA
			</div>
			<div class="col-6 border py-2">
				{{$invoice->qa->email}}
			</div>
			<div class="col-6 border py-2 font-weight-bold">
				Client
			</div>
			<div class="col-6 border py-2">
				{{$invoice->order->email}}
			</div>
			<div class="col-6 border py-2 font-weight-bold">
				Price(client)
			</div>
			<div class="col-6 border py-2">
				&euro;{{number_format($invoice->price,2,',','.')}}
			</div>
			<div class="col-6 border py-2 font-weight-bold">
				Freelancer(payment)
			</div>
			<div class="col-6 border py-2">
				&euro;{{number_format($invoice->freelancer_payment,2,',','.')}}
			</div>
			<div class="col-6 py-2 border">
				<a href="{{asset('storage')}}\{{$invoice->invoice_number}}.pdf" download>Download Invoice <i class="fa-solid fa-download"></i></a>
			</div>
		</div>
		
	@empty 
	    <div class="text-center" style="margin-top:20px;padding:30px;">
			<h3>No orders at the moment</h3>
			<hr>	
			<img src="{{asset('images/admin/sad.png')}}" class="w-50">
		</div>
	@endforelse
</div>


@endsection