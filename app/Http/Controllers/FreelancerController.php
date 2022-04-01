<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Invoice;

class FreelancerController extends Controller
{
    public function offers(){
    	$invoices = Invoice::with('order')->where('user_id',Auth::id())->get();
    	return view('freelancer.offers')
    			->with('invoices',$invoices);
    }

    public function settings(){
    	return view('freelancer.settings');
    }
}
