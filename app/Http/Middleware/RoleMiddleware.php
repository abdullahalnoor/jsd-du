<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(is_null($request->user())){
            abort(404, 'Unauthorized action. 1');
        }
    
        
        if (!auth()->user()->userRoles()) {

          
            abort(403, 'Unauthorized action. 2');
        }
        if(!$request->user()->userRoles()) {
            
            abort(403,'Unauthorized action. 3');
        }
        
        if(!$request->user()->can(\Route::getCurrentRoute()->getName())) {
            // dd('here');
            abort(403,'Unauthorized action. 4');
        }
        return $next($request);
    }
}
