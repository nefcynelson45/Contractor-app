<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('LoggedUser') && ($request->path()!='/login' && $request->path()!='/reg')){
            return redirect('/login')->with('fail','oooooooo');
        }

        if(session()->has('LoggedUser')  && ($request->path()=='/login' || $request->path()!='/reg')){
            return back();
        }
        return $next($request)->header('Cache-Control','nocache,no-store,max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Tue, 02 Jan 1990 00:00:00 GMT');
    }
}
