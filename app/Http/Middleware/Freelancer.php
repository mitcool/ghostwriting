<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Constants\UserRoles;

class Freelancer
{

    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()){
             abort(403);
        }
        if(Auth::user()->role != UserRoles::$freelancerRole){
            abort(403);
        }
        return $next($request);
    }
}
