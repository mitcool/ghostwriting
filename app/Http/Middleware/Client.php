<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Constants\UserRoles;

class Client
{

    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()){
             abort(403);
        }
        if(Auth::user()->role != UserRoles::$clientRole){
            abort(403);
        }
        return $next($request);
    }
}
