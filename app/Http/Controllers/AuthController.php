<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Constants\UserRoles;
use App\Constants\UserMessages;

use Auth;
use Hash;
use Mail;
use Session;

use App\Models\User;
use App\Models\UserDetail;

use App\Mail\VerifyAccountMail;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPasswordRequest;

use App\Mail\UserPin;
use App\Mail\ForgotPass;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
    	$credentials = $request->only('email', 'password');
        $user = User::where('email',$credentials['email'])->first();
        if(!$user){
           return redirect()->back()->withInput()->with('wrong','Wrong credentials');
        }
        if($user->is_banned == 1){
            return redirect()->back()->with('wrong','You are currently banned please contact our suportteam via email for more information');
        }
        
        if (Auth::attempt($credentials)) {
            User::where('id',$user->id)->update(['ip'=>$request->ip()]);
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withInput()->with('wrong','Wrong credentials');
    }

    public function checkIp(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return 2;
        }
        if($request->ip() !== $user->ip){
            $pin = rand(1,999999);
            User::where('id',$user->id)->update([
                'pin' => $pin
            ]);
            try {
                Mail::to($user->email)->send(new UserPin($pin));
            } catch (Exception $e) {
                 info($e->getMessage());
            }
            return 0;
        }
        else{
            return 1;
        }
    }


    public function checkPin(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return 0;
        }
        else if($user->pin == $request->pin){
            return 1;
        }
        else {
            return 2;
        }
    }

    public function register(UserRequest $request)
    {  
        $data = $request->validated();
        $data["role"] = UserRoles::$notVerifiedClient;
        $data['ip'] = $request->ip();
        $user = $this->createUser($data);
        UserDetail::insert(['user_id'=>$user->id]);
        try {
             Mail::to($data['email'])->send(new VerifyAccountMail($user->confirmation_code));
        } catch (\Exception $e) {
            info($e->getMessage());
        }
       
        return redirect()->back()->with('success','Successfully registered');
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('welcome');
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
            return redirect()->route('client-messages');
        }
        if(Auth::user()->role == UserRoles::$qaRole){
            return redirect()->route('qa');
        }
    }

    public function verifyAccount($code){
        if(!$code ||  User::where('confirmation_code',$code)->count() == 0){
            return;
        }
        User::where('confirmation_code',$code)->update(['role'=>UserRoles::$clientRole]);
        $user = User::where('confirmation_code',$code)->first();
        $this->insertNotification('Welcome to ghostwriting.com',$user->id);
        return redirect()->route('welcome')->with('success','Welcome to ghostwriting.com');
    }

    public function forgotPassword(){
        if(Auth::user()){
            return redirect()->route('welcome');
        }
    	return view('pages.forgot-password');
    }

    public function sendForgotPassMail(Request $request){
    	$email = $request->email;
        $user = User::where('email',$email)->first();
    	if($user){
    		$link = config('app.url').'/password/reset/'.$user->confirmation_code;
    		try {
    			Mail::to($email)->send(new ForgotPass($link));
    		} catch (Exception $e) {
    			info($e->getMessage());
    		}
            return redirect()->back()->with('success','Please check your email');
    	}
    	else{
    		return redirect()->back()->with('wrong','Invalid email');
    	}
    }

    public function resetPasswordForm($code){
        $password_requirements = UserMessages::passwordRequirements();
        return view('pages.reset-pass-form')
                ->with('password_requirements',$password_requirements)
                ->with('code',$code);
    }

    public function resetPassword(ForgotPasswordRequest $request,$code){
        $password = $request->password;
        if(User::where('confirmation_code',$code)->count()==0){
            return redirect()->back()->with('wrong',"No such user");
        }
        User::where('confirmation_code',$code)->update([
            'password' => Hash::make($password),
        ]);
        
        return redirect()->route('welcome')
            ->with('success','Password changed successfully');
    }
}
