<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseApiResource;
use Illuminate\Http\Request;
use App\Traits\ApiHelper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class ApiController extends Controller
{
    use ApiHelper;

    public function analyzeTechnology(Request $request)
    {
        $url = $request->get('url');
        $ipAddress = $request->ip();
        $cacheKey = "$ipAddress-$url";

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return new BaseApiResource(null, 'URL is not valid', 422, 'danger');
        }

        try {
            $response = Redis::get($cacheKey);
            if (!$response) {
                $response = $this->requestTechLookup($url);
                if ($response['statusCode'] === 200) {
                    Redis::set($cacheKey, json_encode($response));
                    Redis::expire($cacheKey, 60 * 60);
                } else if ($response['statusCode'] === 429) {
                    // get latest key remaining time
                    $keys = Redis::keys("*$ipAddress*");
                    $minimumTime = 60 * 60 * 24 * 30;
                    $currentKey = null;
                    foreach ($keys as $key) {
                        $_key = str_replace(config('database.redis.options.prefix'), "", $key);
                        $currentTime = Redis::ttl("$_key");
                        $minimumTime = $minimumTime > $currentTime ? $currentTime : $minimumTime;
                    }

                    return new BaseApiResource(['current_time' => $minimumTime], $response['message'], $response['statusCode'], 'danger');
                } else {
                    return new BaseApiResource(null, $response['message'], 500);
                }
            } else {
                $response = json_decode($response, true);
            }

            return new BaseApiResource($response['data'] ?? [], $response['message'], $response['statusCode']);
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
        return new BaseApiResource($response['data'], $response['statusText'], $response['statusCode']);
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
}
