@extends('template')

@section('css')
<style type="text/css">
	.select-type{
		background:#2C2C2C;
		color:white;
		border:10px solid #2C2C2C;
		text-decoration: none;
		cursor: pointer;
		padding:5px;
	}
	.select-type:hover{
		color:white;
	}
	#client{
		border-bottom-left-radius:20px;
		border-top-left-radius:20px;
	}
	#freelancer{
		border-bottom-right-radius:20px;
		border-top-right-radius:20px;
	}

	#learn_more{
		background: white;
		border:none;
		margin:30px 0;
		font-size:20px;
		border-radius: 30px;
		padding:10px 15px;
	}
	.upload-label{
		display: inline-block;
		padding:8px 15px;
		text-align:center;
		border:2px solid black;
		border-radius:30px;
		cursor: pointer;
	}
</style>

@endsection

@section('content')

<div class="container-fluid">
	<div class="row align-items-center" style="margin-top:40px;">
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<h1>Your digital ghostwriting <br>
				agency with quality guarantee</h1>
			<h4>I am...</h4>	
			<div class="mt-3">
				<a href="{{route('change-theme','client')}}" class="select-type @if(!Session::has('theme') || Session::get('theme')=='client') theme-background @endif" id="client">
					<i class="fa-solid fa-user-check"></i> Client
				</a>
				<a class="select-type @if(Session::get('theme')=='freelancer') theme-background @endif" id="freelancer" href="{{route('change-theme','freelancer')}}" >
					<i class="fa-solid fa-pen"></i> Freelancer
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<img class="w-100 theme-border theme-radius" src="{{asset('images/lady.png')}}">
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<h2>Apply as a freelancer</h2>
			<form class="row" method="POST" action="{{route('freelancer-apply')}}" enctype="multipart/form-data" >
				{{csrf_field()}}
				<div class="col-md-12 my-2">
					<input type="text" class="form-control" name="name" placeholder="Enter name" required>
				</div>
				<div class="col-md-12 my-2">
					<input type="text" class="form-control" name="surname" placeholder="Enter surname" required>
				</div>
				<div class="col-md-12 my-2">
					<input type="email" name="email" email class="form-control" placeholder="Email" required> 
				</div>
				<div class="col-md-6 my-2">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<div class="col-md-6 my-2">
					<input type="password" name="re_password" class="form-control" placeholder="Repeat password" required>
				</div>
				<div class="col-md-12 my-2">
					<textarea name="message"  rows="5" class="form-control" placeholder="Enter your message" required></textarea>
				</div>
				<div class="col-md-12 my-2">
					<hr>
					<label class="d-block fw-bold">Jobs</label>
					<div class="row">
						@foreach($jobs as $job)
						<div class="col-md-4">
							<div>
								<input type="checkbox" value="{{$job->id}}" name="jobs[]"> {{$job->name}}
							</div>
						</div>
						@endforeach
					</div>		
				</div>
				<div class="col-md-12 my-2">
					<hr>	
					<label class="d-block fw-bold">Subjects</label>
					<div class="row">
						@foreach($subjects as $subject)
						<div class="col-md-4">
							<div>
								<input type="checkbox" name="subjects[]" value="{{$subject->id}}"> {{$subject->name}}
							</div>
						</div>
						@endforeach
					</div>	
					<hr>	
				</div>
				<div class="col-md-12 my-2">	
					<label class="d-block fw-bold">Languages</label>
					<div class="row">
						@foreach ($languages as $language)
							<div class="col-md-4">
								<div>
									<input type="checkbox" name="languages[]" value="{{$language->id}}"> {{$language->name}}
								</div>
							</div>
						@endforeach
						
					</div>
					<hr>	
				</div>
				<div class="col-md-12 my-2">
					<p>PLEASE UPLOAD YOUR CV, A WORK SAMPLE AND YOUR ACADEMIC DEGREES. THE FOLLOWING FILE TYPES ARE ALLOWED: WORD, EXCEL, POWERPOINT AND PDF (MAX. 2 MB. PER FILE).</p>
					<hr>
					<div class="row">
						<div class="col-md-4">
							<label for="curriculum_vitae" class="form-label">CURRICULUM VITAE*</label>
  							<input type="file" class="form-control" id="curriculum_vitae" name="curriculum_vitae" required>
						</div>
						<div class="col-md-4">
							<label for="work_samples" class="form-label">WORK SAMPLES*</label>
  							<input type="file" class="form-control" id="work_samples" name="work_samples" required>
						</div>
						<div class="col-md-4">
							<label for="certificates" class="form-label">CERTIFICATES & OTHER*</label>
  							<input type="file" class="form-control" id="certificates" name="certificates" required>
						</div>
					</div>
				</div>
				<div class="col-md-12 my-2 text-center">
					<hr>
					<input type="submit" class="red-button" value="Sign up as a freelancer"/>
				</div>	
			</form>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-1"></div>
	</div>
</div>

@endsection