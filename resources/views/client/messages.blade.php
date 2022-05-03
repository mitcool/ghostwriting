@extends('client.home')

@section('page-content')

<div style="min-height:30vh;">
	<table class="table table-light">
		<thead>
			<tr>
				<th>Message</th>
				<th>Date</th>
				<th>Delete all <input type="checkbox" name="notification_id" value="all"></th>
			</tr>
			@foreach($notifications as $notification)
				<tr>
				<td>{{ $notification->message }}</td>
				<td>{{ $notification->created_at->format('d-m-Y') }}</td>
				<td>Delete <input type="checkbox" name="notification_id" value="{{$notification->id}}"></td>
				</tr>
			@endforeach
		</thead>
	</table>
</div>
@endsection