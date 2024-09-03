<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class AccountVerificationMiddleware
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
        if (Auth::check()) {
            if (auth()->user()->account_status == 3) {
                $message = 'Your account has been disabled for violating our terms.';
                Session::flash('danger', $message);
                return redirect()->route('member.home');
            } else if (Auth::check() && auth()->user()->is_email_verified == 1) {
                $message = 'Please Verify your mail account..';
                Session::flash('danger', $message);
                return redirect()->route('member.verify.mail');
            } else if (Auth::check() && auth()->user()->is_email_verified == 2 && auth()->user()->account_status == 1) {
                $message = 'Please update your profile information...';
                Session::flash('danger', $message);
                return redirect()->route('member.home');
            }
        } else {
            return redirect()->route('member.login.form');
        }

        return $next($request);
    }
}
