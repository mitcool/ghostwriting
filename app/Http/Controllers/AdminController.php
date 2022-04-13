<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Mail;

use App\Models\User;
use App\Models\News;
use App\Models\FreelancerSubject;
use App\Models\Freelancer;
use App\Models\FreelancerLanguage;
use App\Models\FreelancerJob;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Faq;
use App\Models\CalculatorPrice;
use App\Models\TextEn;
use App\Models\TextDe;

use App\Constants\UserRoles;
use App\Constants\OrderStatus;
use App\Constants\InvoiceStatus;

use App\Mail\OfferMail;
use App\Mail\FreelancerApprove;
use App\Mail\FreelancerTaskEmail;
use App\Mail\PaymentReceived;

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
        $freelancer = User::find($freelancer_id);
        try {
            Mail::to($freelancer->email)->send(new FreelancerApprove($freelancer));
        } catch (\Exception $e) {
            
        }
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
        $orders_for_payment = Order::where('status',OrderStatus::$accepted)->get();
        return view('admin.orders')
                ->with('orders_for_payment',$orders_for_payment)
                ->with('orders',$orders);
    }

    public function sendOffer(Request $request,$order_id){
        $input = $request->only('offer','milestones');
        Order::where('id',$order_id)->update([
            'price'=>$input['offer'],
            'milestones' => $input['milestones'],
            'status' => OrderStatus::$offer
        ]);
        $order = Order::with('details')->find($order_id); 
        try {
            Mail::to($order->email)->send(new OfferMail($order));
        } catch (\Exception $e) {
            info($e->getMessage());
        }
        return redirect()->back()->with('success','Offer sent successfully');
    }
    public function pendingPayments(){
        $freelancers = User::where('role',UserRoles::$freelancerRole)->get();
        $orders = Order::with('details')
                        ->with('invoices')
                        ->where('status',OrderStatus::$accepted)
                        ->orderBy('created_at','desc')
                        ->get();
        return view('admin.pending-payments')
                ->with('freelancers',$freelancers)
                ->with('orders',$orders);
    }

    public function markAsPaid(Request $request, $invoice_id){
        
        Invoice::where('id',$invoice_id)->update([
            'status' => InvoiceStatus::$paid,
            'user_id'=>$request->freelancer
        ]);

        $invoice = Invoice::find($invoice_id);
        $freelancer_mail = User::find($request->freelancer)->email;

        try {
          Mail::to($freelancer_mail)->send(new FreelancerTaskEmail);
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        try {
          Mail::to($invoice->order->email)->send(new PaymentReceived);
        } catch (\Exception $e) {
            info($e->getMessage());
        }
    
        return redirect()->back()->with('success','Milestone marked as paid successfully');
    }

    public function inProgressOrders(){
        $invoices = Invoice::where('status',InvoiceStatus::$paid)->get();
        return view('admin.in-progress-orders')
                ->with('invoices',$invoices);
    }

    /// FAQ => type == 0 ; How it works => type == 1 ; // we use the same db table because logic and design are the same
    public function showFaqPanel(){
        $faqs = Faq::where('type',0)->get();
        return view('admin.faq')->with('faqs',$faqs);
    }

    //Same DB table as FAQ just different type
    public function showHowItWorksPanel(){
        $faqs = Faq::where('type',1)->get();
        return view('admin.how-it-works')->with('faqs',$faqs);
    }

    public function editFaq(Request $request){

        Faq::where('id',$request->faq_id)->update([
            'question_en' => $request->question_en,
            "question_de" =>  $request->question_de,
            "answer_en" =>  $request->answer_en,
            "answer_de" => $request->answer_de,
        ]);

        return redirect()->back()->with('success','FAQ updated successfully');
    }

    public function prices(){
        $prices = CalculatorPrice::all();
        return view('admin.prices')
                ->with('prices',$prices);
    }

    public function updatePrices(Request $request){
       $ids = $request->ids;
       $prices = $request->prices;
       for ($i=0; $i < count($ids); $i++) { 
           CalculatorPrice::where('id',$ids[$i])->update(['price' => $prices[$i]]);
       }
        return redirect()->back()->with('success','Prices updated successfully');
    }

    public function texts(Request $request){
        $pages = TextEn::select('page')->distinct()->pluck('page');
        return view('admin.texts')->with('pages', $pages);
    }

    public function singlePage($page){
        $texts_en = TextEn::where('page',$page)->get();
        $texts_de = TextDe::where('page',$page)->get();
        return view('admin.single-page')
                    ->with('texts_de',$texts_de)
                    ->with('texts_en',$texts_en);
    }

    public function saveText(Request $request){
        $texts_en = $request->texts_en;
        $texts_de = $request->texts_de;

        foreach($texts_en as $id => $text){
            TextEn::where('id',$id)->update([
                'text' => $text               
            ]);
        }

        foreach($texts_de as $id => $text){
            TextDe::where('id',$id)->update([
                'text' => $text
            ]);
        }

        return redirect()->back()->with('success','Texts updated successfully');
    }

}
