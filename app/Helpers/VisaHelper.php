<?php
namespace App\Helpers;

class VisaHelper
{

    // Типы подачи
    const APPLICATION_TYPE_ONLY_SELF = 0;
    const APPLICATION_TYPE_ANY = 1;

    // Типы забора документов
    const ACCEPTANCE_TYPE_ONLY_SELF = 0;
    const ACCEPTANCE_TYPE_ANY = 1;

    // Типы доставки документов
    const DELIVERY_TYPE_ONLY_SELF = 0;
    const DELIVERY_TYPE_ANY = 1;


    // Типы подачи
    public static function getApplicationTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только личная',
            self::APPLICATION_TYPE_ANY => 'Личная или без присутствия',
        ];
    }

    // Тип подачи
    public static function getApplicationTypeNameForAdmin($index)
    {
        $types = self::getApplicationTypeNamesForAdmin();
        return $types[$index];
    }

    // Типы забора документов
    public static function getAcceptanceTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только самостоятельно',
            self::APPLICATION_TYPE_ANY => 'Самостоятельно или забор курьером',
        ];
    }

    // Тип забора документов
    public static function getAcceptanceTypeNameForAdmin($index)
    {
        $types = self::getAcceptanceTypeNamesForAdmin();
        return $types[$index];
    }

    // Типы доставки документов
    public static function getDeliveryTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только самовывоз',
            self::APPLICATION_TYPE_ANY => 'Самовывоз или доставка курьером',
        ];
    }

    // Тип доставки документов
    public static function getDeliveryTypeNameForAdmin($index)
    {
        $types = self::getDeliveryTypeNamesForAdmin();
        return $types[$index];
    }

}
?>
