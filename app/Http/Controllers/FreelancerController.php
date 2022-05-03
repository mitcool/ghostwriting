<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Mail;

use App\Mail\FreelancerFinishWork;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Order;

use App\Constants\OrderStatus;
use App\Constants\InvoiceStatus;
use App\Constants\UserMessages;
use App\Constants\UserRoles;

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

        $input = $request->only('work_file','invoice_id');
        $invoice = Invoice::find($request->invoice_id);
    	$file = $this->uploadFile($request->file('work_file'),'/public/freelancers/work');
    	Invoice::where('id', $request->invoice_id)->update(['status'=>InvoiceStatus::$completed,'file' => $file]);
        $this->checkIfAllMilestonesAreFinished($invoice->order->id);
        $qas = User::where('role',UserRoles::$qaRole)->get();

        foreach ($qas as $qa) {
            $invoice->qa_name = $qa->name;
            try {
                Mail::to($qa->email)->send(new FreelancerFinishWork($invoice));
            } catch (\Exception $e) {
                info($e->getMessage());
            }
        }
    	return redirect()->back()->with('success',UserMessages::$freelancer_upload);
    }

    private function checkIfAllMilestonesAreFinished($related_order_id){
        $order = Order::find($related_order_id);
        $is_order_completed = 1;
        foreach($order->invoices as $invoice){
            if($invoice->status == InvoiceStatus::$completed){
                $is_order_completed = 0;
            }
        }
        if($is_order_completed == 1){
            Order::where('id',$order->id)->update(['status'=>OrderStatus::$qa_check]);
        }
    }
}
