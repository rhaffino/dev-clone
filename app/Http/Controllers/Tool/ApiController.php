<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseApiResource;
use App\Mail\CtaMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiHelper;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Mockery\Exception;

class ApiController extends Controller
{
    use ApiHelper;

    public function analyzeTechnology(Request $request)
    {
        $url = $request->get('url');

        $sessionCookie = Cookie::get("tl_session");
        if(!$sessionCookie){
            $sessionCookie = Session::getId();
            Cookie::queue(Cookie::forever("tl_session", encrypt($sessionCookie)));
            $cacheKey = "$sessionCookie-$url";
        } else {
            $cacheKey = "$sessionCookie-$url";
        }


        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }

        try {
            $keys = Redis::keys("$sessionCookie-*");

            if(count($keys) < 5){
                $response = $this->requestTechLookup($url);
                if ($response['statusCode'] === 200) {
                    Redis::set($cacheKey, json_encode($response));
                    Redis::expire($cacheKey, 60 * 60);
                    return new BaseApiResource($response['data'] ?? [], $response['message'], $response['statusCode']);
                } else {
                    return new BaseApiResource(null, $response['message'], 500);
                }
            } else {
                $minimumTime = 60 * 60 * 24 * 30;
                foreach ($keys as $key) {
                    $_key = str_replace(config('database.redis.options.prefix'), "", $key);
                    $currentTime = Redis::ttl("$_key");
                    $minimumTime = $minimumTime > $currentTime ? $currentTime : $minimumTime;
                }
                return new BaseApiResource(['current_time' => $minimumTime], 'Too Many Request', 429, 'danger');
            }
        } catch (\Exception $exception) {
            return new BaseApiResource(null, $exception->getMessage(), 500);
        }
    }

    public function analyzeHreflang(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }

        $response = $this->requestHreflangChecker($url);
        return new BaseApiResource($response['data'] ?? [], $response['statusText'], $response['statusCode']);
    }

    public function analyzeLink(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }

        try {
            $response = $this->requestLinkAnalyzer($url);
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        } catch (Exception $exception) {
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }
    }

    public function analyzeRedirectChain(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }

        try {
            $response = $this->requestRedirectChainChecker($url);
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        } catch (Exception $exception) {
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }
    }

    public function analyzeSsl(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "url" => ["required", "string", "regex:/^(?!:\/\/)(?=.{1,255}$)((.{1,63}\.){1,127}(?![0-9]*$)[a-z0-9-]+\.?)$/i"]
        ]);

        if ($validator->fails())
            return new BaseApiResource(null,$validator->errors()->first(),422, 'danger');

        try {
            $response = $this->requestSslChecker($request->get('url'));
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }catch (Exception $exception){
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }
    }

    public function analyzeMeta(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }

        try {
            $response = $this->requestMetaChecker($url);
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }catch (Exception $exception){
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }
    }

    public function ctaEmail(Request $request)
    {
        //make validator for request
        $validator = Validator::make($request->all(),[
            "email" => ["required", "email"],
            "mail" => ["required", "string"]
        ]);

        //check validation
        if ($validator->fails())
            return new BaseApiResource(null, $validator->errors()->first(), 400);

        //get all marketing email from json file
        $emails = json_decode(file_get_contents(base_path('resources/js/json/ctaEmail.json')),true);

        //send email to all marketing email
        Mail::bcc($emails)->send(new CtaMail($request->email, $request->mail));

        //return success response
        return new BaseApiResource(null, "Success send email", 200);
    }

    public function accessCount(Request $request)
    {
        $access_count = session()->has('access_count') ? session()->get('access_count') : 0;
        $access_count += 1;
        session()->put('access_count', $access_count);

        $message = 'recorded';

        $data = [
            'count' => $access_count,
            'message' => $message,
        ];

        //return success response
        return new BaseApiResource($data, $message, 200);
    }

    public function accessLimit(Request $request)
    {
        if (Auth::guest()) {
            $access_count = session()->has('access_count') ? session()->get('access_count') : 0;
            $access_count += 1;
            session()->put('access_count', $access_count);
    
            $access_limit = $access_count > 5 ? 1 : 0;
    
            $message = $access_limit ? Lang::get("alert.alert-limit") : 'recorded';
    
            $data = [
                'count' => $access_count,
                'limit' => $access_limit,
                'message' => $message,
                'logged_target' => (url('/' . (App::isLocale('id') ? 'id' : 'en') . '/login'))
            ];
    
            //return success response
            return new BaseApiResource($data, $message, 200);
        }
    }

    public function plagiarismCheck(Request $request)
    {
        try {
            $userId = Crypt::decrypt($request->get('user_id'));
            $userId = explode('-', $userId)[0];
        } catch (DecryptException $e) {
            return new BaseApiResource(null, "Not authorized access!", 403, "failed");
        }
        $user = User::find($userId);
        if ($user && $user->user_role_id == 3) {
            $text = $request->get('text');
    
            try {
                $response = $this->requestPlagiarismCheck($text, $user->id);
                return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
            }catch (Exception $exception){
                return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
            }
        } else {
            return new BaseApiResource(null, "Not authorized access!", 403, "failed");
        }
    }
}
