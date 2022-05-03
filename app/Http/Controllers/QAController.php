<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\OrderCompletedFreelancer;
use App\Mail\OrderCompletedClient;
use App\Mail\OrderCompletedAdmin;

use App\Models\User;
use App\Models\Invoice;

use App\Constants\InvoiceStatus;
use App\Constants\UserRoles;

class QAController extends Controller
{
    public function home(){

    	return view('qa.home');
    }

    public function orders(){
    	$invoices = Invoice::where('status',InvoiceStatus::$completed)->get();
    	return view('qa.orders')
    			->with('invoices', $invoices);
    }

    public function approveWork(Request $request){

        $invoice_id = $request->invoice_id;
        $invoice = Invoice::with('freelancer')->find($invoice_id);
        $admins = User::where('role',UserRoles::$adminRole)->get();

        //Update Invoice
        Invoice::where('id',$invoice_id)->update(['status'=> InvoiceStatus::$finished]);

        //Admin mail
        foreach($admins as $admin){
            try {
                Mail::to($admin->email)->send(new OrderCompletedAdmin($invoice));
            } catch (\Exception $e) {
                info($e->getMessage());
            }
        }

        //Client mail
        try {
            Mail::to($invoice->order->email)->send(new OrderCompletedClient($invoice));
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        //Freelancer mail
        try {
            Mail::to($invoice->freelancer->email)->send(new OrderCompletedFreelancer($invoice));
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        return redirect()->back()->with('success','Proccess completed');
    }

    public function notApproveWork(Request $request){
    	 //Update Invoice
        $invoice_id = $request->invoice_id;
        Invoice::where('id',$invoice_id)->update(['status'=> InvoiceStatus::$finished]);
        return redirect()->back()->with('success','Proccess completed');
    }
}
