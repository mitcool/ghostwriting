<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CustomRoute;
use Session;

class TranslateUrl
{
    public function handle($request, Closure $next)
    {
        $route_lang = $request->segment(1);
        $lang = Session::get('locale');
        $current_url = $request->route()->getName();
        $db_url = CustomRoute::where('name_de',$current_url)->orWhere('name_en',$current_url)->first();

        if($lang!=$route_lang && $lang=='de'){
            return redirect()->route($db_url->name_de);

        }
        elseif($lang!=$route_lang && $lang=='en'){
            return redirect()->route($db_url->name_en);
        }
        else{
           Session::put('locale',$route_lang);
           return $next($request); 
        }
    }
}