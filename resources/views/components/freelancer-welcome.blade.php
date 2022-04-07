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
		<div class="col-md-10">
			<h1 style="margin:40px 0;">Here’s how simply it works</h1>
			<div class="row">
				<div class="col-md-4">
					<div class="w-75">
						<img src="{{asset('images/step1.png')}}" class="shadow">
						<h3 style="margin-top:10px;">Step 2</h3>
						<p>Just fill out the form below, upload your application documents, and get registered</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="w-75">
						<img src="{{asset('images/step2.png')}}" class="shadow">
						<h3 style="margin-top:10px;">Step 2</h3>
						<p>Upon successful application, you will join our team of academic freelancers</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="w-75">
						<img src="{{asset('images/step3.png')}}" class="shadow">
						<h3 style="margin-top:10px;">Step 3</h3>
						<p>Accept many exciting project offers and start making money immediately</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row"  style="margin-top:50px;">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>Apply as a freelancer</h1><br>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt ligula purus, id blandit tortor pharetra laoreet. Quisque risus sem, vestibulum eu leo a, gravida commodo metus. Nam quis odio et leo fermentum ullamcorper et in enim. Aliquam consequat eget quam et dignissim. Duis quis rutrum odio. Phasellus at viverra nisi, a ullamcorper ex. Sed vehicula lobortis tortor. Curabitur luctus lacus vitae diam dignissim dignissim.</p>
			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sem lorem, interdum vitae nulla id, rhoncus tincidunt nisl. Aenean purus nisi, fringilla consequat mi nec, fringilla rhoncus metus. Suspendisse potenti. Proin quis ultricies diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam est libero, convallis in turpis non, aliquam porta risus. Ut lacinia ullamcorper sollicitudin.</p>

			<a class="theme-border" href="{{ route('freelancer-application') }}" id="learn_more">Learn more</a>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>