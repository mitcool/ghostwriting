@extends('admin.home')

@section('content')

<div class="container shadow p-3 my-3">
	<form class="row" action="{{route('save-company-details')}}" method="POST">
		{{csrf_field()}}
		<div class="col-md-12">
			<h2 class="text-center">Change company details</h2>
			<hr>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">Name</label>
			<input type="text" name="name" value="{{$company_details->name}}" class="form-control" required>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">Address</label>
			<input type="text" name="address" value="{{$company_details->address}}" class="form-control" required>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">Company phone (showing in invoice)</label>
			<input type="text" name="company_phone" value="{{$company_details->company_phone}}" class="form-control" required>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">Contact phone (showing in phone modal)</label>
			<input type="text" name="contact_phone" value="{{$company_details->contact_phone}}" class="form-control" required>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">Zip</label>
			<input type="text" name="zip" value="{{$company_details->zip}}" class="form-control" required>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">City</label>
			<input type="text" name="city" value="{{$company_details->city}}" class="form-control" required>
		</div>
		<div class="col-md-6 my-2">
			<label class="font-weight-bold">Country</label>
			<input type="text" name="country" value="{{$company_details->country}}" class="form-control" required>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<button class="red-button">Save Company Details</button>
		</div>
	</form>
</div>

@endsection