<?php

namespace App\Constants;
use Session;

#always functions because of dynamic text

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

	//freelancer
	public function you_accepted_offer (){
		return 'You accepted the offer successfully.You can check details in "My Projects section"';
	}

	public function you_declined_offer(){
		 return 'You declined the offer successfully';
	}
	public function qa_approve_work(){
		return  'Proccess completed';
	}

	public function qa_not_approve_work(){
		return 'Proccess completed';
	}

	public function passwordRequirements(){
		 $requirements = Session::get('locale')=='de' 
		 	? 'Passwortanforderungen: mindestens 10 Zeichen (1 Grossbuchstabe, 1 Ziffer, 1 Sonderzeichen)' 
		 	: 'Password requirements: at least 10 characters (1 capital letter, 1 digit, 1 symbol)';

		 return $requirements;
	}
}