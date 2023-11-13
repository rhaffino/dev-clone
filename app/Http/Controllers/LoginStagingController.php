<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginStagingController extends Controller
{
    public function login(Request $request)
    {
        $correct_email = 'staging@cmlabs.co';
        $correct_password = env('STAGING_PASSWORD');

        $email = $request->input('email');
        $password = $request->input('password');

        
        if ($email === $correct_email && $password === $correct_password) {
            Session::put('isStagingLogin', true);

            return redirect('/');
        } else {
            return redirect()->route('staging-login')->with('error', 'Incorrect email or password');
        }
    }
}
