@extends('admin.home')


@section('content')

<div class="container p-3 shadow">
	<h1 class="text-center my-3">Last activities in the portal</h1>
	<table class="table table-hover table-striped">
		<thead>
			<tr class="text-white" style="background: #4e73df;">
				<th>Message</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($notifications as $notification)
				<tr>
					<td>{{$notification->message}}</td>
					<td>{{$notification->created_at->format('d-m-Y')}}</td>
					<td></td>
				</tr>
				<p></p>
			@endforeach
		</tbody>
	</table>
</div>


@endsection