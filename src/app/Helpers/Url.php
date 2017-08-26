<?php

namespace Acrossoffwest\Shorter\Helpers;

class Url
{
    public static function isValid($url)
    {
        $isValid = preg_match_all(config('shorter.url.regex'), $url);

        return $isValid;
    }

    public static function generateRandom($length = null)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        $length = empty($length) ? config('shorter.url.generate_url_length') : $length;

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string;
    }
}
