<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CustomRoute;
use App\Models\Service;
use App\Models\Discipline;
use App\Models\News;
use App\Models\AboutPage;
use Session;

class TranslateSlugableUrl
{
    public function handle($request, Closure $next)
    {
        $route_lang = $request->segment(1);
        $route_slug = $request->segment(3);
        $lang = Session::get('locale');
        $current_url = $request->route()->getName();

        $db_url = CustomRoute::where('name_de',$current_url)->orWhere('name_en',$current_url)->first();

        if($current_url == 'service' || $current_url=='service-de'){
            $target = Service::where('slug',$route_slug)->orWhere('slug_de',$route_slug)->first();
        }
        elseif($current_url == 'discipline' || $current_url=='discipline-de'){
            $target = Discipline::where('slug',$route_slug)->orWhere('slug_de',$route_slug)->first();
        }
        elseif($current_url == 'single-about' || $current_url=='single-about-de'){
            $target = AboutPage::where('slug',$route_slug)->orWhere('slug_de',$route_slug)->first();
        }

        elseif($current_url == 'single-blog' || $current_url =='single-blog-de'){
            $target = News::where('slug',$route_slug)->orWhere('slug_de',$route_slug)->first();
        }

        if($lang!=$route_lang && $lang=='de'){
            return redirect()->route($db_url->name_de, $target->slug_de);

        }
        elseif($lang!=$route_lang && $lang=='en'){
            return redirect()->route($db_url->name_en,$target->slug);
        }
        else{
           Session::put('locale',$route_lang);
           return $next($request); 
        }
    }
}
