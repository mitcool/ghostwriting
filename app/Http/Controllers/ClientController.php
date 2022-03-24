<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

use App\Models\User;
use App\Models\Notification;

class ClientController extends Controller
{
	
    public function messages(){
    	$notifications = Notification::where('user_id',Auth::id())
    								->orderBy('created_at','desc')
    								->get();
    	return view('client.messages')
    			->with('notifications',$notifications);		
    }

	public function orders(){
		return view('client.orders');
	}

	public function settings(){
		$user = User::with('details')->find(Auth::id());
		$countries = DB::table('countries')->select('country_name_en','country_name_de','id','phone_code')->get();
		return view('client.settings')
				->with('user',$user)
				->with('countries',$countries);
	}

}
