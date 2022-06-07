<?php

namespace App\Constants;

class InvoiceStatus{

	public static $pending = 0;

	public static $paid = 1;

	public static $offered_to_freelancer = 2;

	public static $accepted_by_freelancer = 3;

	public static $appointed_qa = 4; //Completed From Freelancer

	public static $completed_by_freelancer = 5; //Completed From Freelancer

	public static $finished = 6;

}