<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class AccessLimit
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
        $access_count = session()->get('access_count', 0);
        $access_limit = $access_count >= 5 ? 1 : 0;

        View::share('access_count', $access_count);
        View::share('access_limit', $access_limit);

        return $next($request);
    }
}
