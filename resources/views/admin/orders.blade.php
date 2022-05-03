@extends('admin.home')

@section('css')
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')

<div class="container ">	
		
		@forelse ($orders as $order)
			<div class="shadow bg-white"  style="margin-top:20px;padding:30px;">
				<h3 class="text-center">Order № {{$order->id}}</h3>
				<hr>
				<div class="row py-2">
					<div class="col-md-12">
					<h5 class="font-weight-bold text-center m-0">User Details</h5>
					</div>
				</div>	
				<div class="row py-2">
					<div class="col-md-4 font-weight-bold">Email</div>
					<div class="col-md-4">{{$order->email}}</div>
				</div>
				<div class="row  py-2">
					<div class="col-md-4 font-weight-bold">Name</div>
					<div class="col-md-4">{{$order->name}}</div>
				</div>
				<div class="row py-2">
					<div class="col-md-4 font-weight-bold">Phone</div>
					<div class="col-md-4">{{$order->phone}}</div>
				</div>
				<div class="row py-2">
					<div class="col-md-12">
						<h5 class="font-weight-bold text-center m-0">Order Details</h5>
					</div>
				</div>	
				@foreach ($order->details as $detail)
					<div class="row">
						<div class="col-md-4 py-2 font-weight-bold" style="text-transform: capitalize;">{{$detail->key}}</div>
						<div class="col-md-4 py-2">{{$detail->value}}</div>
					</div>	
				@endforeach
				<div class="row py-2">
					<div class="col-md-4 font-weight-bold">Milestones</div>
					<div class="col-md-4">{{$order->milestones}}</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12 text-right">
						<button type="button" class="btn btn-primary offer-button"  data-target="#offer_{{$order->id}}">
						 	Send Offer
						</button>
					</div>
					<div class="col-md-10 mt-1 offset-md-1 shadow" id="offer_{{$order->id}}" style="display:none;padding:20px;">
						<hr>
						<form action="{{route('send-offer',$order->id)}}" method="POST">
							{{csrf_field()}}
							<label class="font-weight-bold d-block m-0">Enter Price(not visible in email)</label>
							<input type="number" class="form-control my-1" name="offer" required><hr>	
							<label class="font-weight-bold d-block m-0">Text of email client will receive (the price should match the price above)</label>
							<textarea class="ckeditor" name="email_content" required></textarea><hr>	
							<label class="font-weight-bold d-block m-0">Milestones Number</label>
							<select name="milestones" class="form-control my-1" required>
								<option selected disabled="" value="">Please select milestones</option>
								@for ($i = 1; $i < 6; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							<div class="text-center">
								<button type="submit" class="red-button w-auto my-2">Send Offer To Client</button>
							</div>
							<hr>
							<span style="font-size:12px;">*When you receive an request from client you can answer him in free text , but you have to enter a price which match to price in the free text for backend reasons.</span>
						</form>
					</div>
				</div>
				<br>
			</div>
		@empty
		<div class="shadow text-center" style="margin-top:20px;padding:30px;">
			<h3>No orders at the moment</h3>
			<hr>	
			<img src="{{asset('images/admin/sad.png')}}" class="w-50">
		</div>
		@endforelse
	
	</div>
@endsection

@section('scripts')

<script type="text/javascript">
	let offerButtons = document.querySelectorAll('.offer-button');

	for(let button of offerButtons){
		 button.addEventListener('click',function(){
		 	let id = this.getAttribute('data-target');
		 	let div =  document.querySelector(id);
		 	if(div.style.display == 'none'){
		 		div.style.display = 'block';
		 	}
		 	else{
		 		div.style.display = 'none';
		 	}
		 
		 });
	}


    $('.ckeditor').each(function(){

		CKEDITOR.replace( this,{ toolbar :[

			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Save', 'NewPage', 'Preview', 'Print', '-',] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: ['SelectAll', '-', 'Scayt' ] },
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
			'/',
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
			{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
			{ name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'] },
			'/',
			{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
			{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
			{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
	
		]});

	});
	</script>
@endsection
