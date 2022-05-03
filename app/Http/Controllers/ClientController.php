<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Mail;
use PDF;
use Storage;

use App\Models\User;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Invoice;
use App\Models\CompanyDetail;

use App\Constants\OrderStatus;
use App\Constants\InvoiceStatus;
use App\Constants\UserMessages;

use App\Mail\PaymentEmail;

class ClientController extends Controller
{
	
    public function messages(){
    	$notifications = Notification::where('user_id',Auth::id())
    								->orderBy('created_at','desc')
    								->get();
    	return view('client.messages')
    			->with('notifications',$notifications);		
    }

	public function orders(){
		return view('client.orders');
	}

	public function settings(){
		$user = User::with('details')->find(Auth::id());
		$countries = DB::table('countries')->select('country_name_en','country_name_de','id','phone_code')->get();
		return view('client.settings')
				->with('user',$user)
				->with('countries',$countries);
	}

	public function acceptOffer($order_id){
		$order = Order::with('invoices')->with('details')->find($order_id);
		$single_milestone_price = $order->price/$order->milestones;
		for ($i=1; $i <= $order->milestones; $i++) { 
			$this->createInvoice($single_milestone_price,$order_id,InvoiceStatus::$pending,$i);
		}
		
		Order::where('id',$order_id)->update(['status' => OrderStatus::$accepted]);
		$this->notifyAdmins('Order '.$order->id.' was accepted from client. Please check Pending Payments section for more details');

		try {
			Mail::to($order->email)->send(new PaymentEmail($order));
		} catch (\Exception $e) {
			info($e->getMessage());
		}

		return redirect()->route('welcome')->with('success',UserMessages::$order_placed);
	}

	public function declineOffer($order_id){
		$order = Order::find($order_id) ?? abort(404);
		$this->notifyAdmins(UserMessages::orderDeclined($order->name,$order->id));
		Order::where('id',$order_id)->delete();
		OrderDetail::where('order_id',$order_id)->delete();
		return redirect()->route('welcome')->with('success','Your order request was successfully cancelled');
	}

	private function createInvoice($single_milestone_price,$order_id,$status,$milestone_number){
		$invoice = new Invoice();
		$invoice->order_id = $order_id;
		$invoice->price = $single_milestone_price;
		$invoice->status = $status;
		$invoice->milestone_number = $milestone_number;
		$invoice->invoice_number = $this->setInvoiceNumber();
		$invoice->save();
		$this->generatePDF($invoice);
	}

	public function generatePDF()   // 
    {
   		$invoice = Invoice::find(29);
   		$invoice->contractor = CompanyDetail::find(1);
        $pdf = PDF::loadView('pages.invoice', ['invoice'=>$invoice]);
        $file = $pdf->output();
		return $pdf->stream('public/'.$invoice->id.'.pdf', $file);
        // return;
    }

    private function setInvoiceNumber(){
    	$next_invoice = Invoice::count() == 0 ? 1 : Invoice::max('id') + 1;
        $numlength = strlen((string)$next_invoice);
    	$invoice_number = '01';
       
        for ($i = 3; $i <= (10 - $numlength); $i++) {
            $invoice_number .= '0';
        }
        $invoice_number .= $next_invoice;
    	return $invoice_number;
    }
	
}
