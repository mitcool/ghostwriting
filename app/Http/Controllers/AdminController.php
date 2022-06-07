<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Mail;
use Auth;

use App\Models\User;
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
use App\Models\Service;
use App\Models\CompanyDetail;
use App\Models\Discipline;
use App\Models\Tutorial;
use App\Models\Notification;

use App\Constants\UserRoles;
use App\Constants\OrderStatus;
use App\Constants\InvoiceStatus;

use App\Mail\OfferMail;
use App\Mail\FreelancerApprove;
use App\Mail\FreelancerTaskEmail;
use App\Mail\PaymentReceived;
use App\Mail\QATaskMail;


class AdminController extends Controller
{
    public function admin(){
        $notifications = Notification::where('user_id',Auth::id())->orderBy('created_at','desc')->get();
    	return view('admin.welcome')
            ->with('notifications',$notifications);
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
        return redirect()->back()->with('success','Freelancer has been approved successfully');
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

        return redirect()->back()->with('success', 'Freelancer deleted from the system');
    }

    public function banUser(){
        $users = User::where('role',UserRoles::$clientRole)
                        ->orWhere('role',UserRoles::$freelancerRole)
                        ->get();
        return view('admin.users-list')->with('users', $users);
    }

    public function orders(){
        $orders = Order::with('details')->where('status',OrderStatus::$requested)->get();
        return view('admin.orders')
                ->with('orders',$orders);
    }

    public function sendOffer(Request $request,$order_id){
        $input = $request->only('offer','milestones','email_content');
        Order::where('id',$order_id)->update([
            'price'=>$input['offer'],
            'milestones' => $input['milestones'],
            'status' => OrderStatus::$offer
        ]);
        $order = Order::with('details')->find($order_id); 
        $order->email_content = $input['email_content'];
        try {
            Mail::to($order->email)->send(new OfferMail($order));
        } catch (\Exception $e) {
            info($e->getMessage());
        }
        if(User::where('email',$order->email)->count() > 0){
            $user = User::where('email',$order->email)->first();
            $this->insertNotification('Dear '.$user->name.' we have an offer for your request. Please check your email',$user->id);
        }
        return redirect()->back()->with('success','Offer sent successfully');
    }

    public function pendingPayments(){
        $invoices = Invoice::with('order')
                        ->where('status',InvoiceStatus::$pending)
                        ->orderBy('created_at','desc')
                        ->get();
        return view('admin.pending-payments')
                ->with('invoices',$invoices);
    }

    public function markAsPaid(Request $request, $invoice_id){
        $invoice = Invoice::find($invoice_id);
        Invoice::where('id',$invoice_id)->update([
            'status' => InvoiceStatus::$paid,
        ]);

        try {
            Mail::to($invoice->order->email)->send(new PaymentReceived($invoice));
        } catch (Exception $e) {
           info($e->getMessage()); 
        }
        return redirect()->back()->with('success','Milestone marked as paid successfully. Please appoint a freelancer for this milestone');
    }

    public function appointFreelancer(){
        $invoices = Invoice::where('status',InvoiceStatus::$paid)->get();
        $freelancers = User::where('role',UserRoles::$freelancerRole)->get();

        return  view('admin.appoint-freelancer')
                ->with('freelancers',$freelancers)
                ->with('invoices',$invoices);
    }

