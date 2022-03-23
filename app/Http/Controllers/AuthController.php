<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Constants\UserRoles;

use Auth;
use Hash;
use Mail;

use App\Models\User;

use App\Mail\VerifyAccountMail;

use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
	//TODO: Login Request
    public function login(Request $request){

    	$credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back();
    }

   public function register(UserRequest $request)
   {  
        $data = $request->validated();
        $user = $this->create($data);
        Mail::to($data['email'])->send(new VerifyAccountMail($user->confirmation_code));
        return redirect()->back()->with('success','Successfully registered');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'surname'=>$data['surname'],
        'email' => $data['email'],
        'role' => UserRoles::$notVerifiedClient,
        'password' => Hash::make($data['password']),
        'confirmation_code' => Str::random(30)
      ]);
    } 

    public function dashboard(){
    	if(!Auth::user()){
    		return redirect()->route('welcome');
    	}
    	if(Auth::user()->role == UserRoles::$adminRole){
    		return redirect()->route('admin');
    	}
        if(Auth::user()->role == UserRoles::$freelancerRole){
            return redirect()->route('freelancer-offers');
        }
        if(Auth::user()->role == UserRoles::$notVerifiedFreelancer){
            Auth::logout();
            return redirect()->route('welcome')->with('success','Please wait for approval from admin');
        }
        if(Auth::user()->role == UserRoles::$notVerifiedClient){
            Auth::logout();
            return redirect()->route('welcome')->with('success','Please confirm your email');
        }
        if(Auth::user()->role == UserRoles::$clientRole){
            Auth::logout();
            return redirect()->route('client-offers')->with('success','Please confirm your email');
        }
    }

    public function verifyAccount($code){
        if(!$code ||  User::where('confirmation_code',$code)->count() == 0){
            return;
        }
        User::where('confirmation_code',$code)->update(['role'=>UserRoles::$clientRole]);
        return redirect()->route('welcome')->with('success','Welcome to ghostwriting.com');
    }

}
