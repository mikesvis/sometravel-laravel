@php
    $phoneNumberHuman = env('MAIN_PHONE', '8 (800) 000-00-00');
    $phoneNumber = preg_replace('/\D/', '', $phoneNumberHuman);
    $aTemplate = preg_replace("/!PHONE_NUMBER_HUMAN!/", $phoneNumberHuman, $aTemplate);
    $aTemplate = preg_replace("/!PHONE_NUMBER!/", $phoneNumber, $aTemplate);
    $spanTemplate = preg_replace("/!PHONE_NUMBER_HUMAN!/", $phoneNumberHuman, $spanTemplate);
@endphp
{!! $spanTemplate !!}
{!! $aTemplate !!}
