<?php

namespace App\Helpers;

class PhoneHelper
{

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

}
?>
