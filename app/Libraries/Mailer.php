<?php

/**
 * Devel Mail
 */

namespace App\Libraries;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class Mailer
{
    /**
     * Send Mail
     * @param array params
     * @param mailable mailable
     * @return boolean
     */
    public static function send($params, $mailable)
    {
        $subject = isset($params['subject']) ? $params['subject'] : null;
        $to = isset($params['to']) ? $params['to'] : false;

        try { 
            #params to required
            if (!$to)
                throw new \Exception("Please, set receipt email address");

            # send mail
            Mail::to($to)->send($mailable);

            # set response true
            $response = true;

            $to = is_array($to) ? json_encode($to) : $to;

            Log::channel('email')->info($subject . ' ' . $to);

        } catch (\Exception $e) {

            # set response false
            $response = false;

            $to = is_array($to) ? json_encode($to) : $to;

            Log::channel('email')->error($subject . ' ' . $to . ' ' . $e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
        }

        return $response;
    }
}