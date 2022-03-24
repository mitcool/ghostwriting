@extends('client.home')

@section('page-css')

<style type="text/css">

</style>
@endsection

@section('page-content')
	<form action="{{route('change-details')}}" method="POST" class="container shadow p-3">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-4 my-2">
				<label class="fw-bold">Name</label>
				<input type="text" name="name" placeholder="Name" class="form-control" value="{{Auth::user()->name}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Surname</label>
				<input type="text" name="surname" placeholder="Surname" class="form-control" value="{{Auth::user()->surname}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Email</label>
				<input type="email" name="email" placeholder="Email" class="form-control" value="{{Auth::user()->email}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Country Code</label>
				<select name="phone_code"  class="form-control">
					@foreach($countries as $country)
						<option @if($country->phone_code == $user->details->phone_code) selected @endif value="{{$country->phone_code}}">+{{$country->phone_code}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Phone</label>
				<input type="text" name="phone" placeholder="Phone" {{Auth::user()->phone}} class="form-control" value="{{$user->details->phone ? $user->details->phone  : ''}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Country</label>
				<select name="country_id"  class="form-control">
					@foreach($countries as $country)
						<option @if($country->id == $user->details->country_id) selected @endif value="{{$country->id}}">{{$country->country_name_en}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Skype</label>
				<input type="text" name="skype" placeholder="Skype" class="form-control" value="{{$user->details->skype ? $user->details->skype  : ''}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Company</label>
				<input type="text" name="company" placeholder="Company" value="{{$user->details->company ? $user->details->company  : ''}}" class="form-control">
			</div>

			<div class="col-md-4 my-2">
				<label class="fw-bold">VAT</label>
				<input type="text" name="vat" placeholder="VAT" class="form-control" value="{{$user->details->vat ? $user->details->vat  : ''}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">City</label>
				<input type="text" name="city" placeholder="City" class="form-control" value="{{$user->details->city ? $user->details->city  : ''}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">ZIP</label>
				<input type="text" name="zip" placeholder="ZIP" class="form-control" value="{{$user->details->zip ? $user->details->zip  : ''}}">
			</div>
			<div class="col-md-4 my-2">
				<label class="fw-bold">Address</label>
				<input type="text" name="address" placeholder="Address" class="form-control" value="{{$user->details->address ? $user->details->address  : ''}}">
			</div>

			<div class="col-md-12 my-2 text-center">
				<button class="red-button">Save Changes</button>
			</div>
			
			
		</div>
	</form>
@endsection