<?php

namespace App\Helpers;

class StringHelpers
{

    /**
     * @param int $length
     * @return false|string
     */
    public static function getRandomString(int $length = 20): string|false
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
        $charactersLength = strlen($permitted_chars);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $permitted_chars[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
