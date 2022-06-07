@extends('admin.home')

@section('css')
<style type="text/css">
	tr,th,td{
		vertical-align: middle !important;
	}
</style>

@endsection

@section('content')

<div class="container shadow" style="margin-top:20px;padding:30px;">
	<h2 class="text-center">Ban/Unban user</h2>
	<hr>
	<table class="table table-striped">
		@forelse($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					@if($user->is_banned == 1)
						<form action="{{route('ban-user',0)}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="user_id" value="{{$user->id}}">
							<button class="btn btn-success">Unban User</button>
						</form>
					@else
						<form action="{{route('ban-user',1)}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="user_id" value="{{$user->id}}">
							<button class="btn btn-danger">Ban User</button>							
						</form>
					@endif
				</td>
			</tr>
		@empty
		<tr>
			<td>No users at the moment</td>
		</tr>
		@endforelse
	</table>
@endsection