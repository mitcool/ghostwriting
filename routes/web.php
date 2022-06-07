<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\SandboxController;
use App\Models\CustomRoute;




Route::get(trans('routes.home'), ['as' => 'welcome', 'uses' => 'HomeController@getHome']);

Route::get(trans('routes.about'), ['as' => 'about', 'uses' => 'HomeController@getAbout']);









// $public_routes = CustomRoute::get();
// foreach($public_routes as $route){
// 	Route::get($route->url_en,$route->action)->name($route->name_en);
// }

// Route::group(['prefix' => 'en','middleware'=>'translate'],function(){
// 	$public_routes = CustomRoute::where('slug',0)->get();
// 	foreach($public_routes as $route){
// 		Route::get($route->url_en,$route->action)->name($route->name_en);
// 	}
// });

// Route::group(['prefix' => 'de','middleware'=>'translate'],function(){
// 	$public_routes = CustomRoute::where('slug',0)->get();
// 	foreach($public_routes as $route){
// 		Route::get($route->url_de,$route->action)->name($route->name_de);
// 	}
	
// });
// Route::group(['prefix' => 'en','middleware'=>'translate-slug'],function(){
// 	$public_routes = CustomRoute::where('slug',1)->get();
// 	foreach($public_routes as $route){
// 		Route::get($route->url_en,$route->action)->name($route->name_en);
// 	}
	
// });

// Route::group(['prefix' => 'de','middleware'=>'translate-slug'],function(){
// 	$public_routes = CustomRoute::where('slug',1)->get();
// 	foreach($public_routes as $route){
// 		Route::get($route->url_de,$route->action)->name($route->name_de);
// 	}
	
// });


//Public POST routes
Route::post('/delete-notification',[Controller::class,'deleteNotifications'])->name('delete-notification');

Route::post('/contact-mail',[HomeController::class,'sendContactMail'])->name('contact-mail');

Route::post('/request-order',[HomeController::class,'requestOrder'])->name('request-order');

Route::post('/freelancer/apply',[HomeController::class,'freelancerApply'])->name('freelancer-apply');

// Nofollow Urls
Route::get('/change-language/{lang}',[HomeController::class,'changeLanguage'])->name('change-language');

Route::get('/change-theme/{type}',[HomeController::class,'changeTheme'])->name('change-theme');

Route::get('/verify/{code}',[AuthController::class,'verifyAccount'])->name('verify-account');

Route::get('/offer/accept/{order_id}',[ClientController::class,'acceptOffer'])->name('accept-offer');

Route::get('/offer/decline/{order_id}',[ClientController::class,'declineOffer'])->name('decline-offer');

Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgot-password');

Route::post('/send-forgot-pass-mail',[AuthController::class,'sendForgotPassMail'])->name('send-forgot-pass-mail');

Route::get('/password/reset/{code}',[AuthController::class,'resetPasswordForm'])->name('reset-password-form');

Route::post('/reset-pass/{code}',[AuthController::class,'resetPassword'])->name('reset-password');

//Freelancer
Route::group(['prefix' => 'freelancer','middleware'=>'freelancer'], function(){

	Route::get('/offers',[FreelancerController::class,'offers'])->name('freelancer-offers');

	Route::get('/messages',[FreelancerController::class,'messages'])->name('freelancer-messages');

	Route::get('/orders',[FreelancerController::class,'projects'])->name('freelancer-projects');

	Route::get('/settings',[FreelancerController::class,'settings'])->name('freelancer-settings');

	Route::post('/work/upload',[FreelancerController::class,'uploadWork'])->name('freelancer-work-upload');

	Route::post('/work/accept',[FreelancerController::class,'acceptWork'])->name('freelancer-accept-work');

	Route::post('/work/decline',[FreelancerController::class,'declineWork'])->name('freelancer-decline-work');

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

	Route::post('/not-approve-work',[QAController::class,'notApproveWork'])->name('not-approve-work');

});

Route::post('/change-details',[HomeController::class,'changeDetails'])->name('change-details');

// Authentication
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::post('/check-ip',[AuthController::class,'checkIp'])->name('check-ip');

Route::post('/check-pin',[AuthController::class,'checkPin'])->name('check-pin');

Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Admin routes
Route::group(['prefix' => 'admin','middleware'=>'admin'], function(){

	Route::get('/',[AdminController::class,'admin'])->name('admin');

	Route::get('/news/add',[NewsController::class,'addNews'])->name('add-news');

	Route::get('/news/edit',[NewsController::class,'editNews'])->name('edit-news');

	Route::get('/news/edit/{news_id}',[NewsController::class,'editSingleNews'])->name('edit-single-news');

	Route::post('/news/create',[NewsController::class,'createNews'])->name('create-news');

	Route::post('/news/edit/{news_id}',[NewsController::class,'editSingleNewsPost'])->name('edit-single-news-post');

	Route::post('/news/delete/{news_id}',[NewsController::class,'deleteSingleNews'])->name('delete-single-news-post');

	Route::get('/freelancers',[AdminController::class,'freelancerList'])->name('freelancer-list');

	Route::post('/freelancer/approve/{freelancer_id}',[AdminController::class,'approveFreelancer'])->name('approve-freelancer');

	Route::post('/freelancer/decline/{freelancer_id}',[AdminController::class,'declineFreelancer'])->name('decline-freelancer');

	Route::get('/users/ban',[AdminController::class,'banUser'])->name('users-list');

	Route::post('/user/ban/{flag}',[AdminController::class,'banUserPost'])->name('ban-user');

	Route::get('/orders/requested',[AdminController::class,'orders'])->name('admin-orders');

	Route::post('/offer/send/{order_id}',[AdminController::class,'sendOffer'])->name('send-offer');

	Route::get('/orders/pending-payments',[AdminController::class,'pendingPayments'])->name('pending-payments');

	Route::get('/orders/appoint-freelancer',[AdminController::class,'appointFreelancer'])->name('appoint-freelancer');

	Route::post('/orders/appoint-freelancer',[AdminController::class,'appointFreelancerPost'])->name('appoint-freelancer-post');

	Route::get('/orders/appoint-qa',[AdminController::class,'appointQA'])->name('appoint-qa');

	Route::post('/orders/appoint-qa',[AdminController::class,'appointQAPost'])->name('appoint-qa-post');

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

Route::get('/404',function(){
	return view('errors.404');
});

Route::any('{url}', function(){
    return redirect('/404');
})->where('url', '.*');

/*Route::get('/down', function() {
   $exitCode = Artisan::call('down');
   return redirect()->route('welcome');
});*/
