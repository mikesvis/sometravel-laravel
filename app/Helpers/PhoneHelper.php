<?php

namespace App\Helpers;

use App\Models\PhoneVerification;

class PhoneHelper
{

    const SALT = 'th!$!$a^ery$a1ty$alt';

    public static function isCorrectPhoneNumber($number)
    {
        $number = trim(preg_replace('/\D/', '', $number));

        return ((mb_strlen($number) == 11 && (mb_substr($number, 0, 1) == '7' || mb_substr($number, 0, 1) == '8')) || mb_strlen($number) == 10);
    }

    public static function standartizeNumber($number)
    {
        $number = trim(preg_replace('/\D/', '', $number));

        if(mb_strlen($number) == 11){
            $number[0] = '7';
            return $number;
        }

        if(mb_strlen($number) == 10)
            return '7'.$number;

        return null;
    }

    public static function generateToken($phone)
    {
        return sha1($phone.self::SALT);
    }

    public static function preCheckRequestedPhone($phone = null)
    {

        // phone is empty
        if(empty($phone))
            return false;

        // phone is incorrect
        if(PhoneHelper::isCorrectPhoneNumber($phone) == false)
            return false;

        // стандартизируем телефон для проверки
        $phone = PhoneHelper::standartizeNumber($phone);

        return $phone;

    }

    public static function phoneIsVerified($standartizedPhone)
    {

        $phoneIsVerified = PhoneVerification::where('verified_at', $standartizedPhone)
            ->where('verified', 1)
            ->where('token', self::generateToken($standartizedPhone))
            ->count();

        return (bool)$phoneIsVerified;

    }

}
?>
