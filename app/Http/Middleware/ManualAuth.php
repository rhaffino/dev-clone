<?php

namespace App\Http\Middleware;

use Closure;

class ManualAuth
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
        if (env('APP_ENV') === 'development') {
            if ($request->session()->has('isStagingLogin')) {
                return $next($request);
            } else {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
