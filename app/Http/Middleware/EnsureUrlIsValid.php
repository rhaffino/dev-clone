<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

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
        if ($request->get('token')) {
            try {
                $decrypted = Crypt::decryptString($request->get('token'));
            } catch (DecryptException $e) {
                session()->put("logged_in", "false");
            }
            session()->put("logged_in", "true");
        }
        if (!in_array($request->segment(1), ['id', 'en'])) {
            $segment1 = "en";
            $segment2 = $request->segment(2);

            if (preg_match('/id/', $request->segment(1)))
                $segment1 = "id";
            elseif (preg_match('/en/', $request->segment(1)))
                $segment1 = "en";
            else 
                return abort(404);

            return redirect($segment1 . '/' . $segment2, 301);
        }

        return $next($request);
    }
}
