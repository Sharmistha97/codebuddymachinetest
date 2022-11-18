<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
    * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard = null)
    {
        if (Auth::guard('admin')->check()) {
			if(in_array(Auth::guard('admin')->user()->role, [1,2])){
				//return redirect()->route('user.home');
			}else{
                return redirect()->route('user.login');
            }
		}
        
		return $next($request);
    }
}
