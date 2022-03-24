@extends('admin.home')

@section('content')

<div class="container shadow " style="margin-top:20px;padding:30px;">	

		@foreach ($orders as $order)
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
					<div class="col-md-4" style="text-transform: capitalize;">{{$detail->key}}</div>
					<div class="col-md-4">{{$detail->value}}</div>
				</div>	
			@endforeach
			<hr>

			<div class="row">
				<div class="col-md-12 text-right">
					<button type="button" class="btn btn-primary offer-button"  data-target="#offer_{{$order->id}}">
					 	Send Offer
					</button>
				</div>
				<div class="col-md-4 offset-md-4 shadow" id="offer_{{$order->id}}" style="display:none;padding:20px;">
					<hr>
					<form action="{{route('send-offer',$order->id)}}" method="POST">
						{{csrf_field()}}
						<input type="number" class="form-control my-2" name="offer" placeholder="Enter Price">
						<button type="submit" class="red-button w-100 my-2">Send Offer To Client</button>
						<hr>
						<span style="font-size:12px;">*When you enter price and send the offer to client, he will receive the offer via email and he should decide - accept or decline it</span>
					</form>
				</div>
			</div>
			<br>
		@endforeach
	</div>
@endsection

@section('scripts')

<script type="text/javascript">
	let offerButtons = document.querySelectorAll('.offer-button');

	for(let button of offerButtons){
		 button.addEventListener('click',function(){
		 	let id = this.getAttribute('data-target');
		 	let div =  document.querySelector(id);
		 	div.style.display = 'block';
		 });
	}
</script>

@endsection