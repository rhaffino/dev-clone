<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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

    protected function requestPingChecker($type, $url){
        $response = $this->request("api/ping-tool/check", 'POST', compact('type', 'url'));
        return \GuzzleHttp\json_decode($response, 1);
    }
}
