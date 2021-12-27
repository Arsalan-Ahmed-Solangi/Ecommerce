<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cookie;
use Session;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('SystemAdminSession'))
        {

            \Session::forget('SystemAdminSession');
            \Cookie::queue(Cookie::forget('SystemAdminCookie'));

            Session::flush();
            Session::save();

            return redirect('/adminlogin')->with('response', 'Please Login again..!');
        }

        return $next($request);
    }
}
