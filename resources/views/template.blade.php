<x-head/>


<body>
	<x-header/>

	<div class="container text-center">
		<x-flash-messages/>
	</div>

	@yield('content')

	<x-modals/>

	@guest
		<x-side-element/>
	@endguest

	@yield('scripts')
</body>

</html>

<x-footer/>