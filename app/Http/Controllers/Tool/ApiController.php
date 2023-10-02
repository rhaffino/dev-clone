<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseApiResource;
use App\Mail\CtaMail;
use App\Models\User;
use App\Models\PlagiarismCheckLog;
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
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Revolution\Google\Sheets\Facades\Sheets;
use Stevebauman\Location\Facades\Location;

class ApiController extends Controller
{
    use ApiHelper;

    public function headerChecker(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }
        $response = $this->requestHeaderChecker($url);
        return new BaseApiResource($response['data'] ?? [], $response['message'], $response['statusCode']);
    }

    public function pingTool(Request $request)
    {
        $type = $request->get('type');
        $url = $request->get('url');

        // if (!filter_var($url, FILTER_VALIDATE_URL)) {
        //     return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        // }
        $response = $this->requestPingChecker($type, $url);
        return new BaseApiResource($response['data'] ?? [], $response['message'], $response['statusCode']);
    }

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

    public function plagiarismCheckLogs(Request $request)
    {
        try {
            $data = [];
            // Get user plagiarism check logs
            $data['userLogs'] = PlagiarismCheckLog::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
            $data['userSummaryLogs'] = PlagiarismCheckLog::selectRaw("COUNT(id) as 'user_requests', SUM(word_count) as 'total_words', SUM(cost) as 'total_cost'")
                ->where('user_id', Auth::user()->id)
                ->first();
            $data['cummulativeLogs'] = PlagiarismCheckLog::orderBy('created_at', 'desc')
                ->get();
            $data['cummulativeSummaryLogs'] = PlagiarismCheckLog::selectRaw("COUNT(id) as 'team_requests', COUNT(DISTINCT(user_id)) as 'total_users', SUM(word_count) as 'total_words', SUM(cost) as 'total_cost'")
                ->first();
                
            return new BaseApiResource($data, "success", 200);
        } catch (Exception $exception){
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }
    }

    public function plagiarismCheckCalendarLogs(Request $request)
    {
        try {
            $today = Carbon::createFromDate($request->year, $request->month, $request->day);

            if($request->has('order') && $request->order)
            {
                if($request->order == 'next')
                {
                    $today = $today->addMonth();
                }
                else if($request->order == 'prev')
                {
                    $today = $today->subMonth();
                }
            }

            $first = Carbon::createFromDate($today->year, $today->month, 1);
            $isTodayMonth = $today->month == Carbon::now()->month && $today->year == Carbon::now()->year;
            $calendar = [];

            if($first->dayOfWeekIso > 1) {
                $monday = $first->subDays($first->dayOfWeekIso-1);
                for($i=$monday->day; $i < $monday->daysInMonth + 1; ++$i) {
                    $prevDate = Carbon::createFromDate($monday->year, $monday->month, $i);
                    $dateString = $prevDate->toDateString();
                    $dayString = strtoupper($prevDate->shortEnglishDayOfWeek);
                    $dayDate = $prevDate->day;
                    $calendar[$dateString] = ['cost' => 0, 'request' => 0, 'prevMonth' => true, 'date' => "$dayString, $dayDate"];
                }
            }

            if($isTodayMonth){
                for($i=1; $i < Carbon::now()->day + 1; ++$i) {
                    $prevDateInMonth = Carbon::createFromDate($today->year, $today->month, $i);
                    $dateString = $prevDateInMonth->toDateString();
                    $dayOfWeek = $prevDateInMonth->dayOfWeekIso;
                    $dayString = strtoupper($prevDateInMonth->shortEnglishDayOfWeek);
                    $dayDate = $prevDateInMonth->day;
                    if ($dayOfWeek == 6 || $dayOfWeek == 7) {
                        $calendar[$dateString] = ['cost' => 0, 'request' => 0, 'weekend' => true, 'date' => "$dayString, $dayDate"];
                    } else {
                        $calendar[$dateString] = ['cost' => 0, 'request' => 0, 'weekend' => false, 'date' => "$dayString, $dayDate"];
                    }
                }
            }

            $first = Carbon::createFromDate($today->year, $today->month, 1);
            for($i = $isTodayMonth ? Carbon::now()->day + 1 : 1; $i < $first->daysInMonth + 1; ++$i) {
                $date = Carbon::createFromDate($first->year, $first->month, $i);
                $dateString = $date->toDateString();
                $dayOfWeek = $date->dayOfWeekIso;
                $dayString = strtoupper($date->shortEnglishDayOfWeek);
                $dayDate = $date->day;
                if ($dayOfWeek == 6 || $dayOfWeek == 7) {
                    $calendar[$dateString] = ['cost' => 0, 'request' => 0, 'weekend' => true, 'date' => "$dayString, $dayDate"];
                } else {
                    $calendar[$dateString] = ['cost' => 0, 'request' => 0, 'weekend' => false, 'date' => "$dayString, $dayDate"];
                }
            }

            $last = Carbon::createFromDate($today->year, $today->month, $today->daysInMonth);
            if($last->dayOfWeekIso < 7) {
                $sunday = $last->addDays(7 - $last->dayOfWeekIso);
                for($i=1; $i < $sunday->day + 1; ++$i) {
                    $nextDate = Carbon::createFromDate($sunday->year, $sunday->month, $i);
                    $dateString = $nextDate->toDateString();
                    $dayString = strtoupper($nextDate->shortEnglishDayOfWeek);
                    $dayDate = $nextDate->day;
                    $calendar[$dateString] = ['cost' => 0, 'request' => 0, 'nextMonth' => true, 'date' => "$dayString, $dayDate"];
                }
            }

            $data['calendar'] =  $calendar;

            $logs = PlagiarismCheckLog::select('id', 'cost', 'created_at');
            if ($request->has('user_id')) {
                $userId = Crypt::decrypt($request->get('user_id'));
                $userId = explode('-', $userId)[0];
                $logs->where('user_id', $userId);
            }
            
            $logs = $logs->whereBetween('created_at', [array_key_first($calendar), array_key_last($calendar)])
                ->get();
            
            foreach ($logs as $log) {
                $createdAt = date_format($log->created_at, "Y-m-d");
                $calendar[$createdAt]['cost'] += $log->cost; 
                $calendar[$createdAt]['request'] += 1; 
            }
            
            $data['calendar'] =  $calendar;
            return new BaseApiResource($data, "success", 200);
        } catch (Exception $exception){
            return new BaseApiResource($response['data'] ?? null, $response['message'], $response['statusCode']);
        }
    }

    public function recordUserActivity(Request $request)
    {
        try {
            if (env('APP_ENV') == 'production' || env('APP_ENV') == 'local') {
                $spreadsheet = Sheets::spreadsheet(env('SUBMISSION_SPREADSHEET_ID'));
                $agent = new Agent();
    
                $ipAddress = env('APP_ENV') == 'local' ? '66.102.0.0' : $request->ip();
                $location = Location::get($ipAddress);
                $fullLocation = "IP: $location->ip, Country Code: $location->countryCode, Region Code: $location->regionCode, Region Name:  $location->regionName, City Name: $location->cityName, Zipcode: $location->zipCode, Latitude: $location->latitude, Longitude: $location->longitude";
                
                $row = array("", "", "", "", "", "", "");
                $row = [
                    date("l, d F Y H:i:s", strtotime('+7 hours')),
                    $request->url,
                    $request->submitted_url,
                    $ipAddress,
                    $agent->browser(),
                    $request->width_height,
                    $fullLocation
                ];
                
                $spreadsheet->sheet('cmlabs Tools - User Activities')->append([$row]);
            }
            return new BaseApiResource(null, "success", 200);
        } catch (\Exception $exception) {
            return new BaseApiResource(null, $exception->getMessage(), 500);
        }
    }

    public function robotsChecker(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }
        $response = $this->requestrobotsChecker($url);
        return new BaseApiResource($response['data'] ?? [], $response['message'], $response['statusCode']);
    }

    public function serpChecker(Request $request)
    {
        $url = $request->get('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }
        $response = $this->requestserpChecker($url);
        return new BaseApiResource($response['data'] ?? [], $response['message'], $response['statusCode']);
    }
}