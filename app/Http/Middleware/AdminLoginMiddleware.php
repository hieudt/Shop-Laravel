<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if (Auth::user()->getRememberToken() == null) {
                Auth::logout();
            }

            if($user->role == 1){
                return $next($request);
            } else {
                return response()->view('404');
            }

        }else {
            return redirect('/admin/login');
        }

        
    }
}
