@extends('freelancer.home')

@section('page-content')

<div style="min-height:30vh;" class="p-2">
	<form action="{{route('delete-notification')}}" method="POST">
		{{csrf_field()}}
		<table class="table table-striped">
			<thead>
				@if(count($notifications)>0)
				<tr>
					<th>Message</th>
					<th>Date</th>
					<th style="text-align:center;"><input value="1" type="checkbox" name="all" id="select_all"></th>
				</tr>
				@endif
				@forelse($notifications as $notification)
					<tr>
						<td>{{ $notification->message }}</td>
						<td>{{ $notification->created_at->format('d-m-Y') }}</td>
						<td style="text-align:center;"><input type="checkbox" class="notification-checkbox" name="notification_ids[]" value="{{$notification->id}}"></td>
					</tr>
				@empty
			
				<tr>
					<td colspan="3" class="text-center">
						<h3>No new messages</h3>						
					</td>
				</tr>

				@endforelse
				@if(count($notifications)>0)
					<tr>
						<td></td>
						<td></td>
						<td style="text-align:center;">
							<button class="red-button">Delete</button>
						</td>
					</tr>
				@endif
			</thead>
		</table>
	</form>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
	let select_all = document.getElementById('select_all');
	let notification_checkboxes = document.querySelectorAll('.notification-checkbox');
	select_all.addEventListener('click', function(){
		if(this.checked == true){
			for(let checkbox of notification_checkboxes){
				checkbox.checked = true;
				checkbox.setAttribute('disabled',true);

			}
		}
		else{
			for(let checkbox of notification_checkboxes){
				checkbox.checked = false;
				checkbox.setAttribute('disabled',false);
			}
		}
	})
</script>

@endsection