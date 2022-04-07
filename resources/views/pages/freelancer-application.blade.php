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
	.validation-span{
		font-size:12px;
		color:#F70000;
	}
	.form-control,
	.form-control:focus{
		outline:none !important;
		box-shadow: none !important;
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
		<div class="col-md-7">
			<h2>Apply as a freelancer</h2>
			<form class="row shadow p-2" method="POST" action="{{route('freelancer-apply')}}" enctype="multipart/form-data" id="application_form">
				{{csrf_field()}}
				<div class="col-md-12 my-2">
					<input type="text" class="form-control" name="name" placeholder="Enter name">
					<span class="validation-span" id="name_validation"></span>
				</div>
				<div class="col-md-12 my-2">
					<input type="text" class="form-control" name="surname" placeholder="Enter surname">
					<span class="validation-span" id="surname_validation"></span>
				</div>
				<div class="col-md-12 my-2">
					<input type="text" name="email" email class="form-control" placeholder="Email"> 
					<span class="validation-span" id="email_validation"></span>
				</div>
				<div class="col-md-6 my-2">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<span class="validation-span" id="password_validation"></span>
				</div>
				<div class="col-md-6 my-2">
					<input type="password" name="re_password" class="form-control" placeholder="Repeat password">
				</div>
				<div class="col-md-12 my-2">
					<textarea name="message"  rows="5" class="form-control" placeholder="Enter your message"></textarea>
				</div>
				<div class="col-md-12 my-2">
					<hr>
					<label class="d-block fw-bold">Jobs</label>
					<span id="jobs_validation" class="validation-span"></span>
					<div class="row">
						@foreach($jobs as $job)
						<div class="col-md-4">
							<div>
								<input type="checkbox" value="{{$job->id}}" class="jobs" name="jobs[]"> {{$job->name}}
							</div>
						</div>
						@endforeach
					</div>		
				</div>
				<div class="col-md-12 my-2">
					<hr>	
					<label class="d-block fw-bold">Subjects</label>
					<span id="subject_validation" class="validation-span"></span>
					<div class="row">
						@foreach($subjects as $subject)
						<div class="col-md-4">
							<div>
								<input type="checkbox" class="subject" name="subjects[]" value="{{$subject->id}}"> {{$subject->name}}
							</div>
						</div>
						@endforeach
					</div>	
					<hr>	
				</div>
				<div class="col-md-12 my-2">	
					<label class="d-block fw-bold">Languages</label>
					<span id="languages_validation" class="validation-span"></span>
					<div class="row">
						@foreach ($languages as $language)
							<div class="col-md-4">
								<div>
									<input class="languages" type="checkbox" name="languages[]" value="{{$language->id}}"> {{$language->name}}
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
  							<input type="file" class="form-control" id="curriculum_vitae" name="curriculum_vitae">
						</div>
						<div class="col-md-4">
							<label for="work_samples" class="form-label">WORK SAMPLES*</label>
  							<input type="file" class="form-control" id="work_samples" name="work_samples">
						</div>
						<div class="col-md-4">
							<label for="certificates" class="form-label">CERTIFICATES & OTHER*</label>
  							<input type="file" class="form-control" id="certificates" name="certificates">
						</div>
						<div class="col-md-12 text-center">
							<hr>
							<p class="my-2 text-primary">*All files should be .docx extention</p>
							<hr>
						</div>
					</div>
				</div>
				<div class="col-md-12 my-2 text-center">
					
					<input type="submit" class="red-button" value="Sign up as a freelancer"/>
				</div>	
			</form>
			<br><br>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-1"></div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	let form = document.getElementById('application_form');
	form.addEventListener('submit',function(e){
		e.preventDefault();
		let input = new FormData(e.currentTarget);
		let name = input.get('name');
		let surname = input.get('surname');
		let email = input.get('email');
		let password =  input.get('password');
		let re_password = input.get('re_password');
		let jobs = document.querySelectorAll('.jobs:checked');
		let subjects = document.querySelectorAll('.subject:checked');
		let languages = document.querySelectorAll('.languages:checked');
		let isValid  = true;

		//Names
		if(name.length > 50 || name.length < 3){
			document.getElementById('name_validation').textContent = 'Name should be between 6 and 50 characters';
			let nameElement = document.querySelectorAll('input[name="name"]')[0];
			nameElement.style.border = "1px solid #F70000";
			isValid = false;
		}
		if(surname.length > 50 || surname.length < 3){
			document.getElementById('surname_validation').textContent = 'Surname should be between 6 and 50 characters';
			let surnameElement = document.querySelectorAll('input[name="surname"]')[0];
			surnameElement.style.border = "1px solid #F70000";
			isValid = false;
		}
		//Email
		if (!( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
		   document.getElementById('email_validation').textContent = 'Please enter a valid email address';
		   let emailElement = document.querySelectorAll('input[name="email"]')[0];
		   emailElement.style.border = "1px solid #F70000";
		   isValid = false;
		 }

		//Passwords
		if(password == '' || re_password=='' || password !== re_password){
			document.getElementById('password_validation').textContent = 'Passwords should match and be at least 10 characters long';
			let passwordElement = document.querySelectorAll('input[name="password"]')[0];
			let re_passwordElement = document.querySelectorAll('input[name="re_password"]')[0];
		    passwordElement.style.border = "1px solid #F70000";
		    re_passwordElement.style.border = "1px solid #F70000";
		 	isValid = false;
		}
		//Checkboxes
		if(jobs.length == 0){
		 	document.getElementById('jobs_validation').textContent = 'Please select at least one of jobs below';
		 	isValid = false;
		}

		if(subjects.length == 0){
		 	document.getElementById('subject_validation').textContent = 'Please select at least one of subjects below';
		 	isValid = false;
		}

		if(languages.length == 0){
		 	document.getElementById('languages_validation').textContent = 'Please select at least one of languages below';
		 	isValid = false;
		}
		// Submit if everything is correct
		if(isValid){
			form.submit();
		}
	});

	let nameInput = document.querySelectorAll('input[name="name"]')[0];
	let surnameInput = document.querySelectorAll('input[name="surname"]')[0];
	let emailInput = document.querySelectorAll('input[name="email"]')[0];
	let passwordInput = document.querySelectorAll('input[name="password"]')[0];
	let confirmPasswordInput = document.querySelectorAll('input[name="re_password"]')[0];
	let jobs = document.querySelectorAll('.jobs');
	let subjects = document.querySelectorAll('.subject');
	let languages = document.querySelectorAll('.languages');

	nameInput.addEventListener('keyup',function(){
		enableInputs();
	});
	surnameInput.addEventListener('keyup',function(){
		enableInputs();
	});
	emailInput.addEventListener('keyup',function(){
		enableInputs();
	});
	passwordInput.addEventListener('keyup',function(){
		enableInputs();
	});
	confirmPasswordInput.addEventListener('keyup',function(){
		enableInputs();
	});

	for(let job of jobs){
		job.addEventListener('click',function(){
			enableInputs();
		})
	}

	for(let subject of subjects){
		subject.addEventListener('click',function(){
			enableInputs();
		})
	}

	for(let language of languages){
		language.addEventListener('click',function(){
			enableInputs();
		})
	}

	//Input file validation

	let curriculum_vitae = document.getElementById('curriculum_vitae');
	let work_samples = document.getElementById('work_samples');
	let certificates = document.getElementById('certificates');

	curriculum_vitae.onchange = () => {
	  const selectedFile = curriculum_vitae.files[0];
	   let extention = selectedFile.name.split(".").pop();
	   if(extention !=='docx'){
	   	 alert('Please upload a file in .docx format');
	   	 curriculum_vitae.value = '';
	   }
	}

	work_samples.onchange = () => {
	  const selectedFile = work_samples.files[0];
	   let extention = selectedFile.name.split(".").pop();
	   if(extention !=='docx'){
	   	 alert('Please upload a file in .docx format');
	   	 work_samples.value = '';
	   }
	}

	certificates.onchange = () => {
	  const selectedFile = certificates.files[0];
	   let extention = selectedFile.name.split(".").pop();
	   if(extention !=='docx'){
	   	 alert('Please upload a file in .docx format');
	   	 certificates.value = '';
	   }
	}

	// Enable function
	function enableInputs(){

		let validation_spans = document.querySelectorAll('.validation-span');
		for(let span of validation_spans){
			span.textContent="";
		}

		let inputs = document.querySelectorAll('#application_form .form-control');
		for(let input of inputs){
			input.style.border = '1px solid #ced4da';
		}
	}
	
</script>
@endsection