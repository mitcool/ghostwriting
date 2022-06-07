<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        app()->setLocale($request->segment(1));
        \Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
        Schema::defaultStringLength(191);
        $contact_phone = CompanyDetail::find(1)->contact_phone;
        view()->share('contact_phone', $contact_phone);


    }
}
