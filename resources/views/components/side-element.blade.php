<div style="position: fixed;left:3px;top:33%;">
<ul class="list-group">
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;" data-bs-target="#phone_modal" data-bs-toggle="modal">
	  		<i class="fa-solid fa-phone"></i>
	  	</span>
	  </li>
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;" data-bs-target="#contact_modal" data-bs-toggle="modal">
	  		<i class="fa-solid fa-book-open"></i>
	  	</span>
	  </li>
	  @if(Session::get('theme') == 'freelancer')
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<a href="{{route('freelancer-application')}}" style="color:black;text-decoration: none;">
	  		@if(Request::route()->getName()=='freelancer-application')
	  			<span class="theme-border theme-background theme-radius text-white" style="width:50px;height: 50px;padding: 10px;">
		  			<i class="fa-solid fa-pen-clip"></i>
		  		</span>
	  		@else 
		  		<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;">
		  			<i class="fa-solid fa-pen-clip"></i>
		  		</span>
		  	@endif
	  	</a>
	  </li>
	  @else
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<a href="{{route('order')}}" style="color:black;text-decoration: none;">
	  		@if(Request::route()->getName()=='order')
		  		<span class="theme-background theme-radius text-white" style="width:50px;height: 50px;padding: 10px;">
		  		<i class="fa-solid fa-basket-shopping"></i>
		  		</span>
	  		@else
		  		<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;">
		  		<i class="fa-solid fa-basket-shopping"></i>
		  		</span>
	  		@endif
	  	</a>
	  </li>
	  @endif
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<a target="_blank" href="https://www.facebook.com/" style="color:black;text-decoration: none;">
		  	<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;">
		  		<i class="fa-brands fa-facebook"></i>
		  	</span>
	  	</a>
	  </li>
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<a target="_blank" href="https://www.twitter.com/" style="color:black;text-decoration: none;">
		  	<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;">
		  		<i class="fa-brands fa-twitter"></i>
		  	</span>
	  	</a>
	  </li>
	  <li class="list-group-item mt-2 border-0 bg-transparent">
	  	<a target="_blank" href="https://www.instagram.com/" style="color:black;text-decoration: none;">
		  	<span class="theme-border theme-radius bg-white" style="width:50px;height: 50px;padding: 10px;">
		  		<i class="fa-brands fa-instagram"></i>
		  	</span>
	  	</a>
	  </li>
	</ul>
</div>