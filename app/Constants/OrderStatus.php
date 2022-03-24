<?php

namespace App\Constants;

class OrderStatus{

	public static $requested = 0;

	public static $offer = 1;

	public static $accepted = 2;

	public static $paid = 4;

	public static $in_progress = 5;

	public static $qa_check = 6;

	public static $sent_to_client = 7;

}