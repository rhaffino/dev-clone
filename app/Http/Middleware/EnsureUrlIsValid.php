<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUrlIsValid
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
        if (!in_array($request->segment(1), ['id', 'en'])) {
            $segment1 = "en";
            $segment2 = $request->segment(2);

            if (preg_match('/id/', $request->segment(1)))
                $segment1 = "id";
            elseif (preg_match('/en/', $request->segment(1)))
                $segment1 = "en";
            else 
                return abort(404);

            return redirect($segment1 . '/' . $segment2);
        }

        return $next($request);
    }
}
