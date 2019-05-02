<?php

namespace App\Http\Middleware;

use Closure;

class AuthSafeMode
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
        if (\App\Setting::find(1)->authtokenbackend == null){
            return $next($request);
        } else {
            return redirect()->back();
        }
        
    }
}
