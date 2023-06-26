<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libraries\AppLib;
use App\Libraries\ResponseBase;
use App\Jobs\UnlinkGoogleMail;
use App\Models\User;
use App\Models\UserList;
use App\Models\UserLogin;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * GET: {base_url}/login
     */
    public function index(Request $request, $lang)
    {   
        if (Auth::check())
            return redirect('/');

        if ($request->get('logged_target'))
            session()->put("logged_target", $request->get('logged_target'));
        else 
            session()->forget("logged_target");
            
        $data = json_decode(file_get_contents(base_path('resources/js/json/tools.json')),true);
        $local = App::getLocale();
        return view('login.index', compact('data','local'));
    }

    /**
     * GET: {base_url}/logout
     */
    public function logout(Request $request)
    {
        if (Auth::check())
            Auth::logout();
            
        return redirect('/');
    }

    /**
     * GET: {base_url}/login/google
     */
    public function googleLogin(Request $request) {
        if (Auth::check()) {
            return redirect('/');
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * GET: {base_url}/login/google/callback
     */
    public function googleCallback(Request $request) {
        $this->setUserLogin("google");

        return redirect('/');
    }

    private function setUserLogin($driver = "google") {
        try {
            //get data user from driver
            $getSocialite = Socialite::driver($driver)->user();
            $driverId = $getSocialite->getId();
            $email = $getSocialite->getEmail();
            $name = $getSocialite->getName();

            // get data user
            $getUser = User::where('email', $email)->first();

            // if user not registered, create user
            if (!$getUser) {
                $createUser = new User;
                $createUser->name = $name;
                $createUser->email = $email;
                $createUser->password = "";
                $createUser->status = User::ACTIVE; // default status
                $createUser->user_role_id = 1; // default user role id
                $createUser->api_token = AppLib::generateRandomString();

                if ($driver == "google")
                    $createUser->google_id = $driverId;
                
                if (!$createUser->save())
                    throw new \Exception("Something wrong, please try again");

                $getUser = $createUser;

                // new username
                $username = Str::slug(substr($getUser->name, 0, 10) . ' ' . $getUser->id);
                User::find($getUser->id)->update(["username" => $username]);

                // Insert new user as subscriber
                $getSubscriber = Subscriber::where('email', $email)->first();
                if(!$getSubscriber)
                {
                    $createSubscriber = new Subscriber;
                    $createSubscriber->name = $name;
                    $createSubscriber->email = $email;
                    $createSubscriber->save();
                }
            } else {
                // if username empty
                if (!$getUser->username) {
                    // new username
                    $username = Str::slug(substr($getUser->name, 0, 10) . ' ' . $getUser->id);
                    $getUser->username = $username;
                    $getUser->save();
                }
            }

            // process auth
            $auth =  Auth::loginUsingId($getUser->id);
            
            // jika authentikasi ditolak
            if (!$auth)
            throw new \Exception("Something wrong, please try again");

            // update log login, save ip, device browser
            $this->logUserLogin($getUser);

        } catch (\Exception $e) {
            // error
            Log::error($e->getFile() . ':' . $e->getLine() . ' => '. $e->getMessage());
        }
    }

    /**
     * Set Log User Login
     */
    private function logUserLogin($user) {
        try {
            $agent = new Agent();
            $userLogin = new UserLogin;
            $userLogin->user_id = $user->id;
            $userLogin->ip_address = request()->ip(); // IP Address
            $userLogin->device = $agent->device(); // Desktop, Mobile
            $userLogin->browser = $agent->browser(); // Chrome, Firefox
            $userLogin->save();
        } catch (\Exception $e) {
            // error
            Log::error($e->getFile() . ':' . $e->getLine() . ' => '. $e->getMessage());
        }
    }
}
