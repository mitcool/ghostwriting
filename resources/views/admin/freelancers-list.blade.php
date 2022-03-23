@extends('admin.home')

@section('css')
<style type="text/css">
	tr,th,td{
		vertical-align: middle !important;
	}
</style>

@endsection

@section('content')

<div class="container " style="margin-top:20px;padding:30px;">
	<h2 class="text-center">Freelancers waiting approval</h2>

	@foreach($not_approved_freelancers as $user) 
		<div class="bg-white shadow p-2 my-2">
			<p><span class="font-weight-bold">Name :</span> {{$user->name}}</p>
			<p><span class="font-weight-bold">Email :</span> {{$user->email}}</p>
			<p><span class="font-weight-bold">Message :</span> {{$user->freelancer->message}}</p>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<p class="font-weight-bold">Jobs:</p>
					<ul class="list-group">
						 @foreach($user->freelancer_jobs as $job)
							<li class="list-group-item">{{$job->job_name->name}}</li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-6">
					<p class="font-weight-bold">Documents:</p>
					<ul class="list-group">
						<li class="list-group-item"> 
							<a download href="{{asset('freelancers/curriculum_vitae')}}/{{$user->freelancer->cirriculum_vitae}}">Curriculum vitae <i class="fa-solid fa-download"></i></a> 
						</li>
						<li class="list-group-item">
							<a download href="{{asset('freelancers/working_samples')}}/{{$user->freelancer->working_samples}}">Working Samples <i class="fa-solid fa-download"></i></a>
						</li>
						<li class="list-group-item">
							<a download href="{{asset('freelancers/certificates')}}/{{$user->freelancer->certificates}}">Certificates <i class="fa-solid fa-download"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-6 text-center">
					<form method="POST" action="{{route('approve-freelancer',$user->id)}}">
						{{csrf_field()}}
						<button class="btn btn-success">Approve</button>
					</form>
				</div>
				<div class="col-md-6 text-center">
					<form method="POST" action="{{route('decline-freelancer',$user->id)}}"">
						{{csrf_field()}}
						<button class="btn btn-danger">Deline</button>
					</form>
				</div>
			</div>
		</div>
	@endforeach

</div>

@endsection
