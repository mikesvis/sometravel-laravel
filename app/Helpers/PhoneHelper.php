<?php

namespace App\Helpers;

use App\Models\PhoneVerification;

class PhoneHelper
{

    const SALT = 'th!$!$a^ery$a1ty$alt';
    const ALLOWED_CODE_TRIES = 20;

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

    public static function getToken($phone, $code = 'dummyIncorrectCode')
    {
        $smsCode = session('sms_code', $code);
        return sha1($phone.self::SALT.$smsCode);
    }

    public static function generateToken($phone, $code)
    {
        return sha1($phone.self::SALT.$code);
    }

    public static function generateCode()
    {
        $digits = 4;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
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

        $phoneIsVerified = PhoneVerification::whereNotNull('verified_at')
            ->where('token', self::getToken($standartizedPhone))
            ->where('verified_at', '>=', self::whiteVerificationPeriod())
            ->orderBy('verified_at', 'desc')
            ->first();

        if(empty($phoneIsVerified))
            return false;

        return true;

    }

    public static function whiteVerificationPeriod()
    {
        return \Carbon\Carbon::now()->subMinutes(30);
    }

    public static function isSmsSpender($phone)
    {

        $countByIps = PhoneVerification::where('created_at', '>=', self::smsExausterPeriod())
            ->where('ip', $_SERVER['REMOTE_ADDR'])
            ->count();

        if($countByIps > self::ALLOWED_CODE_TRIES)
            return true;

        $countByPhoneNumber = PhoneVerification::where('created_at', '>=', self::smsExausterPeriod())
            ->where('phone', $phone)
            ->count();

        if($countByPhoneNumber > self::ALLOWED_CODE_TRIES)
            return true;
    }

    public static function smsExausterPeriod()
    {
        return \Carbon\Carbon::now()->subMinutes(60);
    }

    public static function codeHasBeenJustSent($phone)
    {
        $phone = self::preCheckRequestedPhone($phone);

        if($phone == false)
            return true;

        $countJustSent = PhoneVerification::where('code_sent_at', '>=', self::smsCooldownPeriod())
            ->where('phone', $phone)
            ->count();

        return (bool)$countJustSent;

    }

    public static function smsCooldownPeriod()
    {
        return \Carbon\Carbon::now()->subSeconds(30);
    }

    public static function beautifyPhone($phone)
    {
        $phone = PhoneHelper::standartizeNumber($phone);
        return '7 ('.mb_substr($phone, 1, 3).') '.mb_substr($phone, 4, 3).'-'.mb_substr($phone, 7, 2).'-'.mb_substr($phone, 9, 2);
    }

}
?>
