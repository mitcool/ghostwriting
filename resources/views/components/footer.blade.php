<div class="theme-background text-center" style="padding:30px;">
	<h5 class="text-white">{{$texts[0]->text}}</h5>
	<ul class="nav justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link text-white" href="{{route('single-about','agb')}}">{{$texts[1]->text}}</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link text-white" href="{{route('single-about','faq')}}">{{$texts[2]->text}}</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link text-white" href="{{route('single-about','data-protection')}}">{{$texts[3]->text}}</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link text-white" href="{{route('single-about','imprint')}}">{{$texts[4]->text}}</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link text-white" href="{{route('blog')}}">{{$texts[5]->text}}</a>
	  </li>
	</ul>
</div>