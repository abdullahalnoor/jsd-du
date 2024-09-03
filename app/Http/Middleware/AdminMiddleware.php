<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if(Auth::check() ){
            if(auth()->user()->account_status == 3){
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                return redirect()->route('frontend.page',['slug'=>'account-suspended']);
            }  else  if(auth()->user()->role_id == 1){
                return $next($request);
            }
            // return $next($request);
        }
        return \redirect('/');
        
        
    }
}
