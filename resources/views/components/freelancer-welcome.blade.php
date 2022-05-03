<div class="container-fluid">
	<div class="row align-items-center" style="margin-top:40px;">
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<h1>{{$texts[0]->text}} <br>
				{{$texts[1]->text}}</h1>
			<h4>{{$texts[2]->text}}</h4>	
			<div class="mt-3">
				<a href="{{route('change-theme','client')}}" class="select-type @if(!Session::has('theme') || Session::get('theme')=='client') theme-background @endif" id="client">
					<i class="fa-solid fa-user-check"></i> {{$texts[3]->text}}
				</a>
				<a class="select-type @if(Session::get('theme')=='freelancer') theme-background @endif" id="freelancer" href="{{route('change-theme','freelancer')}}" >
					<i class="fa-solid fa-pen"></i> {{$texts[4]->text}}
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
		<div class="col-md-10">
			<h1 style="margin:40px 0;">{{$texts[5]->text}}</h1>
			<div class="row">
				<div class="col-md-4">
					<div class="w-75">
						<img src="{{asset('images/step1.png')}}" class="shadow">
						<h3 style="margin-top:10px;">{{$texts[6]->text}}</h3>
						<p>{{$texts[7]->text}}</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="w-75">
						<img src="{{asset('images/step2.png')}}" class="shadow">
						<h3 style="margin-top:10px;">{{$texts[8]->text}}</h3>
						<p>{{$texts[9]->text}}</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="w-75">
						<img src="{{asset('images/step3.png')}}" class="shadow">
						<h3 style="margin-top:10px;">{{$texts[10]->text}}</h3>
						<p>{{$texts[11]->text}}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row"  style="margin-top:50px;">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>{{$texts[12]->text}}</h1><br>
			{!! $texts[13]->text !!}

			<a class="theme-border theme" href="{{ route('freelancer-application') }}" id="learn_more">{{$texts[14]->text}}</a>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>