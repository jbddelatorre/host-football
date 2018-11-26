<?php

namespace App\Http\Middleware;

use Closure;
use Request;
class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Request::getPathInfo() == "/logout"){
            return $next($request);
        }
        
        if ($request->user() && $request->user()->user_type_id == '1') {
            return redirect('/host');
        }

        if ($request->user() && $request->user()->user_type_id == '2') {
            return redirect('/participant');
        }

        return $next($request);
    }
}
