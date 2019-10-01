<?php
namespace App\Helpers;

class VisaHelper
{

    const APPLICATION_TYPE_ONLY_SELF = 0;
    const APPLICATION_TYPE_ANY = 1;

    public static function getApplicationTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только личная',
            self::APPLICATION_TYPE_ANY => 'Личная или без присутствия',
        ];
    }



}
?>