    public function appointFreelancerPost(Request $request){
        $input = $request->only('invoice_id','freelancer_payment','freelancer_id');

        Invoice::where('id',$input['invoice_id'])->update([
            "freelancer_payment" => $input['freelancer_payment'],
            "user_id" => $input['freelancer_id'],
            "status" => InvoiceStatus::$offered_to_freelancer
        ]);

        $invoice = Invoice::find($input['invoice_id']);
        $freelancer_mail = User::find($request->freelancer_id)->email;

        // Notifications
        try {
          Mail::to($freelancer_mail)->send(new FreelancerTaskEmail($invoice));
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        return redirect()->back()->with('success','Freelancer for this milestone appointed successfully.');
    }

    public function banUserPost(Request $request,$flag){
       $user_id = $request->user_id;
       User::where('id',$user_id)->update([
            'is_banned' => $flag
       ]);
       return redirect()->back()->with('success','User status changed successfully');
    }

    public function inProgressOrders(){
        $invoices = Invoice::where('status',InvoiceStatus::$appointed_qa)
            ->orWhere('status',InvoiceStatus::$completed_by_freelancer)
            ->get();
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
        $services = null;
        if($page == 'services'){
            $services = Service::all();
        }
        return view('admin.single-page')
                    ->with('services',$services)
                    ->with('page',$page)
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

    public function saveService(Request $request){
        $names = $request->names;
        $names_de = $request->names_de;
        $descriptions = $request->descriptions;
        $descriptions_de = $request->descriptions_de;


        for ($i=1; $i <= count($names); $i++) { 
            Service::where('id',$i)->update([
                "name" => $names[$i],
                "name_de" =>$names_de[$i],
                "description" => $descriptions[$i],
                "description_de" => $descriptions_de[$i],
                'slug' => Str::slug($names[$i])
            ]);
        }

        return redirect()->back()->with('success','Services updated successfully');
    }

    public function companyDetails(){
        $company_details = CompanyDetail::find(1);
        return view('admin.company-details')
                ->with('company_details',$company_details);
    }

    public function companyDetailsSave(Request $request){

        CompanyDetail::where('id',1)->update([
            "name" => $request->name,
            "address" => $request->address,
            "company_phone" => $request->company_phone,
            "contact_phone" => $request->contact_phone,
            "zip" => $request->zip,
            "city" => $request->city,
            "country" => $request->country,
        ]);

         return redirect()->back()->with('success','Details saved successfully');
    }

    public function disciplines(){
        $disciplines = Discipline::all();
        $services = Service::all();
        return view('admin.disciplines')
                ->with('services', $services)
                ->with('disciplines', $disciplines);
    }



    public function editDisciplines($type,$resource_id){
        if($type=='discipline'){
             $resource = Discipline::find($resource_id);
        }
        else{
            $resource = Service::find($resource_id);
        }
        
        return view('admin.single-service-discipline')
                ->with('type',$type)
                ->with('resource',$resource);        
    }

    public function editDiscipline(Request $request,$resource_id){
        if($request->type=='discipline'){
            Discipline::where('id',$resource_id)->update([
                'name' => $request->name,
                'name_de' => $request->name_de,
                'description' => $request->description,
                'description_de' => $request->description_de,
                'slug' => $request->slug,
                'slug_de' => $request->slug_de,   
            ]);
        }
        else{
            Service::where('id',$resource_id)->update([
                'name' => $request->name,
                'name_de' => $request->name_de,
                'description' => $request->description,
                'description_de' => $request->description_de,
                'slug' => $request->slug,
                'slug_de' => $request->slug_de,
            ]);
        }

        return redirect()->back()->with('success',$request->type. ' updated successfully');
    }

    public function editServices($service_id){
        $resource = Service::find($service_id);
        return view('admin.single-service-discipline')
        ->with('resource',$resource);
    }

    public function deleteDiscipline(Request $request,$discipline_id){
        if($request->type=='discipline'){
            Discipline::find($discipline_id)->delete();
        }
        else{
            Service::find($discipline_id)->delete();
        }
       
        return redirect()->route('admin-disciplines')->with('success','Discipline deleted successfully');
    }

    public function addDiscipline($type){
        return view('admin.add-discipline-service')
                    ->with('type',$type);
    }

    public function addDisciplineService(Request $request){

        if($request->type == 'discipline'){
            Discipline::insert([               
                'name' => $request->name,
                'name_de' => $request->name_de,
                'description' => $request->description,
                'description_de' => $request->description_de,
                'slug' => Str::slug($request->name)
            ]);
        }
        else{
            Service::insert([
                'name' => $request->name,
                'name_de' => $request->name_de,
                'description' => $request->description,
                'description_de' => $request->description_de,
                'slug' => Str::slug($request->name)
            ]);
        }
        return redirect()->route('admin-disciplines')->with('success','Discipline deleted successfully');
    }

    public function tutorials(){
        $tutorials = Tutorial::all();
        return view('admin.tutorials')
                ->with('tutorials',$tutorials);
    }

    public function deleteTutorial($tutorial_id){
        $tutorial_image = public_path('tutorial-images').'/'.Tutorial::find($tutorial_id)->thumbnail;
        $this->unlinkFile($tutorial_image);
        Tutorial::find($tutorial_id)->delete();
        return redirect()->back()->with('success','Tutorial deleted successfully');
    }

    public function addTutorial(Request $request){
        $thumbnail = $this->uploadFile($request->file('thumbnail'),'/public/tutorial-images');
        Tutorial::insert([
            'thumbnail'=>$thumbnail,
            'video' => $request->video
        ]);

        return redirect()->back()->with('success','Tutorial updated successfully');
    }

    public function appointQA(){
        $invoices = Invoice::where('status',InvoiceStatus::$accepted_by_freelancer)->get();
        $qas = User::where('role',UserRoles::$qaRole)->get();
        return view('admin.appoint-qa')
                ->with('qas',$qas)
                ->with('invoices',$invoices);
    }

    public function appointQAPost(Request $request){
        $input = $request->only('qa_id','invoice_id');
        $invoice = Invoice::find($input['invoice_id']);
        $qa_mail = User::find($input['qa_id'])->email;

        Invoice::where('id',$input['invoice_id'])->update([
            'status' => InvoiceStatus::$appointed_qa,
            'qa_id' =>  $input['qa_id']
        ]);

        try {
          Mail::to($qa_mail)->send(new QATaskMail);
        } catch (\Exception $e) {
            info($e->getMessage());
        }

        // notifications
        return redirect()->back()->with('success','QA appointed successfully for the order');

    }

}
