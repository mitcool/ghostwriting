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
	<h2>Not paid milestones</h2>
	@if(count($invoices))<span class="text-primary">* After you mark milestone as paid please go to Appoint Freelancer section to appoint one</span>@endif
	<hr>

	<table class="table table-striped">
		
			
	@forelse($invoices as $invoice)
		<tr>
			<td>{{$invoice->invoice_number}}</td>
			<td>{{$invoice->order->name}}</td>
			<td>{{$invoice->order->email}}</td>
			<td>{{$invoice->created_at->format('d-m-Y')}}</td>
			<td>
				<form action="{{route('mark-as-paid',$invoice->id)}}" method="POST">
					{{csrf_field()}}
					<button class="red-button">Mark as paid</button>	
				</form>
				
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
	@empty

	<tr>
		<td>No orders at the moment</td>
	</tr>
	@endforelse	
	</table>
	{{-- @forelse ($orders as $order)
	<div class="shadow" style="margin-top:20px;padding:30px;">
		<h2 class="text-center">Order № {{$order->id}}</h2>
		<hr>
		<div class="col-md-12"> 
			<h4 class="text-center">User Details</h4> 
		</div>
		<div class="row py-2">
			<div class="col-md-4 font-weight-bold">Email</div>
			<div class="col-md-4">{{$order->email}}</div>
		</div>
		<div class="row  py-2">
			<div class="col-md-4 font-weight-bold">Name</div>
			<div class="col-md-4">{{$order->name}}</div>
		</div>
		<div class="row  py-2">
			<div class="col-md-4 font-weight-bold">Phone</div>
			<div class="col-md-4">{{$order->phone}}</div>
		</div>
		<div class="row py-2">
			<div class="col-md-12"> 
				<h4 class="text-center">Order Details</h4> 
			</div>
		</div>	
			@foreach ($order->details as $detail)
				<div class="row py-2">
					<div class="col-md-4 font-weight-bold" style="text-transform: capitalize;">{{$detail->key}}</div>
					<div class="col-md-4">{{$detail->value}}</div>
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
			<div class="col-md-12"> 
				<h4 class="text-center">Milestones</h4> 
			</div>	
			@foreach($invoices as $invoice)
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
							<input type="number" name="freelancer_payment" placeholder="Payment(for freelancer)" class="form-control"  required/>
						</div>
			
					</div>
					<hr/>
					</form>
				@endif

			@endforeach
		</div>
		<hr style="border-bottom:3px solid grey;">
	</div>
	@empty
		<div class="shadow text-center" style="margin-top:20px;padding:30px;">
			<h3>No orders at the moment</h3>
			<hr>	
			<img src="{{asset('images/admin/sad.png')}}" class="w-50">
		</div>
	@endforelse --}}
</div>


@endsection