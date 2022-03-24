<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\News;
use App\Models\FreelancerSubject;
use App\Models\Freelancer;
use App\Models\FreelancerLanguage;
use App\Models\FreelancerJob;
use App\Models\Order;

use App\Constants\UserRoles;
use App\Constants\OrderStatus;

class AdminController extends Controller
{
    public function admin(){

    	return view('admin.home');
    }

    public function addNews(){

    	return view('admin.news');
    }

    public function createNews(Request $request){

        // TODO: validation request
    	$input = $request->all();
    	if($request->hasFile('picture')){
    		$picture = $request->file('picture');
    		$fileName = time().'_'.$picture->getClientOriginalName().'.'.$picture->getClientOriginalExtension();
            $filePath = $request->file('picture')->move('news',$fileName);
	    	News::insert([
	    		'title_en' => $input['title_en'], 
	    		'title_de' => $input['title_de'],
	    		'description_en' => $input['description_en'],
	    		'description_de' => $input['description_de'],
	    		'content_en' => $input['content_en'],
	    		'content_de' => $input['content_de'],
	    		'slug_en' => Str::slug($input['title_en']),
	    		'slug_de' => Str::slug($input['title_de']),
	    		'picture' => $fileName,
	    	]);
    	}
    	

    	return redirect()->back()->with('success','News created successfully');
    }

    public function freelancerList(){
        $not_approved_freelancers = User::with('freelancer')->with('freelancer_jobs')->where('role',UserRoles::$notVerifiedFreelancer)->get();
        return view('admin.freelancers-list')
            ->with('not_approved_freelancers',$not_approved_freelancers);
    }

    public function approveFreelancer($freelancer_id){
        User::where('id',$freelancer_id)->update(['role' => UserRoles::$freelancerRole]);
        //mail to user approved
        return redirect()->back();
    }

    public function declineFreelancer($freelancer_id){
        User::where('id',$freelancer_id)->delete();

        $freelancer = Freelancer::where('user_id',$freelancer_id)->first();

        $curriculum_vitae = base_path().'/public/freelancers/curriculum_vitae/'.$freelancer->curriculum_vitae;
        $certificates = base_path().'/public/freelancers/certificates/'.$freelancer->certificates;
        $working_samples = base_path().'/public/freelancers/working_samples/'.$freelancer->work_samples;

        $this->unlinkFile($curriculum_vitae);
        $this->unlinkFile($certificates);
        $this->unlinkFile($working_samples);

        Freelancer::where('user_id',$freelancer_id)->delete();
        FreelancerJob::where('user_id',$freelancer_id)->delete();
        FreelancerSubject::where('user_id',$freelancer_id)->delete();
        FreelancerLanguage::where('user_id',$freelancer_id)->delete();

        return redirect()->back();
    }

    public function orders(){
        $orders = Order::with('details')->where('status',OrderStatus::$requested)->get();
        return view('admin.orders')
                ->with('orders',$orders);
    }

    public function sendOffer(Request $request,$order_id){

        Order::where('id',$order_id)->update([
            'status' => OrderStatus::$offer
        ]);

        return redirect()->back()->with('success','Offer sent successfully');
    }
}
