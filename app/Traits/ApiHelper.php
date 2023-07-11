<?php

namespace App\Traits;

use App\Models\PlagiarismCheckLog;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;

trait ApiHelper
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    private function request($path, $method = 'GET', $data = [])
    {
        $options = [];
        $key = env('TOOLS_API_KEY', 'secret');
        try {
            if ($method === 'GET') {
                $options['query'] = $data;
            } else if ($method === 'POST') {
                $options['form_params'] = $data;
            }

            $response = $this->client->request($method, env('TOOLS_API_URL') . $path . "?key=$key" , $options);
//            dd($response->getBody()->getContents());
            return $response->getBody()->getContents();
        } catch (ClientException $exception) {
            return $exception->getResponse()->getBody()->getContents();
        }
    }

    protected function requestTechLookup($url)
    {
        $response = $this->client->get(env('TECHNOLOGY_LOOKUP_API_URL') . "api/tech-lookup?url=$url");
        return \GuzzleHttp\json_decode($response->getBody(), 1);
    }

    protected function requestHreflangChecker($url)
    {
        $response = $this->request("api/hreflang-checker/check", 'POST', compact('url'));
        return \GuzzleHttp\json_decode($response, 1);
    }

    protected function requestLinkAnalyzer($url)
    {
        $response = $this->request("api/link-analyzer/analyze", 'POST', compact('url'));
        return \GuzzleHttp\json_decode($response, 1);
    }

    protected function requestRedirectChainChecker($url){
        $response = $this->request("api/redirect-chain-checker/check", 'POST', compact('url'));
        return \GuzzleHttp\json_decode($response, 1);
    }

    protected function requestSslChecker($url){
        $response = $this->request("api/ssl-checker/check", 'POST', compact('url'));
        return \GuzzleHttp\json_decode($response, 1);
    }

    protected function requestMetaChecker($url){
        $response = $this->request("api/meta-checker/check", 'POST', compact('url'));
        return \GuzzleHttp\json_decode($response, 1);
    }

    protected function requestPlagiarismCheck($text, $id)
    {
        try {
            $data = [];
            $apiPost = "http://www.copyscape.com/api/?u=" . env('COPYSCAPE_USERNAME') . "&k=" . env('COPYSCAPE_API_KEY') . "&o=csearch&f=json&c=10";
            if (env('APP_ENV') != 'production') {
                $apiPost .= "&x=1";
            }
            if (filter_var($text, FILTER_VALIDATE_URL) == true) {
                $dataPost = [
                    "q" => $text,
                ];
            } else {
                $dataPost = [
                    "e" => "UTF-8",
                    "t" => $text,
                ];
            }
            $options = [];
            $options['form_params'] = $dataPost;
            $response = $this->client->request('POST', $apiPost, $options);
            $data['response'] = json_decode($response->getBody()->getContents());
            
            $log = new PlagiarismCheckLog;
            $log->user_id = $id;
            $log->content = $text;
            $log->cost = $data['response']->cost;
            $log->result = $data['response']->result;
            $log->url = $data['response']->allviewurl;
            $log->save();
            $data['text'] = $text;
            
            $responses = [];
            $responses['data'] = $data;
            $responses['message'] = 'success';
            $responses['statusCode'] = 200;
            return $responses;
        } catch (ClientException $exception) {
            $exceptions = [];
            $exceptions['data'] = $exception->getResponse()->getBody()->getContents();
            $exceptions['message'] = 'failed';
            $exceptions['statusCode'] = 500;
            return $exceptions;
        }
    }
}
