@extends('freelancer.home')

@section('page-css')
<style type="text/css">
	#offers_link{
		color:#139BFD;
	}
</style>
@endsection

@section('page-content')

		@foreach($invoices as $invoice)
			<div class="container-fluid shadow">
			<div class="row">
				<div class="col-md-6">Order Number</div>
				<div class="col-md-6">{{$invoice->id}}</div>
			</div>
			<div class="row">
				<div class="col-md-6">Milestone Number</div>
				<div class="col-md-6">{{$invoice->milestone_number}}</div>
			</div>
			@foreach($invoice->order->details as $detail)
				<div class="row">
					<div class="text-capitalize">{{$detail->key}}</div>
					<div>{{$detail->value}}</div>
				</div class="row">
			@endforeach
			<div class="row">
				<td colspan="2">
					<hr>
				</td>
			</div>
			</div>
		@endforeach
</table>
@endsection