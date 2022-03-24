<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Session;
use Mail;
use Auth;
use Hash;

//models
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Service;
use App\Models\Faq;
use App\Models\OrderOption;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\News;
use App\Models\Job;
use App\Models\Language;
use App\Models\Subject;
use App\Models\Freelancer;
use App\Models\FreelancerJob;
use App\Models\FreelancerLanguage;
use App\Models\FreelancerSubject;

use App\Constants\UserRoles;

//mails
use App\Mail\RequestPlaced;
use App\Mail\FreelancerApplication;

class HomeController extends Controller
{

    public function changeTheme($theme){
         Session::put('theme', $theme);
         return redirect()->back();
    }

    public function changeLanguage($lang){
        App::setLocale($lang);
        Session::put('locale', $lang);
        return redirect()->back();
    }

    public function getHome(){
    	return view('pages.welcome');
    } 

    public function getServices(){
    	$services = Service::all();
    	return view('pages.services')
    		->with('services',$services);
    }

    public function getService($service_slug){
    	$service = Service::where('slug',$service_slug)->first();
    	$services = Service::all();
    	return view('pages.service')
    		->with('services',$services)
    		->with('service',$service);
    }

    public function getFaq(){
    	$faqs = Faq::all();
    	return view('pages.faqs')
            ->with('faqs',$faqs);
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getPrices(){
        return view('pages.prices');
    }

    public function getAgb(){
        return view('pages.agb');
    }

    public function getDataProtection(){
        return view('pages.data-protection');
    }

    public function getImprint(){
        return view('pages.imprint');
    }

    public function getBlog(){
        $news = News::orderBy('created_at','desc')->paginate(8);
        return view('pages.blog')
                ->with('news',$news);
    }

    public function getSingleBlog($slug){
        $news = News::where('slug_en',$slug)->orWhere('slug_de',$slug)->first();
        $other_news = News::where('id','!=',$news->id)->take(3)->get();
        return view('pages.single-blog')
            ->with('other_news',$other_news)
            ->with('news',$news);
    }

    public function getOrder (){
        $main_options = OrderOption::all();
        return view('pages.order')
            ->with('main_options',$main_options);
    }

    public function sendContactMail(Request $request){
        dd($request->all());
    }

    public function requestOrder(Request $request){
        $input = $request->all();
        $details = $request->except('name','phone','email','_token');
        $order = new Order();
        $order->status = 0;
        $order->email = $input['email'];
        $order->phone = $input['phone'];
        $order->name = $input['name'];
        $order->save();

        $order_id = Order::max('id');
        foreach($details as $key => $value){
            $detail = new OrderDetail();
            if($key=='main'){
                $value = OrderOption::find($value)->name_en;
            }
            $detail->order_id = $order_id;
            $detail->key = $key;
            $detail->value = $value;
            $detail->save();
        }
        $order_with_details = Order::with('details')->where('id',$order_id)->first();

        try {
            Mail::to('hello@safdsf')->send(new RequestPlaced($order_with_details));
        } catch (Exception $e) {
            info($e->getMessage());
        }

        return redirect()->back()->with('success','Request placed successfully');
    }

    public function getFreelancerApplication(){
        $jobs = Job::all();
        $subjects = Subject::all();
        $languages = Language::all();
        return view('pages.freelancer-application')
            ->with('jobs',$jobs)
            ->with('subjects',$subjects)
            ->with('languages',$languages);
    }

    public function freelancerApply(Request $request){
        //TODO::  Validation request 
        $jobs = $request->jobs;
        $languages = $request->languages;
        $subjects = $request->subjects;

         // create user with role_id  == notVerifiedFreelancer 6
        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'role' => UserRoles::$notVerifiedFreelancer
        ]);

        $curriculum_vitae_file_name = $this->uploadFile($request->file('curriculum_vitae'),'/public/freelancers/curriculum_vitae');
        $work_samples_file_name = $this->uploadFile($request->file('work_samples'),'/public/freelancers/working_samples');
        $certificates_file_name = $this->uploadFile($request->file('certificates'),'/public/freelancers/certificates');

        //insert freelancer
        Freelancer::insert([
            'message' => $request->message,
            'curriculum_vitae' => $curriculum_vitae_file_name,
            'work_samples' => $work_samples_file_name,
            'certificates' => $certificates_file_name,
            'user_id' => $user->id,
        ]);

        //Insert Jobs 
        foreach ($jobs as $job_id) {
            FreelancerJob::insert([
                'user_id' => $user->id,
                'job_id'=> $job_id
           ]);
        }

        //Insert Language 
        foreach ($languages as $language_id) {
            FreelancerLanguage::insert([
                'user_id' => $user->id,
                'language_id'=> $language_id
           ]);
        }

        //Insert Subject 
        foreach ($subjects as $subject_id) {
            FreelancerSubject::insert([
                'user_id' => $user->id,
                'subject_id'=> $subject_id
           ]);
        }

        $admin = User::where('role',1)->first();
        try {
            Mail::to($admin->email)->send(new FreelancerApplication($user));
        } catch (Exception $e) {
            info($e->getMessage());
        }

        $this->insertNotification('New Freelancer Application',$admin->id);

        return redirect()->back();
    }

    public function learnMoreClient(){
        $faqs = Faq::all();
        return view('pages.client-learn-more')
            ->with('faqs',$faqs);
    }

    public function changeDetails(Request $request){

        //TODO::Request validation
        $user_id = Auth::id();

        UserDetail::where('user_id',$user_id)->update([
            'phone'  => $request->phone,   
            'phone_code' => $request->phone_code,
            'country_id'  => $request->country_id, 
            'city'     => $request->city,
            'avatar'  => $request->avatar, 
            'zip'   => $request->zip,
            'company' => $request->company, 
            'vat' => $request->vat,
            'skype' => $request->skype,
            'address' =>  $request->address
         ]);

        return redirect()->back()->with('success','Your details has been changed successfully');
    }
}
