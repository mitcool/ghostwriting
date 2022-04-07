<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Session;
use Mail;
use Auth;
use Hash;
use Carbon\Carbon;

//models
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Service;
use App\Models\Faq;
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
use App\Models\CalculatorPrice;

//constants
use App\Constants\UserRoles;
use App\Constants\UserMessages;

//mails
use App\Mail\RequestPlaced;
use App\Mail\FreelancerApplication;
use App\Mail\ContactEmail;
use App\Mail\PaymentEmail;

//requests
use App\Http\Requests\ContactMailRequest;
use App\Http\Requests\FreelancerRequest;

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
        $faqs = Faq::where('type',0)->get();
        return view('pages.faqs')
            ->with('faqs',$faqs);
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getPrices(){
        $prices = CalculatorPrice::get()->groupBy('question');
        
        return view('pages.prices')
                            ->with('prices',$prices);
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
        $languages = Language::all();
        return view('pages.order')
            ->with('languages',$languages);
    }

    public function sendContactMail(ContactMailRequest $request){
        $validatedData = $request->validated();
        $admins = User::where('role',UserRoles::$adminRole);
        foreach ($admins as $admin) {
            try {
                Mail::to($admin->email)->send(new ContactEmail($validatedData));
            } catch (Exception $e) {
                info($e->getMessage());
            }
        }
        return redirect()->back()->with('success',UserMessages::$mail_sent);
    }

    public function requestOrder(Request $request){
        $input = $request->all();
        $details = $request->except('name','phone','email','_token');
        $order = new Order();
        $order->status = 0;
        $order->email = Auth::user() ? Auth::user()->email : $input['email'];
        $order->phone = Auth::user() ? Auth::user()->details->phone : $input['phone'];
        $order->name = Auth::user() ? Auth::user()->name : $input['name'];
        $order->save();
        $admins = User::where('role',UserRoles::$adminRole)->get();

        $order_id = Order::max('id');
        foreach($details as $key => $value){
            if($key == 'deadline'){
                $value = Carbon::parse($value)->format('d-m-Y');
            }
            $detail = new OrderDetail();
            $detail->order_id = $order_id;
            $detail->key = $key;
            $detail->value = $value;
            $detail->save();
        }
        $order_with_details = Order::with('details')->where('id',$order_id)->first();

        foreach ($admins as $admin) {
           try {
                Mail::to($admin->email)->send(new RequestPlaced($order_with_details));
            } catch (Exception $e) {
                info($e->getMessage());
            }
        }
        return redirect()->back()->with('success',UserMessages::$request_placed);
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

    public function freelancerApply(FreelancerRequest $request){

        $input = $request->validated();
        $jobs = $request->jobs;
        $languages = $request->languages;
        $subjects = $request->subjects;

        // create user in Users Table
        $user_data = $request->only('name','surname','email','role','password');
        $user_data["role"] = UserRoles::$notVerifiedFreelancer;
        $user = $this->createUser($user_data);

        //upload user
        $curriculum_vitae_file_name = $this->uploadFile($request->file('curriculum_vitae'),'/public/freelancers/curriculum_vitae');
        $work_samples_file_name = $this->uploadFile($request->file('work_samples'),'/public/freelancers/working_samples');
        $certificates_file_name = $this->uploadFile($request->file('certificates'),'/public/freelancers/certificates');

        //insert freelancer
        Freelancer::insert([
            'message' => $input['message'],
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

        //Mail to admins
        $admins = User::where('role',UserRoles::$adminRole)->get();
        foreach ($admins as $admin) {
            try {
                Mail::to($admin->email)->send(new FreelancerApplication($user));
            } catch (Exception $e) {
                info($e->getMessage());
            }
        }
        $this->insertNotification('New Freelancer Application',$admin->id);
        return redirect()->back()->with('success',UserMessages::$freelancer_apply_success);
    }

    public function learnMoreClient(){
        $faqs = Faq::where('type',1)->get();
        return view('pages.client-learn-more')
            ->with('faqs',$faqs);
    }

    public function changeDetails(Request $request){
        $input = $request->only('phone','phone_code','country_id','city','avatar','zip','company','vat','skype','address');
        $user_id = Auth::id();
        UserDetail::where('user_id',$user_id)->update([
            'phone'  => $input['phone'],   
            'phone_code' => $input['phone_code'],
            'country_id'  => $input['country_id'], 
            'city'     => $input['city'],
            'avatar'  => $input['avatar'], 
            'zip'   => $input['zip'],
            'company' => $input['company'], 
            'vat' => $input['vat'],
            'skype' => $input['skype'],
            'address' =>  $input['address']
         ]);

        return redirect()->back()->with('success',UserMessages::$details_changed);
    }
}