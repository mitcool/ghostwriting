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
	'paragraph-sub' => 'margin-top: 0; color: black; font-size: 18px; line-height: 1.5em; text-align:center;',
	'paragraph-center' => 'text-align: center;',
	'paragraph-black' => 'margin-top: 0; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',

	/* Buttons ------------------------------ */

	'button' => 'display: block; display: inline-block; width: 320px; min-height: 20px; padding: 10px;
	background-color: #1a9efc; border-radius: 30px; color: #ffffff; font-size: 15px; line-height: 25px;
	text-align: center; text-decoration: none; -webkit-text-size-adjust: none; font-weight: 550;',

	'button--green' => 'background-color: #22BC66;',
	'button--red' => 'background-color: #dc4d2f;',
	'button--blue' => 'background-color: #3869D4;',
	'pin-span' => 'font-weight:bold;font-size:22px;'
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
								<img style="height:50px;" width="200" src="{{asset('images/thumbnail.png')}}" alt="" />
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
													<a href="{{route('verify-account',[$code])}}">Verify Account</a>
														<br/>
													<p style="{{ $style['paragraph-black'] }}">
														lorem ipsum
														<br/>
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