<?php

namespace App\Libraries;

class ResponseBase
{
    /**
     * Handle response success
     * @param array $data
     * @return json
     */
    public static function success($data, $code = 200)
    {
        $response = [];

        $response['code'] = $code;
        $response['data'] = isset($data['data']) && $data['data'] ? $data['data'] : null;
        $response['status'] = isset($data['status']) && $data['status'] ? $data['status'] : 'success';
        $response['message'] = isset($data['message']) && $data['message'] ? $data['message'] : null;

        // pagination
        if (isset($data['links']) && $data['links']) 
        {
            $response['links'] = [];
            $keys = ['first', 'last', 'next', 'prev'];
            foreach ($keys as $key)
                $response['links'][$key] = (isset($data['links'][$key]) && $data['links'][$key] ? $data['links'][$key] : null);
        }

        if (isset($data['meta']) && $data['meta'])
        {
            $response['meta'] = [];
            $keys = ['current_page', 'from', 'last_page', 'per_page', 'to', 'total'];
            foreach ($keys as $key)
                $response['meta'][$key] = (isset($data['meta'][$key]) && $data['meta'][$key] ? $data['meta'][$key] : null);
        }

        return response()->json($response);
    }

     /**
     * Handle response success
     * @param string $message
     * @param integer $code
     * @return json
     */
    public static function error($message, $code = 400)
    {
        $response = [];
        $response['code'] = $code <= 0 ? 400 : $code;
        $response['status'] = 'error';
        $response['message'] = $message;

        return response()->json($response, 200, [], JSON_UNESCAPED_SLASHES);
    }
}