<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Mail;

use App\Mail\FreelancerFinishWork;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Notification;

use App\Constants\OrderStatus;
use App\Constants\InvoiceStatus;
use App\Constants\UserMessages;
use App\Constants\UserRoles;

use App\Mail\FreelancerDelineOffer;
use App\Mail\FreelancerAcceptOffer;

class FreelancerController extends Controller
{
    public function offers(){
    	$invoices = Invoice::with('order')
                            ->where('status',InvoiceStatus::$offered_to_freelancer)
                            ->where('user_id',Auth::id())
                            ->get();
    	return view('freelancer.offers')
    			->with('invoices',$invoices);
    }

    public function settings(){
    	return view('freelancer.settings');
    }

    public function projects(){
        $invoices = Invoice::where('status',InvoiceStatus::$accepted_by_freelancer)
                        ->orWhere('status',InvoiceStatus::$appointed_qa)
                        ->get();
        return view('freelancer.projects')
                ->with('invoices',$invoices);
    }

    public function uploadWork(Request $request){

        $input = $request->only('work_file','invoice_id');
        $invoice = Invoice::find($request->invoice_id);
    	$file = $this->uploadFile($request->file('work_file'),'/public/freelancers/work');
    	Invoice::where('id', $request->invoice_id)->update(['status'=>InvoiceStatus::$completed_by_freelancer,'file' => $file]);
        $qa = User::find($invoice->qa_id);
        $invoice->qa_name = $qa->name;
        try {
            Mail::to($qa->email)->send(new FreelancerFinishWork($invoice));
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        $this->insertNotification('You successfully uploaded your work for project '.$invoice->invoice_number, Auth::id());
        $this->insertNotification(Auth::user()->email. ' uploaded his/her work for project '.$invoice->invoice_number,$invoice->qa_id);

    	return redirect()->back()->with('success',UserMessages::$freelancer_upload);
    }

    public function messages(){
        $notifications = Notification::where('user_id',Auth::id())->get();
        return view('freelancer.messages')
            ->with('notifications',$notifications);
    }
   

    public function acceptWork(Request $request){
        $invoice = Invoice::find($request->invoice_id);
        Invoice::where('id',$invoice->id)->update(['status'=>InvoiceStatus::$accepted_by_freelancer]);
        $this->notifyAdmins('Freelancer '.Auth::user()->email. ' accepted to work for milestone '.$invoice->invoice_number);
        $this->insertNotification('You accepted to work on an offer. Please check your dashboard for more details',Auth::user()->id);

        $admins = User::where('role',UserRoles::$adminRole)->get();
        foreach ($admins as $admin){
            try {
                Mail::to($admin->email)->send(new FreelancerAcceptOffer($invoice));
            } catch (\Exception $e) {
                info($e->getMessage());
            }
        }
        return redirect()->back()->with('success',UserMessages::you_accepted_offer());
    }
    
    // go back to Appoint section of admin
    public function declineWork(Request $request){
        $invoice = Invoice::find($request->invoice_id);
        Invoice::where('id',$invoice->id)->update([
            'status'=>InvoiceStatus::$paid,
            'user_id'=> 0,

        ]);
        $this->notifyAdmins('Freelancer '.Auth::user()->email. ' declined to work for milestone '.$invoice->invoice_number.'. Please select a new freelancer');

        $admins = User::where('role',UserRoles::$adminRole)->get();
        foreach ($admins as $admin){
            try {
            Mail::to($admin->email)->send(new FreelancerDelineOffer($invoice));
            } catch (\Exception $e) {
                info($e->getMessage());
            }
        }
        return redirect()->back()->with('success',UserMessages::you_declined_offer());
    }
}
