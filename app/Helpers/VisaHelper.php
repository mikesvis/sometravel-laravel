<?php
namespace App\Helpers;

use App\Models\Visa\Visa;

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

    public static function calculatorBiometrics(Visa $visa)
    {
        return [
            'type' => 'biometrics',
            'label' => 'Биометрия <span class="h6 font-weight-normal d-inline-block">(за последние 5 лет)</span>',
            'values' => [
                ['id'=>'value_b_0', 'name' => 'Сдана', 'value' => 1],
                ['id'=>'value_b_1', 'name' => 'Не сдана', 'value' => 0],
            ]
        ];
    }

    public static function calculatorDelivery(Visa $visa)
    {
        return [
            'type' => 'delivery_type',
            'label' => 'Доставка',
            'values' => [
                ['id'=>'value_d_0', 'name' => 'С доставкой', 'value' => 1],
                ['id'=>'value_d_1', 'name' => 'Самовывоз', 'value' => 0],
            ]
        ];
    }

    public static function calculatorApplication(Visa $visa)
    {
        return [
            'type' => 'application_type',
            'label' => 'Тип подачи',
            'values' => [
                ['id'=>'value_at_0', 'name' => 'Личная', 'value' => 0],
                ['id'=>'value_at_1', 'name' => 'Без присутствия', 'value' => 1],
            ]
        ];
    }

}
?>
