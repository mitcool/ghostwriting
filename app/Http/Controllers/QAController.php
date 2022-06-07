<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Auth;
use PDF;
use Storage;

use App\Mail\OrderCompletedFreelancer;
use App\Mail\OrderCompletedClient;
use App\Mail\OrderCompletedAdmin;
use App\Mail\QaFeedback;

use App\Models\User;
use App\Models\Invoice;
use App\Models\CompanyDetail;

use App\Constants\InvoiceStatus;
use App\Constants\UserRoles;
use App\Constants\UserMessages;

class QAController extends Controller
{
    public function home(){

    	return view('qa.home');
    }

    public function orders(){
    	$invoices = Invoice::where('id',Auth::id())
                            ->where('status',InvoiceStatus::$appointed_qa)
                            ->orWhere('status',InvoiceStatus::$completed_by_freelancer)
                            ->get();
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

        // Create payment Document for freelancer (same file name, but different folder)
        $this->generateFreelancerPDF($invoice);

        //Freelancer mail
        try {
            Mail::to($invoice->freelancer->email)->send(new OrderCompletedFreelancer($invoice));
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        //Notifications
        $this->notifyAdmins('Milestone '.$invoice->invoice_number.' completed');
        if(User::where('email',$invoice->order->email)->count()>0){
            $client_id = User::where('email',$invoice->order->email)->first()->id;
            $this->insertNotification('Your milestone '.$invoice->invoice_number.' was successfully completed',$client_id);
        }
        
        $this->insertNotification('Your work on project '.$invoice->invoice_number.' was approved from QA. Payment is comming to you',$invoice->freelancer->id);

        return redirect()->back()->with('success',UserMessages::qa_approve_work());
    }

    public function notApproveWork(Request $request){
        $invoice = Invoice::find($request->invoice_id);
        Invoice::where('id',$invoice->id)->update(['status'=> InvoiceStatus::$appointed_qa]);
        $invoice->feedback =  $request->feedback;
        try {
            Mail::to($invoice->freelancer->email)->send(new QaFeedback($invoice));
        } catch (\Exception $e) {
            info($e->getMessage());
        }
        $notification = 'Please make some correction on '.$invoice->invoice_number.' project';
        $notification_qa = 'You successfully send correction for project '.$invoice->invoice_number .' to '.$invoice->freelancer->email;
        $this->insertNotification($notification,$invoice->freelancer->id);
        $this->insertNotification($notification_qa,Auth::id());
        return redirect()->back()->with('success',UserMessages::qa_not_approve_work());
    }

    public function generateFreelancerPDF($invoice)   // 
    {
        $invoice->contractor = CompanyDetail::find(1);
        $pdf = PDF::loadView('pages.freelancer-invoice', ['invoice'=>$invoice]);
        Storage::put('public/freelancer/'.$invoice->invoice_number.'.pdf', $pdf->output());
        return $pdf->download($invoice->invoice_number.'.pdf');       
    }
}
