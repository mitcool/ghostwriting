<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
	
    public function messages(){
    	return view('client.messages');		
    }

	public function orders(){
		return view('client.orders');
	}

	public function settings(){
		return view('client.settings');
	}

}
