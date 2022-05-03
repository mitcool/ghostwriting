<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\SandboxController;


Route::get('/change-language/{lang}',[HomeController::class,'changeLanguage'])->name('change-language');

Route::get('/change-theme/{type}',[HomeController::class,'changeTheme'])->name('change-theme');

Route::get('/', [HomeController::class,'getHome'])->name('welcome');

Route::get('/services', [HomeController::class,'getServices'])->name('services');

Route::get('/service/{slug}',[HomeController::class,'getService'])->name('service');

Route::get('/disciplines', [HomeController::class,'getDisciplines'])->name('disciplines');

Route::get('/discipline/{slug}',[HomeController::class,'getDiscipline'])->name('discipline');

Route::get('/faq',[HomeController::class,'getFaq'])->name('faq');

Route::get('/about',[HomeController::class,'getAbout'])->name('about');

Route::get('/tutorials',[HomeController::class,'getTutorials'])->name('tutorial');

Route::get('/prices',[HomeController::class,'getPrices'])->name('prices');

Route::get('/agb',[HomeController::class,'getAgb'])->name('agb');

Route::get('/data-protection',[HomeController::class,'getDataProtection'])->name('data-protection');

Route::get('/imprint',[HomeController::class,'getImprint'])->name('imprint');

Route::get('/blog',[HomeController::class,'getBlog'])->name('blog');

Route::get('/blog/{slug}',[HomeController::class,'getSingleBlog'])->name('single-blog');

Route::get('/order',[HomeController::class,'getOrder'])->name('order');

Route::post('/contact-mail',[HomeController::class,'sendContactMail'])->name('contact-mail');

Route::post('/request-order',[HomeController::class,'requestOrder'])->name('request-order');

Route::get('/freelancer/application',[HomeController::class,'getFreelancerApplication'])->name('freelancer-application');

Route::post('/freelancer/apply',[HomeController::class,'freelancerApply'])->name('freelancer-apply');

Route::get('/client/info',[HomeController::class,'learnMoreClient'])->name('learn-more-client');

Route::get('/verify/{code}',[AuthController::class,'verifyAccount'])->name('verify-account');

Route::get('/offer/accept/{order_id}',[ClientController::class,'acceptOffer'])->name('accept-offer');

Route::get('/offer/decline/{order_id}',[ClientController::class,'declineOffer'])->name('decline-offer');

Route::post('/freelancer/apply',[HomeController::class,'freelancerApply'])->name('freelancer-apply');

Route::post('/contact-mail',[HomeController::class,'sendContactMail'])->name('contact-mail');

Route::post('/request-order',[HomeController::class,'requestOrder'])->name('request-order');

//Freelancer
Route::group(['prefix' => 'freelancer','middleware'=>'freelancer'], function(){

	Route::get('/offers',[FreelancerController::class,'offers'])->name('freelancer-offers');

	Route::get('/messages',[FreelancerController::class,'messages'])->name('freelancer-messages');

	Route::get('/orders',[FreelancerController::class,'orders'])->name('freelancer-orders');

	Route::get('/settings',[FreelancerController::class,'settings'])->name('freelancer-settings');

	Route::post('/work/upload',[FreelancerController::class,'uploadWork'])->name('freelancer-work-upload');

});

// Client
Route::group(['prefix'=>'client','middleware'=>'client'],function(){

	Route::get('/messages',[ClientController::class,'messages'])->name('client-messages');

	Route::get('/orders',[ClientController::class,'orders'])->name('client-orders');

	Route::get('/settings',[ClientController::class,'settings'])->name('client-settings');
});

// QA 
Route::group(['prefix'=>'qa','middleware'=>'qa'],function(){

	Route::get('/home',[QAController::class,'home'])->name('qa');

	Route::get('/orders',[QAController::class,'orders'])->name('orders-qa-check');

	Route::post('/approve-work',[QAController::class,'approveWork'])->name('approve-work');

	Route::post('/not-approve-work',[QAController::class,'notApproverWork'])->name('not-approve-work');

});

Route::post('/change-details',[HomeController::class,'changeDetails'])->name('change-details');

// Authentication
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Admin routes
Route::group(['prefix' => 'admin','middleware'=>'admin'], function(){

	Route::get('/',[AdminController::class,'admin'])->name('admin');

	Route::get('/news/add',[AdminController::class,'addNews'])->name('add-news');

	Route::post('/news/create',[AdminController::class,'createNews'])->name('create-news');

	Route::get('/freelancers',[AdminController::class,'freelancerList'])->name('freelancer-list');

	Route::post('/freelancer/approve/{freelancer_id}',[AdminController::class,'approveFreelancer'])->name('approve-freelancer');

	Route::post('/freelancer/decline/{freelancer_id}',[AdminController::class,'declineFreelancer'])->name('decline-freelancer');

	Route::get('/orders/requested',[AdminController::class,'orders'])->name('admin-orders');

	Route::post('/offer/send/{order_id}',[AdminController::class,'sendOffer'])->name('send-offer');

	Route::get('/orders/pending-payments',[AdminController::class,'pendingPayments'])->name('pending-payments');

	Route::post('/orders/mark-as-paid/{invoice_id}',[AdminController::class,'markAsPaid'])->name('mark-as-paid');

	Route::get('/orders/in-progress',[AdminController::class,'inProgressOrders'])->name('in-progress-orders');

	Route::get('/content/faq',[AdminController::class,'showFaqPanel'])->name('admin-faq');

	Route::get('/content/how-it-works',[AdminController::class,'showHowItWorksPanel'])->name('admin-how-it-works');

	Route::get('/content/texts',[AdminController::class,'texts'])->name('admin-texts');

	Route::get('/content/texts/{page}',[AdminController::class,'singlePage'])->name('edit-single-page');

	Route::post('/content/texts/save',[AdminController::class,'saveText'])->name('save-text');

	Route::post('/faq/edit',[AdminController::class,'editFaq'])->name('edit-faq');

	Route::get('/prices',[AdminController::class,'prices'])->name('admin-prices');

	Route::post('/prices/update',[AdminController::class,'updatePrices'])->name('change-prices');

	Route::post('/services/save',[AdminController::class,'saveService'])->name('save-service');

	Route::get('/company/details',[AdminController::class,'companyDetails'])->name('admin-company-details');

	Route::post('/company/details/save',[AdminController::class,'companyDetailsSave'])->name('save-company-details');

	// All Services + Discipline (same logic just different db tables)
	Route::get('/disciplines',[AdminController::class,'disciplines'])->name('admin-disciplines');

	Route::get('/edit/{type}/{discipline_id}',[AdminController::class,'editDisciplines'])->name('edit-single-resource');

	Route::post('/disciplines/edit/{discipline_id}',[AdminController::class,'editDiscipline'])->name('edit-disciplines');
	Route::post('/discipline/delete/{discipline_id}',[AdminController::class,'deleteDiscipline'])->name('delete-discipline');

	Route::get('/disciplines/add/{type}',[AdminController::class,'addDiscipline'])->name('add-resource');

	Route::post('/discipline/add',[AdminController::class,'addDisciplineService'])->name('add-discipline-service');

	Route::get('/tutorials',[AdminController::class,'tutorials'])->name('admin-tutorials');

	Route::post('/tutorials/delete/{tutorial_id}',[AdminController::class,'deleteTutorial'])->name('delete-tutorial');

	Route::post('/tutorials/add',[AdminController::class,'addTutorial'])->name('add-tutorial');

});



Route::get('/test-invoice',[ClientController::class,'generatePDF']);

Route::get('/test',[SandboxController::class,'test']);