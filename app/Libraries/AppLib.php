<?php

namespace App\Libraries;

class AppLib
{
    /**
     * Generate random string
     * @param integer length
     * @param string characters
     * @return string
     */
    public static function generateRandomString($length = 10, $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ") {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    /**
     * Handle read time words
     * @param string $text
     * @return integer
     */
    public static function readTime($text = false, $param = 275)
    {
        if (!$text)
            return 0;
        
        try {
            $word = str_word_count(strip_tags($text));
            $seconds = $word * 60 / $param;
            return $seconds;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public static function phoneNumber($n) {
        $phoneNumber = $n;
        if (preg_match('/^(\+6)/', $n)) {
            $phoneNumber = substr($n, 3, strlen($n));
        } else if (preg_match('/^(6)/', $n)) {
            $phoneNumber = substr($n, 2, strlen($n));
        } else if (preg_match('/^(0)/', $n)) {
            $phoneNumber = substr($n, 1, strlen($n));
        }
        return $phoneNumber;
    }

    public static function phoneCode($n) {
        $phoneNumber = 62;
        if (preg_match('/^(\+6)/', $n)) {
            $phoneNumber = substr($n, 1, 2);
        } else if (preg_match('/^(6)/', $n)) {
            $phoneNumber = substr($n, 0, 2);
        } else if (preg_match('/^(0)/', $n)) {
            $phoneNumber = 62;
        }
        return $phoneNumber;
    }
}