@extends('admin.home')

@section('content')

<div class="container shadow p-3">
	<h1 class="text-center">Add tutorial</h1>
	<hr>
	<form action="{{route('add-tutorial')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-4">
				<div class="input-group">
				  <div class="custom-file">
				    <input type="file" name="thumbnail" class="custom-file-input" id="file" required>
				    <label class="custom-file-label" id="label" for="file">Choose cover</label>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<input type="text" placeholder="YouTube link" class="form-control" name="video" required>
			</div>
			<div class="col-md-4">
				<button class="btn btn-primary" >
				  Add tutorial
				</button>
			</div>
		</div>
	</form>
	<hr>
	<h1 class="text-center">Tutorial's list</h1>
	<hr>
	<div class="row align-items-center bg-dark text-white py-2 mx-0 text-center">
		<div class="col-md-4">
			<h3 class="font-weight-bold m-0">Cover</h3>
		</div>
		<div class="col-md-4">
			<h3 class="font-weight-bold m-0">Video</h3>
		</div>
		<div class="col-md-4"></div>
	</div>
	@foreach($tutorials as $tutorial)
	<div class="row align-items-center mx-0 my-2 text-center">
		<div class="col-md-4">
			<img src="{{asset('tutorial-images')}}/{{$tutorial->thumbnail}}" class="w-100">
		</div>
		<div class="col-md-4">
			{{$tutorial->video}}
		</div>
		<div class="col-md-4">
			<form action="{{route('delete-tutorial',$tutorial->id)}}" method="POST">
				{{csrf_field()}}
				<button class="red-button">Delete Tutorial</button>				
			</form>
		</div>
	</div>
	<hr>
	@endforeach
</div>

@endsection

@section('scripts')

<script type="text/javascript">
	let file = document.getElementById('file');
	let label = document.getElementById('label');

	file.addEventListener('change', function(){
		if(this.value == ''){
			label.textContent = 'Choose cover';
		}
		else{
			label.textContent = this.value.split('\\').reverse()[0];
		}
	})
</script>

@endsection