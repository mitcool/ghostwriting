@extends('admin.home')


@section('content')

<div class="container" style="margin-top:20px;padding:30px;">
	<div class="row bg-dark text-white">
		<div class="col py-2">
			Milestone №
		</div>
		<div class="col py-2">
			Created On
		</div>
		<div class="col py-2">
			Price
		</div>
		<div class="col py-2">
			User
		</div>
		<div class="col py-2">
			File
		</div>
	</div>
	@foreach ($invoices as $number => $invoice)
		<div class="row border">
			<div class="col py-2">
				{{$number+1}}
			</div>
			<div class="col py-2">
				{{$invoice->created_at->format('d-m-Y')}}
			</div>
			<div class="col py-2">
				&euro;{{number_format($invoice->price,2,',','.')}}
			</div>
			<div class="col py-2">
				{{$invoice->order->email}}
			</div>
			<div class="col py-2">
				<a href="{{asset('storage')}}\{{$invoice->id}}.pdf" download>Download <i class="fa-solid fa-download"></i></a>
			</div>
		</div>
	@endforeach
</div>


@endsection