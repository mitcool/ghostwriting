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

	<script type="text/javascript">

		$('#email').on('keyup',function(){
			$('#login_error').html('');
		})
		$('#password').on('keyup',function(){
			$('#login_error').html('');
		})
		$('#pin').on('keyup',function(){
			$('#login_error').html('');
		})

		{{-- Check user IP --}}
		$('#check_ip').on('click',function(){
			$(this).attr('disabled',true);
			let email = $('#email').val();
			if(email==''){
				$('#login_error').html("Please enter an email address");
				$('#check_ip').attr('disabled',false);
				return;
			}
			$.ajax({
				method: "POST",
				data:{email:email},
		        url: "{{route('check-ip')}}",
		        headers: { 
		        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    	}
			}).done(function(result){
				if(result == 0){
					$('#pin').css('display', 'block');
					$('#check_pin').css('display','block');
					$('#check_ip').css('display','none');
				}
				else if(result==1){
					$('#login_form').submit();
				}
				else if(result == 2){
					$('#login_error').html('Please check your credentials');
					$('#check_ip').attr('disabled',false);
				}
			});
		});

		$('#check_pin').on('click',function(){
			$(this).attr('disabled',true);
			let pin = $('#pin').val();
			let email = $('#email').val();
			if(pin==''){
				$('#login_error').html('Please enter the code.');
				$('#check_pin').attr('disabled',false);
				return;
			}
			$.ajax({
				method: "POST",
				data:{
					pin:pin,
					email:email
				},
		        url: "{{route('check-pin')}}",
		        headers: { 
		        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    	}
			}).done(function(result){
				if(result==1){
				   $('#login_form').submit();
				}
				else if(result==2){
					$('#login_error').html('Please enter a valid PIN');
				}
				else{
					$('#login_error').html("Please check your credentials");
				}
			});

  			
		});

		$(document).ready(function(){
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
			var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			  return new bootstrap.Tooltip(tooltipTriggerEl)
			})
		})
	
	</script>
		
</body>

</html>

<x-cookies/> 
<x-footer/>