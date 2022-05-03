<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Constants\UserRoles;
use Auth;

class Admin
{
  
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()){
             abort(403);
        }
        if(Auth::user()->role != UserRoles::$adminRole){
            abort(403);
        }
        return $next($request);
    }
}
