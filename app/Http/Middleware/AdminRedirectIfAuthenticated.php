<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated
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
			if(Auth::guard('admin')->user()->role == 1){
				//return redirect()->route('admin.home');
			}else{
                return redirect()->route('admin.login');
            }
		}
		return $next($request);
    }
}
