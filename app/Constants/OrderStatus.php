<?php

namespace App\Constants;

class OrderStatus{

	public static $requested = 0;

	public static $offer = 1;

	public static $accepted = 2;

	public static $paid = 3;

	public static $qa_check = 4;

	public static $sent_to_client = 5;

}