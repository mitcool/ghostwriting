<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Mail;

use App\Mail\FreelancerFinishWork;

use App\Models\User;
use App\Models\Invoice;

use App\Constants\OrderStatus;
use App\Constants\InvoiceStatus;
use App\Constants\UserMessages;

class FreelancerController extends Controller
{
    public function offers(){
    	$invoices = Invoice::with('order')->where('status',InvoiceStatus::$paid)->where('user_id',Auth::id())->get();
    	return view('freelancer.offers')
    			->with('invoices',$invoices);
    }

    public function settings(){
    	return view('freelancer.settings');
    }

    public function uploadWork(Request $request){
        ///TODO:FormRequest
    	$file = $this->uploadFile($request->file('work_file'),'/public/freelancers/work');
    	Invoice::where('id', $request->invoice_id)->update(['status'=>InvoiceStatus::$completed,'file' => $file]);
        $qas = User::where('role',UserRoles::$qaRole)->get();

        foreach ($qas as $qa) {
            try {
                Mail::to($qa->email)->send(new FreelancerFinishWork);
            } catch (\Exception $e) {
                info($e->getMessage());
            }
        }
                
    	return redirect()->back()->with('success',UserMessages::$freelancer_upload);
    }
}
