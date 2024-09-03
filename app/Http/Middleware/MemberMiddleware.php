<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MemberMiddleware
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
        // if(auth()->user()->account_status == 2){
        //     return redirect()->route('frontend.page',['slug'=>'account-suspended']);
        // }
        // if(Auth::check() && auth()->user()->role_id == 2){
        //     return $next($request);
        // }
       
        if(Auth::check() ){
            if(auth()->user()->account_status == 3){
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                return redirect()->route('frontend.page',['slug'=>'account-suspended']);
            } else if(auth()->user()->account_status == 1){
           
               
                return redirect()->route('member.verify.mail');
                // dd(auth()->user()->account_status );
            } else  if(auth()->user()->role_id == 2){
                return $next($request);
            }
            // return $next($request);
        }
        return \redirect('/');

    }
}
