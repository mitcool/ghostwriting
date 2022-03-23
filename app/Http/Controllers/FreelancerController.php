<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function offers(){
    	return view('freelancer.offers');
    }

    public function settings(){
    	return view('freelancer.settings');
    }
}
