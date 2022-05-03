<?php

namespace App\Constants;

class UserMessages{

	public static $mail_sent = "Message sent successfully";

	public static $request_placed = 'Request placed successfully';

	public static $freelancer_apply_success = 'Thank you for application. After confirmation of admin you can login';

	public static $details_changed = 'Your details has been changed successfully';

	//Freelancer dash
	public static $freelancer_upload = 'You have successfully uploaded your file. Please wait for QA check result';

	public static $order_placed = 'Thank you for your order, we can start work when the payment is done';

	public function orderDeclined($order_name,$order_id){
		return $order_name.' decline our offer for order number '.$order_id.'. Order and details are deleted from the system';
	}
}