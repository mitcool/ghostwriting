<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css" rel="stylesheet" media="all">
		/* Media Queries */
		@media only screen and (max-width: 500px) {
			.button {
				width: 100% !important;
			}
		}
	</style>
</head>

<?php
$style = [
	/* Layout ------------------------------ */

	'body' => 'margin: 0; padding: 0; width: 100%; background-color: #1a9efc;',
	'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #1a9efc;',

	/* Masthead ----------------------- */

	'email-masthead' => 'padding: 25px 0; text-align: center;',
	'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; text-shadow: 0 1px 0 white;',

	'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: white;',
	'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
	'email-body_cell' => 'padding: 0px;background-color: #FFF;border:1px solid lightgray;',

	'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
	'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

	/* Body ------------------------------ */

	'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
	'body_sub' => '',

	/* Type ------------------------------ */

	'anchor' => 'color: #3869D4;padding:0px 35px 0px 35px;',
	'header-1' => 'margin-top: 0; color: black; font-size: 21px; font-weight: bold; text-align: left;padding:35px 35px 0px 35px;',
	'paragraph' => 'margin-top: 0; color: #1a9efc; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',
	'paragraph-sub' => 'margin-top: 0; color: black; font-size: 18px; line-height: 1.5em; text-align:center;color:white;',
	'paragraph-center' => 'text-align: center;',
	'paragraph-black' => 'margin-top: 0; font-size: 16px; line-height: 1.1em; text-align:justify;padding:0px 35px 0px 35px;',
	'paragraph-blue' => 'color:#1A9EFC;margin-top: 0; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',

	/* Buttons ------------------------------ */

	'button' => 'display: block; display: inline-block; width: 320px; min-height: 20px; padding: 10px;
	background-color: #1a9efc; border-radius: 30px; color: #ffffff; font-size: 15px; line-height: 25px;
	text-align: center; text-decoration: none; -webkit-text-size-adjust: none; font-weight: 550;',

	'button--green' => 'background-color: #22BC66;',
	'button--red' => 'background-color: #dc4d2f;',
	'button--blue' => 'background-color: #3869D4;',
	'pin-span' => 'font-weight:bold;font-size:22px;',
	'link-blue' => 'display:inline-block;background-color: #1a9efc;color: white;font-weight: bold;border-radius: 30px;border:none;outline:none;padding:10px 20px;text-decoration:none;margin:0 auto;',
	'link-red' => 'display:inline-block;background-color: #F84162;color: white;font-weight: bold;border-radius: 30px;border:none;outline:none;padding:10px 20px;text-decoration:none;margin:0 auto;',
	'capital_letter' => 'font-weight: bold;text-transform: capitalize;',
];
$fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;';
$fontFamily1 = "font-family:'Montserrat', sans-serif;";
?>

<body style="{{ $style['body'] }}">
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td style="{{ $style['email-wrapper'] }}" align="center">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="{{ $style['email-masthead'] }}">
							<a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
								<img style="height:50px;" height="50" src="{{asset('images/thumbnail.png')}}" alt="" />
							</a>
						</td>
					</tr>
					<tr>
						<td style="{{ $style['email-body'] }}" width="100%">
							<table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">       
								<tr>
									<td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
										<img style="width:100%;" width="600" src="{{asset('images/Someone_order.jpg')}}" alt="" />
										<table align="center" width="550" cellpadding="10" cellspacing="10">
											<tr>
												<td>
													<br/>
													<h1 style="{{ $style['header-1'] }}">
														Dear {{$invoice->order->name}},
													</h1>
													<p style="{{ $style['paragraph-black'] }}">
														Thank you for you great work. The order 
														<br/>
													</p>
																								
													@foreach($invoice->order->details as $detail)
													<p style="{{ $style['paragraph-black'] }}"><span style="{{$style['capital_letter']}}">{{ str_replace('_',' ',$detail->key)}}</span> : {{$detail->value }}</p>
													@endforeach
													
										
													<p style="{{ $style['paragraph-blue'] }}">
														This email message is being sent to you automatically in connection with the processing of a project because you registered at the GHOSTWRITING.COM portal as a client, freelancer, or administrator as well as accepted the relevant terms and conditions in the course of the registration process. Please do not reply to this email. Log in to your account to carry out the appropriate actions and to use the appropriate communication options available.
													</p>
													<br/>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
								<tr>
									<td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
										<p style="{{ $style['paragraph-sub'] }}">
											&copy; 
											GHOSTWRITING.COM
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

</body>
</html>